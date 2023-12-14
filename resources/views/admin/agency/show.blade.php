@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{route('admin.agency.index')}}" class="btn btn-primary">Torna alla Lista</a>
        </div>
        <div class="col-12">
            <div class="card mb-3 mt-2">
                <img src="{{asset('storage/' . $agency->immagine_copertina)}}" class="card-img-top immagine_copertina_show" alt="{{$agency->nome}}">
                @if ($agency->video_presentazione === '#')
                <img src="{{asset('storage/immagine_video_placeholder.png')}}" class="card-img-top immagine_copertina_show" alt="{{$agency->nome}}">
                @else
                    <video width="640" height="360" controls >
                        <source src="{{asset('storage/' . $agency->video_presentazione)}}" type="video/mp4">
                    </video>
                @endif
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
                        <p class="text-body-primary">{{$agency->email}}</p>
                        <p class="text-body-primery">{{$agency->telefono1}}</p>
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