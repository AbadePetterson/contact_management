<div class="card p-4">
    <h5 class="card-title mb-3 text-center">Novo Contato</h5>
    <form wire:submit="newContact">
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" wire:model="name" placeholder="Digite o nome completo">
            @error('name')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" wire:model="email" placeholder="exemplo@email.com">
            @error('email')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="phone" class="form-label">Telefone (9 dígitos)</label>
            <input type="text" class="form-control" id="phone" wire:model="phone" maxlength="9" placeholder="123456789" pattern="[0-9]{9}">
            @error('phone')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>
        <div class="d-grid">
            <button class="btn btn-primary py-2">Salvar</button>
        </div>
        @if($error)
            <div class="alert alert-danger text-center mt-3" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2000)">
                {{ $error }}
            </div>
        @endif
        @if($success)
            <div class="alert alert-success text-center mt-3" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2000)">
                {{ $success }}
            </div>
        @endif
    </form>
</div>
