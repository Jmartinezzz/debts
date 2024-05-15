<div>    
    <section class="container">
        <div>
            <form>
                <div class="row justify-content-center">
                    <div class="col-12 col-6 ">
                        <a class="mb-5" href="{{ route('home') }}">&lt; Atrás</a>
                        <div class="mb-3 mt-4">
                            <label for="porcentaje" class="form-label">Ingrese el porcentaje:</label>
                            <input wire:model.lazy="percent" type="number" class="form-control"  placeholder="" required>
                        </div> 
                        <div class="mb-3">
                            <label for="valor" class="form-label">Ingrese lan cantidad:</label>
                            <input wire:model.lazy="amount" type="number" class="form-control"  placeholder="" min="0" required>
                        </div>
                        <div class="mb-3 d-grid gap-2">
                            <input wire:click.prevent="calculateDiscount"  type="submit" class="btn btn-primary" value="Calcular" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
       @if(!$hide)
          
            <div>            
                <div class="row justify-content-center">
                     @if($percent && $amount)                      
                    <div class="col-12 col-6  text-white text-center py-2 bg-success">  
                        <h5>El {{ $percent }}% de ${{ $amount }} es: ${{ $valuePercent }}</h5>
                        <h5>${{ $amount }} menos el {{ $percent }}% es: ${{ $total }}</h5>
                    </div>
                    <div class="col-12 col-7  text-center mt-2">                        
                        <button wire:click="clear" class="btn btn-secondary">Limpiar</button>
                    </div>
                    @else
                    <div class="col-12 col-6  text-white text-center py-2 bg-danger">  
                         <h5>Ingrese ambos valores</h5>
                    </div>
                   
                    @endif   
                </div>
            </div>
           
       @endif
    </section>
    
</div>
