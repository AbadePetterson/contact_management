<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;

class Contacts extends Component
{
    public $search = '';

    public function render()
    {
        $contacts = Contact::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('phone', 'like', '%' . $this->search . '%')
            ->orderBy('name')
            ->get();

        return view('livewire.contacts', compact('contacts'));
    }
}
