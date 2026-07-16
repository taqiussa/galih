<?php

namespace App\Livewire\Pengumuman;

use App\Exports\ExportHasilPengumuman;
use App\Models\Siswa;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

#[Title('Hasil Pengumuman')]
class HasilPengumuman extends Component
{
    use WithPagination;

    public $search;
    public $terima = NULL;

    public function mount() {}

    public function download_data()
    {
        return Excel::download(new ExportHasilPengumuman(), 'Hasil Pengumuman.xlsx');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    #[Computed()]
    public function listSiswa()
    {
        return Siswa::query()
            ->with([
                'biodata:kode_daftar,nama_sekolah_dasar',
                'akademik',
                'seleksiAgama',
                'seleksiWawancara',
                'wawancara'
            ])
            ->when($this->search, fn($q) => $q->where('name', 'like', '%' . $this->search . '%'))
            ->when(
                $this->terima != NUll,
                fn($q) => $q->whereDiterima($this->terima)
            )
            ->orderBy('kode_daftar')
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.pengumuman.hasil-pengumuman');
    }
}
