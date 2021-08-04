<div>
    <h1 class="font-weight-bold">Deuda de  <p class="text-danger d-inline">{{ $debtor->name }}</p></h1>
    <section class="row">
        <div class="col-md-6">
            <a href="{{ URL::previous() }}" class="btn btn-danger">Atrás</a>
            <button class="btn btn-primary">Agregar nueva</button>
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
                        <button class="btn btn-sm btn-outline-secondary">edit</button>
                        <button class="btn btn-sm btn-outline-secondary">delete</button>
                    </td>
                </tr>
            @empty
                <tr class="text-center">
                    <td colspan="6s" class="font-weight-bold">No hay registros aún</td>
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
        
    </table>
</div> 
