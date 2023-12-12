@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{route('admin.agency.index')}}" class="btn btn-primary">Torna alla Lista</a>
        </div>
        <div class="col-12">
            <div class="card mb-3 mt-2">
                <div class="card-body">
                    <h1 class="card-title mb-4">{{$agency->nome}}</h1>
                    <p class="card-text"><span class="fw-bold d-block">Descrizione Azienda: </span>{{$agency->descrizione}}</p>
                    <p class="card-text"><span class="fw-bold d-block">Indirizzo: </span>{{$agency->indirizzo}}</p>
                    <p class="card-text"><span class="fw-bold d-block">Città: </span>{{$agency->citta}}</p>
                    <p class="card-text"><span class="fw-bold d-block">Codice Postale: </span>{{$agency->cap}}</p>
                    <p class="card-text"><span class="fw-bold d-block">Paese: </span>{{$agency->paese}}</p>
                    <p class="card-text"><span class="fw-bold d-block">Ragione Sociale: </span>{{$agency->ragione_sociale}}</p>
                    <p class="card-text"><span class="fw-bold d-block">Partita IVA: </span>{{$agency->p_iva}}</p>
                    <p class="card-text"><span class="fw-bold d-block">Tipologia dell'Azienda: </span>{{$agency->tipo}}</p>
                    <div class="card-text d-flex flex-row justify-content-around">
                        <p class="text-body-primary">{{$agency->pec_sdi}}</p>
                        <p class="text-body-primery">{{$agency->telefono}}</p>
                    </div>
                </div>
            </div>
            <div class="bottoni_show d-flex justify-content-center">
                <a href="{{route('admin.agency.edit', $agency->id)}}" class="btn btn-warning me-3">
                    Modifica
                </a> 
            </div>
        </div>
    </div>
</div>
@endsection