<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;

class MainComponent extends Component
{
    public $currentView = 'list'; // list, detail, form
    public $selectedContactId = null;

    #[Title('Gerenciamento de Contatos')]
    public function render()
    {
        return view('livewire.main-component');
    }

    #[On('showContactDetail')]
    public function showContactDetail($contactId)
    {
        $this->selectedContactId = $contactId;
        $this->currentView = 'detail';
    }

    #[On('showContactEdit')]
    public function showContactEdit($contactId)
    {
        $this->selectedContactId = $contactId;
        $this->currentView = 'form';
    }

    public function showContactForm()
    {
        $this->currentView = 'form';
        $this->selectedContactId = null;
    }

    public function showContactList()
    {
        $this->currentView = 'list';
        $this->selectedContactId = null;
    }

    #[On('contactDeleted')]
    public function contactDeleted()
    {
        $this->showContactList();
    }
}
