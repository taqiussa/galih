<?php

namespace App\Livewire\Agama;

use App\Models\SeleksiAgama;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

#[Title('Input Agama')]
class InputAgama extends Component
{
    use WireUiActions;

    public $kode_daftar;

    public $user;

    public $nama;

    public $sekolahDasar;

    public $sekolahAsal;

    public $nilaiQuran;

    public $nilaiHafalan;

    public $pilihan;

    public $ratarata;

    public $nilai;

    protected $rules =
    [
        'kode_daftar' => 'required',
        'pilihan' => 'required',
        'nilai' => 'required|numeric|max:100',
    ];

    protected $messages = [
        '*.max' => 'Maksimal 100',
    ];

    public function render()
    {
        return view('livewire.agama.input-agama');
    }

    public function updatedKodeDaftar()
    {
        $this->user = Siswa::query()
            ->whereKodeDaftar($this->kode_daftar)
            ->with(['biodata', 'seleksiAgama'])
            ->first();

        $this->nama = $this->user?->name;
        $this->sekolahAsal = $this->user?->biodata?->nama_sekolah_pindahan;
        $this->sekolahDasar = $this->user?->biodata?->nama_sekolah_dasar;
        $this->nilaiHafalan = $this->user?->seleksiAgama->where('jenis', 'hafalan')->first()?->nilai;
        $this->nilaiQuran = $this->user?->seleksiAgama->where('jenis', 'alquran')->first()?->nilai;
        $this->ratarata = $this->user?->seleksiAgama->avg('nilai');
    }

    public function simpan()
    {
        $this->validate();

        try {

            if ($this->pilihan == 'hafalan') {

                SeleksiAgama::updateOrCreate(
                    [
                        'kode_daftar' => $this->kode_daftar,
                        'jenis' => 'hafalan',
                    ],
                    [
                        'user_id' => Auth::id(),
                        'nilai' => $this->nilai,
                    ]
                );
            } else {

                SeleksiAgama::updateOrCreate(
                    [
                        'kode_daftar' => $this->kode_daftar,
                        'jenis' => 'alquran',
                    ],
                    [
                        'user_id' => Auth::id(),
                        'nilai' => $this->nilai,
                    ]
                );
            }

            $this->notification()->send([
                'icon' => 'success',
                'title' => 'Berhasil!',
                'description' => 'Berhasil Simpan Seleksi Agama.',
            ]);

            $this->updatedKodeDaftar();
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
