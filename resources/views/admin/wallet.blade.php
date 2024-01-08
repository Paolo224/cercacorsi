@extends('layouts.admin')

@section('content')
    <h1 class="mt-3 mb-5">
        Ricarica il wallet...
    </h1>
    <h5>
        Ricarica da 20€
    </h5>
    <form action="{{route('admin.pagamento')}}" method="post">
        @csrf
        <input type="hidden" name="prezzo" value="20">
        <button class="btn btn-warning" type="submit">PAGA</button>
    </form>
@endsection