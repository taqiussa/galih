<?php

namespace App\Livewire\Pengumuman;

use App\Models\Siswa;
use Livewire\Attributes\Title;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

#[Title('Input Pengumuman')]
class InputPengumuman extends Component
{

    use WireUiActions;

    public $kode_daftar;

    public $user;

    public $nama;

    public $terima;

    public $sekolahDasar;

    public $sekolahAsal;

    protected $rules =
    [
        'kode_daftar' => 'required',
        'terima' => 'required',
    ];

    public function updatedKodeDaftar()
    {
        $this->user = Siswa::query()
            ->whereKodeDaftar($this->kode_daftar)
            ->with(['biodata'])
            ->first();

        $this->nama = $this->user?->name;
        $this->sekolahAsal = $this->user?->biodata?->nama_sekolah_pindahan;
        $this->sekolahDasar = $this->user?->biodata?->nama_sekolah_dasar;
    }

    public function render()
    {
        return view('livewire.pengumuman.input-pengumuman');
    }

    public function simpan()
    {
        $this->validate();

        try {

            $this->user->update([
                'diterima' => $this->terima
            ]);

            $this->notification()->send([
                'icon' => 'success',
                'title' => 'Berhasil!',
                'description' => 'Berhasil Simpan Pengumuman.',
            ]);

            $this->updatedKodeDaftar();
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
