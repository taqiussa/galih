<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('PSB SMP Mifda')]
#[Layout('layouts.guest')]
class Landing extends Component
{
    public function mount() {}

    public function render()
    {
        return view('livewire.landing');
    }
}
