<?php

namespace App\Livewire\Wawancara;

use App\Exports\ExportWawancara;
use App\Models\Siswa;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

#[Title('Hasil Wawancara')]
class HasilWawancara extends Component
{
    use WithPagination;

    public $search;

    public function mount() {}

    public function updatedSearch()
    {
        $this->resetPage();
    }

    #[Computed()]
    public function listSiswa()
    {
        return Siswa::query()
            ->withWhereHas('wawancara')
            ->when($this->search, fn($q) => $q->where('name', 'like', '%' . $this->search . '%'))
            ->paginate(10);
    }

    public function download_data()
    {
        return Excel::download(new ExportWawancara(), 'Hasil Seleksi Wawancara.xlsx');
    }


    public function render()
    {
        return view('livewire.wawancara.hasil-wawancara');
    }
}
