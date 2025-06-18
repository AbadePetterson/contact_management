<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class MainComponent extends Component
{
    #[Title('contacts')]
    public function render()
    {
        return view('livewire.main-component');
    }
}
