<?php

namespace App\Livewire\Akademik;

use App\Models\Siswa;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\WireUiActions;

#[Title('Hasil Akademik')]
class HasilAkademik extends Component
{
    use WireUiActions;
    use WithPagination;

    public $search;

    public function mount() {}

    public function render()
    {
        return view('livewire.akademik.hasil-akademik');
    }

    #[Computed()]
    public function listSiswa()
    {
        return Siswa::query()
            ->with(['jawaban'])
            ->when($this->search, fn($q) => $q->where('name', 'like', '%' . $this->search . '%'))
            ->whereSudahTes(true)
            ->paginate(10);
    }
}
