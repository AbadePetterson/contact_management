<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;
use Livewire\Attributes\Title;

class ContactDetail extends Component
{
    public $contact;
    public $contactId;
    public $onBack;

    public function mount($contactId, $onBack = null)
    {
        $this->contactId = $contactId;
        $this->onBack = $onBack;
        $this->loadContact();
    }

    public function loadContact()
    {
        $this->contact = Contact::findOrFail($this->contactId);
    }

    public function goBack()
    {
        if ($this->onBack) {
            $this->dispatch($this->onBack);
        }
    }

    public function deleteContact()
    {
        if ($this->contact) {
            $this->contact->delete();
            $this->dispatch('contactDeleted');
        }
    }

    #[Title('Detalhes do Contato')]
    public function render()
    {
        return view('livewire.contact-detail');
    }
}
