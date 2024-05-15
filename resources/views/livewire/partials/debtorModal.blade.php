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