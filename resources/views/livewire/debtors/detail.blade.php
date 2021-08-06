<div>
    <h1 class="font-weight-bold">Deuda de  <p class="text-danger d-inline">{{ $debtor->name }}</p></h1>
    <section class="row">
        <div class="col-md-6">
            <a href="{{ route('home') }}" class="btn btn-danger">Atrás</a>
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalDebts">Agregar nueva</button>
            <!-- Modal -->
            <div wire:ignore.self class="modal fade" id="modalDebts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo registro de deuda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        @include("livewire.debtors.debtsForm")
                  </div>
                  <div class="modal-footer">
                    <button wire:click="resetFields" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button wire:click="save" type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal -->
            <button class="btn btn-primary">Reestablecer a 0</button>
        </div>     
    </section>
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
                    <td>{{ $debt->total }}</td>
                    <td>{{ $debt->description }}</td>
                    <td>{{ $debt->created_at->format('d-m-Y h:i A') }}</td>
                    <td>{{ $debt->user->name }}</td>
                    <td>
                        {{-- <a href="{{ route('debts.detail', ['debt' => $debt->id]) }}" class="btn btn-sm btn-outline-secondary">ver</a> --}}
                        <button wire:click="edit({{ $debt }})"  data-toggle="modal" data-target="#modalDebtsEdit" class="btn btn-sm btn-outline-secondary">edit</button>
                        <button wire:click="wantoDelete({{ $debt }})" class="btn btn-sm btn-outline-secondary">delete</button>
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
                    <th colspan="6">Deuda total: &nbsp; ${{ $totalDebt }}</th>                
                </tr>
            </tfoot>
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
        
    </table>
</div> 
