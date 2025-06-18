<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Models\Contact;

class FormContact extends Component
{

    public $name, $email, $phone;

    public function newContact(){
        $this->validate([
            'name' => 'required|min:5|max:50',
            'email' => 'required|email|min:5|max:50',
            'phone' => 'required|min:5|max:50',
        ]);

        Contact::firstOrCreate([
            'name' => $this->name,
            'email' => $this->email,
        ], 
        [
            'phone' => $this->phone
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.form-contact');
    }
}
