@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover mt-5">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Nome Azienda</th>
                    <th scope="col">Email Aziendale</th>
                    <th scope="col">Telefono Aziendale</th>
                    <th scope="col">Partita IVA</th>
                    <th scope="col">
                        <a href="{{route('admin.agency.create')}}" class="btn btn-sm btn-success">
                            + Aggiungi un Azienda
                        </a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($agencies as $agency)
                        <tr>
                            <td>{{$agency->id}}</td>
                            <td>{{$agency->nome}}</td>
                            <td>{{$agency->pec_sdi}}</td>
                            <td>{{$agency->telefono}}</td>
                            <td>{{$agency->p_iva}}</td>
                            <td>
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
        </div>
    </div>
</div>
@endsection