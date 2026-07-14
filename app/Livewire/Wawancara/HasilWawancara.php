<?php

namespace App\Livewire\Wawancara;

use App\Models\Siswa;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

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

    public function render()
    {
        return view('livewire.wawancara.hasil-wawancara');
    }
}
