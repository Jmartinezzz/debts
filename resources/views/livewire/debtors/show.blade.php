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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    @include("livewire.debtors.$view")
              </div>
              <div class="modal-footer">
                <button wire:click="resetFields" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button wire:click="store" type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div class="col-12 col-md-6 mt-3 mt-md-0">
            <div class="d-flex justify-content-end">
                <input placeholder="Ingrese el nombre a buscar" class="form-control" type="search">
                <button class="btn btn-secondary">Buscar</button>  
            </div>
        </div>        
    </section>
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

                            <button data-bs-toggle="tooltip" title="Eliminar" wire:click="wantoDelete({{ $debtor->id }})" class="btn btn-sm btn-outline-danger mt-1 mt-lg-0">
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
</div> 
