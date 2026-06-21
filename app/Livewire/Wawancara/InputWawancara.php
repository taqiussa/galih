<?php

namespace App\Livewire\Wawancara;

use App\Models\Ekstrakurikuler;
use App\Models\SeleksiWawancara;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

#[Title('Input Wawancara')]
class InputWawancara extends Component
{
    use WireUiActions;

    public $kode_daftar;

    public $user;
    public $nama;
    public $sekolahDasar;
    public $sekolahAsal;

    public $tinggi;
    public $berat;
    public $model_rambut;
    public $mata_minus;
    public $ngompol;
    public $merokok;
    public $penyakit_lain;

    public $listEkstrakurikuler;

    protected $rules =
    [
        'kode_daftar' => 'required',
        'tinggi' => 'required',
        'berat' => 'required',
        'model_rambut' => 'required',
        'mata_minus' => 'required',
        'ngompol' => 'required',
        'merokok' => 'required',
        'penyakit_lain' => 'required',
    ];

    public function mount()
    {
        $this->listEkstrakurikuler = Ekstrakurikuler::query()
            ->orderBy('nama')
            ->get();
    }

    public function render()
    {
        return view('livewire.wawancara.input-wawancara');
    }

    public function updatedKodeDaftar()
    {
        $this->user = Siswa::query()
            ->whereKodeDaftar($this->kode_daftar)
            ->with(['biodata', 'seleksiWawancara'])
            ->first();

        $this->nama = $this->user?->name;
        $this->sekolahAsal = $this->user?->biodata?->nama_sekolah_pindahan;
        $this->sekolahDasar = $this->user?->biodata?->nama_sekolah_dasar;
        $this->tinggi = $this->user?->seleksiWawancara?->tinggi;
        $this->berat = $this->user?->seleksiWawancara?->berat;
        $this->model_rambut = $this->user?->seleksiWawancara?->model_rambut;
        $this->mata_minus = $this->user?->seleksiWawancara?->mata_minus;
        $this->ngompol = $this->user?->seleksiWawancara?->ngompol;
        $this->merokok = $this->user?->seleksiWawancara?->merokok;
        $this->penyakit_lain = $this->user?->seleksiWawancara?->penyakit_lain;
    }

    public function simpan()
    {
        $this->validate();

        try {

            SeleksiWawancara::updateOrCreate(
                [
                    'kode_daftar' => $this->kode_daftar
                ],
                [
                    'user_id' => Auth::id(),
                    'tinggi' => $this->tinggi,
                    'berat' => $this->berat,
                    'model_rambut' => $this->model_rambut,
                    'mata_minus' => $this->mata_minus,
                    'ngompol' => $this->ngompol,
                    'merokok' => $this->merokok,
                    'penyakit_lain' => $this->penyakit_lain,
                ]
            );

            $this->notification()->send([
                'icon' => 'success',
                'title' => 'Berhasil!',
                'description' => 'Berhasil Simpan Seleksi Wawancara.',
            ]);

            $this->updatedKodeDaftar();
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
