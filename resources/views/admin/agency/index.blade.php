@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row mt-3">
        @if($agencies->isNotEmpty())
        <div class="row p-0">
            <div class="col-12 d-flex justify-content-between">
                <h1 class="mb-0">
                    Tutte le Aziende
                </h1>
                <a href="{{route('admin.le-mie-aziende.create')}}" class="btn btn-sm btn-success" style="width: 80px; height: 33px;">
                    + Nuovo
                </a>
            </div>
        </div>
        @else
        <div class="row p-0">
            <div class="col-12 d-flex justify-content-end">
                <a href="{{route('admin.le-mie-aziende.create')}}" class="btn btn-sm btn-success" style="width: 80px; height: 33px;">
                    + Nuovo
                </a>
            </div>
        </div>
        @endif
            @if(!$agencies->isNotEmpty())
                <h3 class="text-center mt-5 mb-2"><i class="fa-regular fa-face-frown"></i> Non hai inserito nessuna Azienda...</h3>
                <h4 class="text-center mb-2">inserisci la tua azienda cliccando il tasto "Nuovo"</h4>
            @else
            <div class="row mt-4" >
                <div class="col-6 d-flex p-0">
                    <p class="m-0 opacity-0 d-none">Cerca per Nome dell' Azienda</p>
                    <form action="" method="GET" style="width: 100%; height: 100%" class="d-flex align-items-end">
                        <input type="text" id="SearchNomeAzienda" name="SearchNomeAzienda" placeholder="Cerca per Nome dell' Azienda">
                    </form>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 gx-3 gy-3 p-0">
                @foreach ($agencies as $agency)
                <div class="col">
                    <div class="card">
                        <div class="img_container" style="position: relative; overflow: hidden; border-top-left-radius: 0.375rem; border-top-right-radius: 0.375rem; height: 200px; width: 100%; background-position: center; background-size: cover; background-image: url('{{asset('storage/' . $agency->immagine_copertina)}}');">
                            @if ($agency->visibile == 0)    
                            <div class="banner_visibile text-center align-middle">
                                Non Visibile
                            </div>
                            @endif
                            @if ($agency->premium == 1) 
                            <div class="position-absolute" style="top: -7px; left: 20px;">
                                <svg fill="#daa520" id="Layer_1" enable-background="new 0 0 32 32" height="60" viewBox="0 0 32 32" width="60" xmlns="http://www.w3.org/2000/svg"><path d="m2 5.312h4.201v22.377c0 .381.217.729.559.897s.75.128 1.052-.105l8.188-6.314 8.188 6.313c.178.138.394.208.61.208.15 0 .302-.034.441-.103.342-.168.559-.517.559-.897v-22.376h4.202c.553 0 1-.447 1-1s-.447-1-1-1h-5.201-17.598-5.201c-.552 0-1 .447-1 1s.448 1 1 1z"/></svg>
                            </div>   
                            @endif
                        </div>
                        <div class="card-body">
                            <img src="{{asset('storage/' . $agency->logo)}}" class="card-img-top" alt="{{$agency->nome}}" style="width: 50px;"><h5 class="ms-3 align-middle m-0 card-title d-inline-block">{{$agency->nome}}</h5>
                            <p class="card-text mt-3 mb-0"><i class="fa-regular fa-envelope me-2" style="color: #000000;"></i>{{$agency->email}}</p>
                            <p class="card-text mt-2 mb-0"><i class="fas fa-phone me-2"></i>{{$agency->telefono1}}</p>
                            <div class="mt-3 d-flex  @if(Auth::user()->id_admin === 0) justify-content-between @else justify-content-end @endif">
                                @if (Auth::user()->id_admin === 0)
                                    @if ($agency->premium == 1)
                                        <button class="btn btn-sm btn-success" disabled>
                                            <i class="fa-regular fa-thumbs-up"></i> Premium Attivo
                                        </button>
                                    @else
                                        <a href="{{route('admin.le-mie-aziende.index', $agency->slug)}}" class="btn btn-sm btn-warning">
                                            Passa a Premium
                                        </a>
                                    @endif
                                @endif
                                <div>
                                    @if (Auth::user()->id_admin === 0)
                                        <form class="d-inline-block" action="{{ route('admin.toggle', $agency->slug) }}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            <button class="btn btn-sm btn-outline-dark me-3" type="submit" title="{{$agency->getABooleanFromNumber($agency->visibile) ? 'Visibile' : 'Non visibile' }}">
                                                <i class="fa-solid fa-lg fa-eye{{$agency->visibile ? '' : '-slash'}}"></i>
                                            </button>
                                        </form>
                                    @endif
                                    <a href="{{route('admin.le-mie-aziende.show', $agency->slug)}}" class="btn btn-sm btn-outline-dark me-2">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                    <a href="{{route('admin.le-mie-aziende.edit', $agency->slug)}}" class="btn btn-sm btn-outline-dark">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                </div>
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