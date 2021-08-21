<div>
    <div class="form-group">
        <label for="total">Total:</label>
        <input 
            id="total" 
            type="number" 
            placeholder="Ingrese la cantidad" 
            class="form-control" 
            wire:model.defer="total" 
            step="0.01" 
            min="0"
        >
        @error('total') <span class="text-danger small">{{ $message}}</span> @enderror        
    </div>
    <div class="form-group">
        <label for="description">Descripción:</label>
        <textarea 
            id="description"    
            class="form-control"   
            rows="4" 
            wire:model.defer="description"
            placeholder="Puede agregar una descripción" 
        >
        </textarea>
    </div>
</div>
