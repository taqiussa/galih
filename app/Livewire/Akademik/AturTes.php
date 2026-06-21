<?php

namespace App\Livewire\Akademik;

use App\Models\Siswa;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

#[Title('Atur Tes')]
class AturTes extends Component
{
    use WireUiActions;

    public $search;

    public function mount() {}

    public function render()
    {
        return view('livewire.akademik.atur-tes');
    }

    public function confirm($id): void
    {
        $this->dialog()->confirm([
            'title'       => 'Izinkan Siswa',
            'description' => 'Izinkan Siswa Test ?',
            'acceptLabel' => 'Ya',
            'rejectLabel' => 'Batal',
            'method'      => 'simpan',
            'params'      => $id,

        ]);
    }

    public function simpan($id)
    {
        $user = Siswa::find($id);

        $user->update([
            'boleh_tes' => true
        ]);

        $this->notification()->send([
            'icon' => 'success',
            'title' => 'Berhasil!',
            'description' => 'Berhasil Izinkan Tes Akademik.',
        ]);
    }

    #[Computed()]
    public function listSiswa()
    {
        return Siswa::query()
            ->whereBolehTes(false)
            ->whereSudahTes(false)
            ->when($this->search, fn($q) => $q->where('name', 'like', '%' . $this->search . '%'))
            ->orderBy('kode_daftar')
            ->get();
    }
}
