@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-12 immagine_copertina_pagina_show"
            style="background-image: url('{{asset('storage/' . $agency->immagine_copertina)}}');">
            <div class="logo_azienda">
                <img class="w-100" src="{{asset('storage/' . $agency->logo)}}" alt="{{$agency->nome}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 d-flex flex-column justify-content-around">
            <div class="col-12 my-3">
                {{-- MOTTO --}}
                @if ($agency->motto != null || $agency->motto != '')
                <div class="col-12 p-0">
                    <h4 class="text-center mb-4">{{$agency->motto}}</h4>
                </div>
                @endif
                <div class="row contenitore_informazioni_aziendali fw-medium">
                    <!-- MAIL -->
                    <div class="col-6 d-flex align-items-center mb-3">
                        <i class="far fa-envelope fa-lg"></i>
                        <span class="ms-2">
                            <a href="mailto:{{$agency->email}}" class="text-black text-decoration-none">
                                {{$agency->email}}
                            </a>
                        </span>
                    </div>
                    <!-- PAESE -->
                    <div class="col-6 d-flex align-items-center mb-3">
                        <i class="far fa-flag fa-lg"></i>
                        <span class="ms-2">{{$agency->paese}}</span>
                    </div>
                    <!-- TELEFONO 1 -->
                    <div class="col-6 d-flex align-items-center mb-3">
                        <i class="fas fa-phone fa-lg"></i>
                        <span class="ms-2">
                            <a href="tel:+39{{$agency->telefono1}}" class="text-black text-decoration-none">
                                {{$agency->telefono1}}
                            </a>
                        </span>
                    </div>
                    <!-- CAP -->
                    <div class="col-6 d-flex align-items-center mb-3">
                        <i class="far fa-credit-card fa-lg"></i>
                        <span class="ms-2">{{$agency->cap}}</span>
                    </div>
                    <!-- TELEFONO 2 -->
                    <div class="col-6 d-flex align-items-center mb-3">
                        @if ($agency->telefono2 != null)        
                            <i class="fas fa-phone fa-lg"></i>
                            <span class="ms-2">
                                <a href="tel:+39{{$agency->telefono2}}" class="text-black text-decoration-none">
                                    {{$agency->telefono2}}
                                </a>
                            </span>
                        @endif
                    </div>
                    <!-- CITTA E PROVINCIA -->
                    <div class="col-6 d-flex align-items-center mb-3">
                        <i class="far fa-building fa-lg"></i>
                        <span class="ms-2">{{$agency->citta}} <span>{{$agency->provincia}}</span></span>
                    </div>
                </div>
            </div>
            <div class="col-12" style="height: 350px">
            @if ($agency->video_presentazione != null)
                <iframe width="100%" height="350" src="{{str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $agency->video_presentazione)}}" frameborder="0" allowfullscreen></iframe>
                @endif
            </div>
        </div>
        <div class="col-6">
            <div class="col-12 contenitore_descrizione_aziendale mt-2">
                <h3 class="mb-3 text-center pt-3">Descrizione Aziendale</h3>
                <p>
                    {{$agency->descrizione}}
                </p>
            </div>
        </div>
    </div>
    <div class="row contenitore_altre_info mt-4 mb-5">
        <div class="col-6">
            @if ($agency->altre_informazioni != null || $agency->altre_informazioni != '')    
                <h3 class="text-center mb-3">
                    Altre Informazioni
                </h3>
                <p>{{$agency->altre_informazioni}}</p>
            @endif
        </div>
        <div class="col-6">
            <ul>
                <li>
                    <span>Ragione Sociale</span> <span>{{$agency->ragione_sociale}}</span>
                </li>
                <li>
                    Tipo <span>{{$agency->tipo}}</span>
                </li>
                <li>
                    Partita IVA <span>{{$agency->p_iva}}</span>
                </li>
                @if (strstr($agency->tipo, '(SRL, SPA)') || strstr($agency->tipo, 'Amministrazione'))
                @else    
                <li>
                    Codice Fiscale <span>{{$agency->codice_fiscale}}</span>
                </li>    
                @endif
                <li>
                    PEC <span>{{$agency->pec}}</span>
                </li>
                <li>
                    SDI <span>{{$agency->sdi}}</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="row justify-content-between">
        <div class="col-6 d-flex justify-content-evenly">
            @if ($agency->instagram != null)
                <div class="col-1">
                    <i style="color: #833AB4" class="fa-brands fa-square-instagram fa-3x"></i>
                </div>
            @endif
            @if ($agency->facebook != null)
                <div class="col-1">
                    <i style="color: #1877F2" class="fa-brands fa-square-facebook fa-3x"></i>
                </div>
            @endif
            @if ($agency->linkedin != null)
                <div class="col-1">
                    <i style="color: #0A66C2" class="fa-brands fa-linkedin fa-3x"></i>
                </div>
            @endif
            @if ($agency->tiktok != null)
                <div class="col-1">
                    <i style="color: black" class="fa-brands fa-tiktok fa-3x"></i>
                </div>
            @endif
            @if ($agency->whatsapp != null)
                <div class="col-1">
                    <i style="color: #25D366" class="fa-brands fa-square-whatsapp fa-3x"></i>
                </div>
            @endif
            @if ($agency->youtube != null)
                <div class="col-1">
                    <i style="color: #FF0000" class="fa-brands fa-square-youtube fa-3x"></i>
                </div>
            @endif
        </div>
        <div class="col-3">
            <a class="btn btn-outline-dark" href="{{url('admin/tutti-i-corsi/Filtri?visibile=&PerCategoria=&PerAzienda=1&Ordinamento=')}}">Tutti i Corsi Di {{$agency->nome}}</a>
        </div>
    </div>
@endsection