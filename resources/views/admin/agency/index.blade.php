@extends('layouts.admin')

@section('content')
<div class="container-fluid container-xxl">
    <div class="row mt-3">
            <div class="col-12 text-end">
                <a href="{{route('admin.agency.create')}}" class="btn btn-sm btn-success" style="width: 80px;">
                    + Nuovo
                </a>
            </div>
            @if(!$agencies->isNotEmpty())
                <h3 class="text-center mt-5 mb-2">Non hai inserito nessuna Azienda...</h3>
                <h4 class="text-center mb-2">inserisci la tua azienda cliccando il tasto "Nuovo"</h4>
            @else
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @foreach ($agencies as $agency)
                <div class="col">
                    <div class="card">
                        <div class="img_container" style="border-top-left-radius: 0.375rem; border-top-right-radius: 0.375rem; height: 200px; width: 100%; background-position: center; background-size: cover; background-image: url('{{asset('storage/' . $agency->immagine_copertina)}}');">
                        </div>
                        <div class="card-body">
                            <img src="{{asset('storage/' . $agency->logo)}}" class="card-img-top" alt="{{$agency->nome}}" style="width: 50px;"><h5 class="ms-3 align-middle m-0 card-title d-inline-block">{{$agency->nome}}</h5>
                            <p class="card-text mt-3 mb-0">{{$agency->email}}</p>
                            <p class="card-text mt-2 mb-0">{{$agency->telefono1}}</p>
                            <div class="mt-2 d-flex justify-content-between">
                                <a href="{{route('admin.agency.show', $agency->id)}}" class="btn btn-sm btn-primary">
                                    Dettagli
                                </a>
                                <a href="{{route('admin.agency.edit', $agency->id)}}" class="btn btn-sm btn-warning">
                                    Modifica
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{-- <table class="table table-striped table-hover mt-5 table-bordered">
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
              </table> --}}
              @endif
        </div>
    </div>
</div>
@endsection