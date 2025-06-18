<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;
use Livewire\Attributes\On;

class Contacts extends Component
{
    public $contacts;
    public $search = '';

    public function mount()
    {
        $this->updateContacts();
    }

    #[On('contactAdded')]
    public function refreshContacts()
    {
        $this->updateContacts();
    }

    public function updatedSearch()
    {
        $this->updateContacts();
    }

    private function updateContacts()
    {
        $this->contacts = Contact::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('phone', 'like', '%' . $this->search . '%')
            ->orderBy('name')
            ->get();
    }

    public function render()
    {
        return view('livewire.contacts');
    }
}
