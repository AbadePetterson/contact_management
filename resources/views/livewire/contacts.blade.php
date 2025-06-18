<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="card-title mb-0">Lista de Contatos</h5>
        <div class="input-group" style="width: 300px;">
            <input type="text" class="form-control" placeholder="Buscar contatos..." wire:model.live="search">
            <span class="input-group-text">
                <i class="fas fa-search"></i>
            </span>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <button wire:click="showContactDetail({{ $contact->id }})" class="btn btn-sm btn-outline-info" title="Ver detalhes">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-warning" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Deletar" wire:click="confirmDelete({{ $contact->id }})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Nenhum contato encontrado.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($contacts->count() > 0)
        <div class="text-muted small">
            Total: {{ $contacts->count() }} contato(s)
        </div>
    @endif

    <!-- Modal de confirmação -->
    @if($showConfirmDelete)
        <div class="modal fade show" tabindex="-1" style="display: block; background: rgba(0,0,0,0.5);" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmar exclusão</h5>
                    </div>
                    <div class="modal-body">
                        <p>Tem certeza que deseja deletar este contato?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" wire:click="cancelDelete">Cancelar</button>
                        <button class="btn btn-danger" wire:click="deleteContact">Deletar</button>
                    </div>
                </div>
            </div>
        </div>
        <style>
            body { overflow: hidden; }
        </style>
    @endif
</div>
