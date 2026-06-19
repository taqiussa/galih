<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutSiswa extends Component
{
    public function mount()
    {
        Auth::guard('siswa')->logout();

        Session::invalidate();
        Session::regenerateToken();
        $this->redirectRoute('login', navigate: true);
    }
}
