<?php

namespace App\Livewire\Agama;

use App\Models\Siswa;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Hasil Agama')]
class HasilAgama extends Component
{
    use WithPagination;

    public $search;

    public function mount() {}

    public function render()
    {
        return view('livewire.agama.hasil-agama');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    #[Computed()]
    public function listSiswa()
    {
        return Siswa::query()
            ->withWhereHas('seleksiAgama')
            ->when($this->search, fn($q) => $q->where('name', 'like', '%' . $this->search . '%'))
            ->paginate(10);
    }
}
