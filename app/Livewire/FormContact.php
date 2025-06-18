<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class FormContact extends Component
{

    public $name, $email, $phone;

    public function newContact(){
        $this->validate([
            'name' => 'required|min:5|max:50',
            'email' => 'required|email|min:5|max:50',
            'phone' => 'required|min:5|max:50',
        ]);

        Log::info('Novo contato: ' . $this->name . '-' . $this->email . '-' . $this->phone);
    }

    public function render()
    {
        return view('livewire.form-contact');
    }
}
