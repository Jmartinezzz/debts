<div>
    <div class="form-group">
        <label for="">Nombre:</label>
        <input type="text" class="form-control" wire:model.defer="name">
        @error('name') <span>{{ $message}}</span> @enderror        
    </div>
    <div class="form-group">
        <label for="">Descripción:</label>
        <textarea class="form-control"  id=""  rows="4" wire:model.defer="description"></textarea>
    </div>
</div>
