<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;
use Livewire\Attributes\On;

class Contacts extends Component
{
    public $contacts;
    public $search = '';
    public $showConfirmDelete = false;
    public $contactToDelete = null;

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

    public function showContactDetail($id)
    {
        $this->dispatch('showContactDetail', contactId: $id);
    }

    public function showContactEdit($id)
    {
        $this->dispatch('showContactEdit', contactId: $id);
    }

    public function confirmDelete($id)
    {
        $this->contactToDelete = $id;
        $this->showConfirmDelete = true;
    }

    public function deleteContact()
    {
        if ($this->contactToDelete) {
            Contact::find($this->contactToDelete)?->delete();
            $this->contactToDelete = null;
            $this->showConfirmDelete = false;
            $this->updateContacts();
        }
    }

    public function cancelDelete()
    {
        $this->contactToDelete = null;
        $this->showConfirmDelete = false;
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
