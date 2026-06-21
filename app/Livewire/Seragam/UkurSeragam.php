<?php

namespace App\Livewire\Seragam;

use App\Models\Seragam;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

#[Title('Ukur Seragam')]
class UkurSeragam extends Component
{
    use WireUiActions;

    public $kode_daftar;
    public $user;
    public $nama;
    public $sekolahAsal;
    public $sekolahDasar;

    public $atasan;
    public $bawahan;
    public $olah_raga;
    public $peci;

    protected $rules = [
        'kode_daftar' => 'required',
        'atasan' => 'required',
        'bawahan' => 'required',
        'olah_raga' => 'required',
        'peci' => 'nullable',
    ];

    protected $messages = ['*.required' => 'Tidak Boleh Kosong'];

    public function mount() {}

    public function render()
    {
        return view('livewire.seragam.ukur-seragam');
    }

    public function updatedKodeDaftar()
    {
        $this->user = Siswa::query()
            ->whereKodeDaftar($this->kode_daftar)
            ->with(['biodata', 'seragam'])
            ->first();

        $this->nama = $this->user?->name;
        $this->sekolahAsal = $this->user?->biodata?->nama_sekolah_pindahan;
        $this->sekolahDasar = $this->user?->biodata?->nama_sekolah_dasar;
        $this->atasan = $this->user?->seragam?->atasan;
        $this->bawahan = $this->user?->seragam?->bawahan;
        $this->olah_raga = $this->user?->seragam?->olah_raga;
        $this->peci = $this->user?->seragam?->peci;
    }


    public function simpan()
    {
        $this->validate();

        Seragam::updateOrCreate(
            [
                'kode_daftar' => $this->kode_daftar
            ],
            [
                'atasan' => $this->atasan,
                'bawahan' => $this->bawahan,
                'olah_raga' => $this->olah_raga,
                'peci' => $this->peci,
                'user_id' => Auth::id()
            ]
        );

        $this->user->update(['terukur' => true]);

        $this->notification()->send([
            'icon' => 'success',
            'title' => 'Berhasil!',
            'description' => 'Berhasil Simpan Ukur Seragam.',
        ]);

        $this->updatedKodeDaftar();
    }
}
