<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Logout extends Component
{
    public function mount()
    {
        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();
        $this->redirectRoute('login', navigate: true);
    }
}
