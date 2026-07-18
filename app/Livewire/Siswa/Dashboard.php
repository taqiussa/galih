<?php

namespace App\Livewire\Siswa;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
class Dashboard extends Component
{
    public function selesai()
    {
        Auth::guard('siswa')->logout();

        Session::invalidate();
        Session::regenerateToken();

        return $this->redirectRoute('login', navigate: true);
    }

    public function render()
    {
        return view('livewire.siswa.dashboard');
    }
}
