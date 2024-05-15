@extends('layouts.app')

@section('content')
<div class="container">
    @livewire('debtors.detail', ['debtor' => $debtor])

</div>
@endsection
