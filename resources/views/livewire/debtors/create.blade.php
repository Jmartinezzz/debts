<div>
    <div class="form-group">
        <label for="name">Nombre:</label>
        <input id="name" type="text" class="form-control" wire:model.defer="name" placeholder="Ingrese el nombre del deudor">
        @error('name') <span class="text-danger small">{{ $message}}</span> @enderror        
    </div>
    <div class="form-group">
        <label for="description">Descripción:</label>
        <textarea id="description" class="form-control"  id=""  rows="4" wire:model.defer="description" placeholder="Puede ingresar una descripción"></textarea>
    </div>
</div>
