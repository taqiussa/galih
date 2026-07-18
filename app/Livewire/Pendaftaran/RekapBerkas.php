<?php

namespace App\Livewire\Pendaftaran;

use App\Exports\ExportBerkas;
use App\Models\Siswa;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class RekapBerkas extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        return view('livewire.pendaftaran.rekap-berkas');
    }

    public function download_data()
    {
        return Excel::download(new ExportBerkas(), 'Rekap Berkas PSB.xlsx');
    }

    #[Computed()]
    public function listSiswa()
    {
        return Siswa::query()
            ->with([
                'berkas'
            ])
            ->when($this->search, fn($q) => $q->where('name', 'like', '%' . $this->search . '%'))
            ->paginate(10);
    }
}
