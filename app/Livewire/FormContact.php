<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Models\Contact;

class FormContact extends Component
{

    public $name, $email, $phone;
    public $error = '';
    public $success = '';

    public function newContact(){
        $this->validate([
            'name' => 'required|string|min:5',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'required|digits:9|unique:contacts,phone',
        ]);

        $result = Contact::firstOrCreate([
            'name' => $this->name,
            'email' => $this->email,
        ], 
        [
            'phone' => $this->phone
        ]);

        if($result->wasRecentlyCreated){
            $this->reset();
            
            $this->success = 'Contact created successfully.';

            $this->dispatch('contactAdded');
        }else{
            $this->error = 'Contact already exists';
        }

    }

    public function render()
    {
        return view('livewire.form-contact');
    }
}
