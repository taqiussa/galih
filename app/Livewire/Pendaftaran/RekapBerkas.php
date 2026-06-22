<?php

namespace App\Livewire\Pendaftaran;

use App\Models\Siswa;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class RekapBerkas extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        return view('livewire.pendaftaran.rekap-berkas');
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
