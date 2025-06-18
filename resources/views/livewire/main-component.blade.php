<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="text-center my-5">
        <img src="{{ asset('assets/images/logo.png') }}" alt='logo' width="128px">
    </div>

    <div class="container">
        @if($currentView === 'list')
            <div class="row">
                <div class="col-md-4">
                    @livewire('form-contact')
                </div>
                <div class="col-md-8">
                    @livewire('contacts', ['onContactClick' => 'showContactDetail'])
                </div>
            </div>
        @elseif($currentView === 'detail')
            @livewire('contact-detail', ['contactId' => $selectedContactId, 'onBack' => 'showContactList'])
        @elseif($currentView === 'edit')
            @livewire('contact-edit', ['contactId' => $selectedContactId, 'onBack' => 'showContactList'])
        @elseif($currentView === 'form')
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @livewire('form-contact')
                    <div class="text-center mt-3">
                        <button wire:click="showContactList" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Voltar à Lista
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
