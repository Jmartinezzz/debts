<div>
   <h1 class="font-weight-bold">Deudores</h1>
   <section class="row">
      <div class="col-md-6">
         <button class="btn btn-primary" data-toggle="modal" data-target="#modalDebtors">Agregar nuevo</button>
     </div>
     <!-- Modal -->
     <div wire:ignore.self class="modal fade" id="modalDebtors" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Nuevo registro</h5>
             <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
             </button>
           </div>
           <div class="modal-body">
                 @include("livewire.debtors.$view")
           </div>
           <div class="modal-footer">
             <button wire:click="resetFields" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
             <button wire:click="store" type="button" class="btn btn-primary">Guardar</button>
           </div>
         </div>
       </div>
     </div>
     <!-- Modal -->
     <div class="col-12 col-md-6 mt-3 mt-md-0">
         <div class="d-flex justify-content-end">
             <input wire:model="search" placeholder="Ingrese el nombre a buscar" class="form-control" type="search">
             {{-- <button wire:click="$refresh" class="btn btn-secondary">Buscar</button>   --}}
         </div>
     </div>        
 </section>
@if(!isMobile())
   <div class="table-responsive">        
        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Creado en</th>
                    <th>Deuda</th>
                    <th>Acciones</th>
                </tr>          
            </thead>
            <tbody>
                @forelse($debtors as $debtor)                
                    <tr>                        
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $debtor->name }}</td>
                        <td>{{ $debtor->description }}</td>
                        <td>{{ $debtor->created_at->format('d-m-Y'); }}</td>
                        <td>${{ $debtor->total() }}</td>
                        <td>
                            <a data-bs-toggle="tooltip" title="Ver" href="{{ route('debts.detail', ['debtor' => $debtor->id]) }}" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-eye"></i>
                            </a>

                            <button data-bs-toggle="tooltip" title="Editar" wire:click="edit({{ $debtor }})"  data-toggle="modal" data-target="#modalDebtorsEdit"  class="btn btn-sm btn-outline-success mt-1 mt-md-0">
                                <i class="fas fa-edit"></i>
                            </button>

                            <button data-bs-toggle="tooltip" title="Eliminar" wire:click="wantoDelete({{ $debtor->id }})" class="btn btn-sm btn-outline-danger mt-1 mt-md-0">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                       
                    </tr>                     
                @empty
                    <tr class="text-center">
                        <td colspan="6" class="font-weight-bold">No hay registros aún</td>
                    </tr>
                @endforelse()
            </tbody>
            <!-- Edit Modal -->
            <div wire:ignore.self class="modal fade" id="modalDebtorsEdit" tabindex="-1" role="dialog" aria-labelledby="modalDebtorsEdit" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edición de deudor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        @include("livewire.debtors.$view")
                  </div>
                  <div class="modal-footer">
                    <button wire:click="resetFields" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button wire:click="update({{ $debtor_id }})" type="button" class="btn btn-primary">Actualizar</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Edit Modal -->        
        </table>
   </div>
@endif
@if(isMobile())
   <section>
     <div class="row">
         @forelse($debtors as $debtor)    
             <div class="col-12 mt-4">
                 <a href="{{ route('debts.detail', ['debtor' => $debtor->id]) }}" style="text-decoration-line: none;">
                 <div class="card shadow rounded">
                     <div class="card-header bg-primary text-white rounded-top">
                         <h5 class="card-title text-capitalize">{{ $debtor->name }}</h5>
                     </div>
                   <div class="card-body">                        
                     <h6 class="card-subtitle mb-2 text-muted">{{ $debtor->description }}</h6>
                     <p class="card-text">Total: {{ $debtor->total() }}</p>
                     <section class="d-flex justify-content-end">                            
                         <p class="text-secondary">Fecha de creación: {{ $debtor->created_at->format('d-m-Y') }}</p>
                     </section>
                   </div>
                 </div>  
             </a>
             </div>          
                            
         @empty
            <p class="text-center font-weight-bold mt-5">
               @if($search)
                  No se encontro el registro
               @else
                  No hay registros aún
               @endif
            </p>
         @endforelse()         
     </div>  
   </section>
@endif
</div> 
<script>
    $(function(){
        $(".clickable-card").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>
