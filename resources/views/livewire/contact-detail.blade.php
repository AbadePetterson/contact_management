<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Detalhes do Contato</h4>
                    <button wire:click="goBack" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </button>
                </div>
                
                <div class="card-body">
                    @if($contact)
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">ID:</label>
                                    <p class="form-control-plaintext">{{ $contact->id }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Nome:</label>
                                    <p class="form-control-plaintext">{{ $contact->name }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Email:</label>
                                    <p class="form-control-plaintext">{{ $contact->email }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Telefone:</label>
                                    <p class="form-control-plaintext">{{ $contact->phone }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Criado em:</label>
                                    <p class="form-control-plaintext">{{ $contact->created_at->format('d/m/Y H:i:s') }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Atualizado em:</label>
                                    <p class="form-control-plaintext">{{ $contact->updated_at->format('d/m/Y H:i:s') }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <div class="d-flex justify-content-between">
                            <div>
                                <button class="btn btn-warning" wire:click="$dispatch('showContactEdit', { contactId: {{ $contact->id }} })">
                                    <i class="fas fa-edit"></i> Editar Contato
                                </button>
                            </div>
                            <div>
                                <button class="btn btn-danger" wire:click="deleteContact" 
                                        onclick="return confirm('Tem certeza que deseja deletar este contato?')">
                                    <i class="fas fa-trash"></i> Deletar Contato
                                </button>
                            </div>
                        </div>
                    @else
                        <div class="text-center">
                            <p class="text-muted">Contato não encontrado.</p>
                            <button wire:click="goBack" class="btn btn-primary">Voltar à Lista</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
