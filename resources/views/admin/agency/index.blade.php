@extends('layouts.admin')

@section('content')
<div class="container-fluid container-xxl">
    <div class="row">
        <div class="col-12">
            @if(!$agencies->isNotEmpty())
            <div class="offset-11 col-1 mt-3">
                <a href="{{route('admin.agency.create')}}" class="btn btn-sm btn-success">
                    + Nuovo
                </a>
            </div>
                <h3 class="text-center mt-5 mb-2">Non hai inserito nessuna Azienda...</h3>
                <h4 class="text-center mb-2">inserisci la tua azienda cliccando il tasto "Nuovo"</h4>
            @else
            <table class="table table-striped table-hover mt-5 table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th scope="col" class="text-center">#id</th>
                    <th scope="col" class="text-center">Logo</th>
                    <th scope="col" class="text-center">Nome Azienda</th>
                    <th scope="col" class="text-center">Email Aziendale</th>
                    <th scope="col" class="text-center">Telefono Aziendale</th>
                    <th scope="col" class="text-center">Partita IVA</th>
                    <th scope="col" class="text-center">
                        <a href="{{route('admin.agency.create')}}" class="btn btn-sm btn-success">
                            + Aggiungi un Azienda
                        </a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($agencies as $agency)
                        <tr>
                            <td class="text-center align-middle">{{$agency->id}}</td>
                            <td class="text-center align-middle">
                                <img src="{{asset('storage/' . $agency->logo)}}" class="card-img-top" alt="{{$agency->nome}}" style="width: 50px;">
                            </td>
                            <td class="text-center align-middle">{{$agency->nome}}</td>
                            <td class="text-center align-middle">{{$agency->email}}</td>
                            <td class="text-center align-middle">{{$agency->telefono1}}</td>
                            <td class="text-center align-middle">{{$agency->p_iva}}</td>
                            <td class="text-center align-middle">
                                <a href="{{route('admin.agency.show', $agency->id)}}" class="btn btn-sm btn-primary">
                                    Mostra
                                </a>
                                <a href="{{route('admin.agency.edit', $agency->id)}}" class="btn btn-sm btn-warning">
                                    Modifica
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
              @endif
        </div>
    </div>
</div>
@endsection