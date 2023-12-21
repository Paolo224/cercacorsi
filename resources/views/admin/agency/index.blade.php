@extends('layouts.admin')

@section('content')
<div class="container-fluid container-xxl">
    <div class="row mt-3">
            <div class="col-12 text-end">
                <a href="{{route('admin.le-mie-aziende.create')}}" class="btn btn-sm btn-success" style="width: 80px;">
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
                        <div class="img_container" style="position: relative; overflow: hidden; border-top-left-radius: 0.375rem; border-top-right-radius: 0.375rem; height: 200px; width: 100%; background-position: center; background-size: cover; background-image: url('{{asset('storage/' . $agency->immagine_copertina)}}');">
                            @if ($agency->visibile == 0)    
                            <div class="banner_visibile text-center align-middle">
                                Non Visibile
                            </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <img src="{{asset('storage/' . $agency->logo)}}" class="card-img-top" alt="{{$agency->nome}}" style="width: 50px;"><h5 class="ms-3 align-middle m-0 card-title d-inline-block">{{$agency->nome}}</h5>
                            <p class="card-text mt-3 mb-0"><i class="fa-regular fa-envelope me-2" style="color: #000000;"></i>{{$agency->email}}</p>
                            <p class="card-text mt-2 mb-0"><i class="fas fa-phone me-2"></i>{{$agency->telefono1}}</p>
                            <div class="mt-3 d-flex justify-content-between">
                                <a href="{{route('admin.le-mie-aziende.show', $agency->slug)}}" class="btn btn-sm btn-primary">
                                    Dettagli
                                </a>
                                <a href="{{route('admin.le-mie-aziende.edit', $agency->slug)}}" class="btn btn-sm btn-warning">
                                    Modifica
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
@endsection