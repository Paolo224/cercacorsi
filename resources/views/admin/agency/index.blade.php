@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
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
                            <td class="text-center">{{$agency->id}}</td>
                            <td class="text-center">
                                <img src="{{asset('storage/' . $agency->logo)}}" class="card-img-top" alt="{{$agency->nome}}" style="width: 50px;">
                            </td>
                            <td>{{$agency->nome}}</td>
                            <td>{{$agency->pec_sdi}}</td>
                            <td>{{$agency->telefono}}</td>
                            <td>{{$agency->p_iva}}</td>
                            <td class="text-center">
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