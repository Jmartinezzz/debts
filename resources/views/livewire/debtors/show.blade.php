<div>
    <h1 class="font-weight-bold">Deudores</h1>
    <section class="row">
        <div class="col-md-6">
            <button class="btn btn-primary">Agregar nuevo</button>
        </div>
        <div class="col-md-6 ">
            <div class="form-inline">
                <input class="form-control" type="search">
                <button class="btn btn-secondary">Buscar</button>
            </div>
            
        </div>
    </section>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Creado en</th>
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
                    <td>
                        <a href="{{ route('debts.detail', ['debtor' => $debtor->id]) }}" class="btn btn-sm btn-outline-secondary">ver</a>
                        <button class="btn btn-sm btn-outline-secondary">edit</button>
                        <button class="btn btn-sm btn-outline-secondary">delete</button>
                    </td>
                </tr>
            @empty
                <p>No users</p>
            @endforelse()
        </tbody>
        
    </table>
</div> 
