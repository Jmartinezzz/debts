<div>
    <div class="form-group">
        <label for="">Total:</label>
        <input type="number" class="form-control" wire:model.defer="total" step="0.01" min="0">
        @error('total') <span class="text-danger">{{ $message}}</span> @enderror        
    </div>
    <div class="form-group">
        <label for="">Descripción:</label>
        <textarea class="form-control"  id=""  rows="4" wire:model.defer="description"></textarea>
    </div>
</div>
