<?php

namespace App\Livewire\Siswa;

use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Hasil Pengumuman Siswa')]
class HasilPengumumanSiswa extends Component
{
    public $siswa;

    public function mount()
    {
        $this->siswa = Auth::guard('siswa')->user() ?? Auth::user();
    }

    public function render()
    {
        return view('livewire.siswa.hasil-pengumuman-siswa');
    }

    #[Computed()]
    public function hasil()
    {
        return Siswa::query()
            ->whereNis(Auth::getUser()->nis)
            ->with([
                'akademik',
                'seleksiAgama',
            ])
            ->first();
    }
}
