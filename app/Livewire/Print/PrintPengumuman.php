<?php

namespace App\Livewire\Print;

use App\Models\Siswa;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Print Pengumuman')]
class PrintPengumuman extends Component
{
    public $kode_daftar;

    public $user;

    public $nama;

    public $sekolahDasar;

    public $sekolahAsal;

    public function render()
    {
        return view('livewire.print.print-pengumuman');
    }

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
}
