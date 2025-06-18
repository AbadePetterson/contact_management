<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;
use Livewire\Attributes\Title;

class ContactEdit extends Component
{
    public $contact;
    public $contactId;
    public $name;
    public $email;
    public $phone;
    public $onBack;
    public $success = '';
    public $error = '';

    public function mount($contactId, $onBack = null)
    {
        $this->contactId = $contactId;
        $this->onBack = $onBack;
        $this->loadContact();
    }

    public function loadContact()
    {
        $this->contact = Contact::findOrFail($this->contactId);
        $this->name = $this->contact->name;
        $this->email = $this->contact->email;
        $this->phone = $this->contact->phone;
    }

    public function updateContact()
    {
        $this->validate([
            'name' => 'required|string|min:5',
            'email' => 'required|email|unique:contacts,email,' . $this->contactId,
            'phone' => 'required|digits:9|unique:contacts,phone,' . $this->contactId,
        ]);

        try {
            $this->contact->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
            ]);

            $this->success = 'Contato atualizado com sucesso!';
            $this->error = '';
            
            // Redirecionar após 2 segundos
            $this->dispatch('contactUpdated');
        } catch (\Exception $e) {
            $this->error = 'Erro ao atualizar contato: ' . $e->getMessage();
            $this->success = '';
        }
    }

    public function goBack()
    {
        if ($this->onBack) {
            $this->dispatch($this->onBack);
        }
    }

    #[Title('Editar Contato')]
    public function render()
    {
        return view('livewire.contact-edit');
    }
}
