<?php

namespace App\Livewire\Pendaftaran;

use Carbon\Carbon;
use App\Traits\GetData;
use Livewire\Component;
use App\Models\Siswa;
use App\Models\Biodata;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use WireUi\Traits\WireUiActions;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

#[Title('Data Pendaftar')]
class DataPendaftar extends Component
{
    use WireUiActions;
    use WithPagination;
    use GetData;

    public $kategori;
    public $search;
    public $isOnline;
    public $isJateng;
    public $gelombang;
    public $jenis_kelamin;

    public function mount() {}

    public function render()
    {
        return view('livewire.pendaftaran.data-pendaftar');
    }

    public function confirm($id): void
    {
        $this->dialog()->confirm([
            'title'       => 'Menghapus Data Pendaftar',
            'description' => 'Anda Yakin ?',
            'icon'        => 'error',
            'acceptLabel' => 'Hapus',
            'reject' => [
                'label' => 'Batal',
                'color' => 'black',
            ],
            'method'      => 'delete',
            'params'      => $id,

        ]);
    }

    public function delete($id)
    {
        $user = Siswa::find($id);
        $user->biodata()->delete();
        $user->delete();

        $this->notification()->send([
            'icon' => 'warning',
            'title' => 'Menghapus!',
            'description' => 'Berhasil Menghapus Siswa.',
        ]);
    }

    public function cari()
    {
        $this->resetPage();
        $this->listPendaftar();
    }

    #[Computed]
    public function listPendaftar()
    {
        return DB::table('siswa as s')
            ->leftJoin('biodata as b', 'b.kode_daftar', '=', 's.kode_daftar')
            ->leftJoin('users as g', 'g.id', '=', 's.user_id')
            ->when(filled($this->search), function ($q) {
                $q->where(function ($q) {
                    $q->where('s.name', 'like', "%{$this->search}%")
                        ->orWhere('s.kode_daftar', 'like', "%{$this->search}%");
                });
            })
            ->when(filled($this->jenis_kelamin), function ($q) {
                $q->where('b.jenis_kelamin', $this->jenis_kelamin);
            })
            ->when(filled($this->isOnline), function ($q) {
                $q->where('s.is_online', $this->isOnline);
            })
            ->when(filled($this->gelombang), function ($q) {
                $q->where('s.gelombang', $this->gelombang);
            })
            ->select([
                's.id',
                's.name',
                's.kode_daftar',
                's.nis',
                's.tanggal_daftar',
                's.gelombang',
                's.is_online',
                's.created_at',
                'b.jenis_kelamin',
                'b.nama_sekolah_dasar',
                'b.telepon',
                'g.name as guru',
                'b.provinsi',
                'b.kabupaten',
                'b.kecamatan',
                'b.desa',
            ])

            ->orderByDesc('s.created_at')
            ->paginate(10);
    }
}
