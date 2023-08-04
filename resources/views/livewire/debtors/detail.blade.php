<div>
    <h1 class="font-weight-bold">
        Deuda de  
        <p class="text-danger d-inline">{{ $debtor->name }} (${{ $this->totality }})</p>
    </h1>
    <section class="row">
        <div class="col-md-6">
            <a href="{{ route('home') }}" class="btn btn-danger">Atrás</a>
            <button class="btn btn-primary d-block d-md-inline mt-2 mt-md-0" wire:click="setType('charge')" data-toggle="modal" data-target="#modalDebts">Agregar nueva</button>
            <button class="btn btn-info d-block d-md-inline mt-2 mt-md-0" wire:click="setType('payment')" data-toggle="modal" data-target="#modalDebts">Agregar abono</button>
            <!-- Modal -->
            <div wire:ignore.self class="modal fade" id="modalDebts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$type == 'charge' ? 'Nuevo registro de deuda' : 'Nuevo abono'}}</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    </button>
                  </div>
                  <div class="modal-body">
                        @include("livewire.debtors.debtsForm")
                  </div>
                  <div class="modal-footer">
                    <button wire:click="resetFields" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button wire:click="save" type="button" class="btn btn-primary">Guardar</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal -->
            @if($debts->count() > 0)
                <button class="btn btn-primary d-block d-md-inline mt-2" wire:click="wantoReset">Reestablecer a $0.0</button>
            @endif
        </div>     
    </section>
     @if(!isMobile())
        <div class="table-responsive">
            <table class="table table-hover mt-3">
                <thead>
                    <tr >
                        <th>#</th>
                        <th>Total</th>
                        <th>Descripción</th>
                        <th>Ingresado en</th>
                        <th>Ingreado por</th>
                        <th>Acciones</th>
                    </tr>          
                </thead>
                <tbody>
                    @forelse($debts as $debt)
                        @php
                            $totalDebt += $debt->total;
                        @endphp
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>${{ number_format($debt->total, 2, '.', ',') }}</td>
                            <td>{{ $debt->description }}</td>
                            <td>{{ $debt->created_at->format('d-m-Y h:i A') }}</td>
                            <td>{{ $debt->user->name }}</td>
                            <td>
                                {{-- <a href="{{ route('debts.detail', ['debt' => $debt->id]) }}" class="btn btn-sm btn-outline-secondary">ver</a> --}}
                                <button data-bs-toggle="tooltip" title="Editar" wire:click="edit({{ $debt }})"  data-toggle="modal" data-target="#modalDebtsEdit" class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-edit"></i>                                
                                </button>

                                <button data-bs-toggle="tooltip" title="Eliminar" wire:click="wantoDelete({{ $debt }})" class="btn btn-sm btn-outline-danger">
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
                @if($debts->count() > 0)
                    <tfoot>
                        <tr>
                            <th colspan="6">Deuda total: &nbsp; ${{ $this->totality }}</th>
                        </tr>
                    </tfoot>
                @endif                 
            </table>
        </div>  
    @else
        <section>
        <div class="row">
        @forelse($debts as $debt)  
            <div class="col-12 mt-4">               
                <div @class(['card', 'rounded', 'border-success' => $debt->type == 'payment', 'border-primary' => $debt->type == 'charge'])>
                    <div @class(['card-header d-flex justify-content-between', 'border-success' => $debt->type == 'payment', 'border-primary' => $debt->type == 'charge']) >
                        <div>
                            Sub total: {{ number_format($debt->total, 2, '.', ',') }}
                        </div>
                       @if($debt->type == 'payment')
                         <div>
                            <span class="badge rounded-pill bg-success">Abono</span>
                        </div>
                       @endif
                    </div>
                    <div class="card-body">                        
                        <p class="card-text">{{ $debt->description }}</p>
                        <div class="text-center">
                            <button data-bs-toggle="tooltip" title="Editar" wire:click="edit({{ $debt }})"  data-toggle="modal" data-target="#modalDebtsEdit" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-edit"></i>  
                                Editar                              
                            </button>

                            <button data-bs-toggle="tooltip" title="Eliminar" wire:click="wantoDelete({{ $debt }})" class="btn btn-sm btn-outline-danger">
                                <i class="fas fa-trash"></i>   
                                Eliminar                             
                            </button>
                        </div>
                    </div>
                    <div @class(['card-footer', 'text-muted', 'text-center', 'border-success' => $debt->type == 'payment', 'border-primary' => $debt->type == 'charge'])>
                        Ingresado por: {{ $debt->user->name }} <br /> <small>{{ $debt->created_at->format('d-m-Y h:i A') }}</small>
                    </div>
                </div> 
            </div>          
                            
         @empty
            <p class="text-center font-weight-bold mt-5">               
                No hay registros aún
            </p>
         @endforelse()
         @if($debts->count() > 0)
            <h5 class="text-center mt-3">Deuda total: &nbsp; ${{ $this->totality }}</h5>
        @endif
         
     </div>  
    </section>
    @endif
    <!-- Edit Modal -->
    <div wire:ignore.self class="modal fade" id="modalDebtsEdit" tabindex="-1" role="dialog" aria-labelledby="modalDebtsEdit" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edición de deuda</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                @include("livewire.debtors.debtsForm")
          </div>
          <div class="modal-footer">
            <button wire:click="resetFields" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button wire:click="update({{ $debt_id }})" type="button" class="btn btn-primary">Actualizar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Edit Modal -->     
</div> 
