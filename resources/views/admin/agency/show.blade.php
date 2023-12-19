@extends('layouts.admin')

@section('content')
<div class="container-fluid container-xxl">
    <div class="row py-2 d-flex justify-content-between">
        <a href="{{route('admin.agency.index')}}" class="btn btn-primary" style="width: 60px;">
            <svg fill="#ffffff" id="Expand" height="30" viewBox="0 0 16 16" width="30" xmlns="http://www.w3.org/2000/svg"><path d="m1.0728 9.1934 5.0908 3.999a1.4112 1.4112 0 0 0 1.501.165 1.4908 1.4908 0 0 0 .8354-1.3574v-1.5h4.5a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0 -.5-.5h-4.5v-1.5a1.49 1.49 0 0 0 -.8345-1.3564 1.4088 1.4088 0 0 0 -1.5014.163h-.0005l-5.09 4a1.5293 1.5293 0 0 0 0 2.3868zm.6181-1.6 5.0908-4a.4089.4089 0 0 1 .4472-.0508.4907.4907 0 0 1 .2711.4574v2a.5.5 0 0 0 .5.5h4.5v3h-4.5a.5.5 0 0 0 -.5.5v2a.4928.4928 0 0 1 -.272.458.4084.4084 0 0 1 -.4463-.0517l-5.0913-4a.5282.5282 0 0 1 .0005-.8125z"/><path d="m15 5.5a.5.5 0 0 0 -.5.5v4a.5.5 0 0 0 1 0v-4a.5.5 0 0 0 -.5-.5z"/></svg></a>
        <a href="{{route('admin.agency.edit', $agency->id)}}" class="btn btn-warning"style="width: 53px;">
            <svg fill="#000" enable-background="new 0 0 24 24" height="30" viewBox="0 0 24 24" width="30" xmlns="http://www.w3.org/2000/svg"><path d="m19 12c-.553 0-1 .448-1 1v8c0 .551-.448 1-1 1h-14c-.552 0-1-.449-1-1v-14c0-.551.448-1 1-1h8c.553 0 1-.448 1-1s-.447-1-1-1h-8c-1.654 0-3 1.346-3 3v14c0 1.654 1.346 3 3 3h14c1.654 0 3-1.346 3-3v-8c0-.553-.447-1-1-1z"/><path d="m9.376 11.089c-.07.07-.117.159-.137.255l-.707 3.536c-.033.164.019.333.137.452.095.095.223.146.354.146.032 0 .065-.003.098-.01l3.535-.707c.098-.02.187-.067.256-.137l7.912-7.912-3.535-3.535z"/><path d="m23.268.732c-.975-.975-2.561-.975-3.535 0l-1.384 1.384 3.535 3.535 1.384-1.384c.472-.471.732-1.099.732-1.767s-.26-1.296-.732-1.768z"/></svg></a>
    </div>
    <div class="row">
        <div class="col-12 immagine_copertina_pagina_show"
            style="background-image: url('{{asset('storage/' . $agency->immagine_copertina)}}');">
            <div class="logo_azienda">
                <img class="w-100" src="{{asset('storage/' . $agency->logo)}}" alt="{{$agency->nome}}">
            </div>
            <!-- MOTTO -->
            @if ($agency->motto != null || $agency->motto != '')    
            <p class="motto_aziendale">{{$agency->motto}}</p>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-6 d-flex flex-column justify-content-around">
            <div class="col-12 my-3">
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
                <li>
                    Codice Fiscale <span>{{$agency->codice_fiscale}}</span>
                </li>    
                <li>
                    PEC <span>{{$agency->pec}}</span>
                </li>
                <li>
                    SDI <span>{{$agency->sdi}}</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            @if ($agency->instagram != null)
                <div class="col-1">
                    <a href="{{$agency->instagram}}">
                        <?xml version="1.0" encoding="iso-8859-1"?>
                        <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 551.034 551.034" style="enable-background:new 0 0 551.034 551.034;" xml:space="preserve" width="50" height="50">
                        <g>
                            <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="275.517" y1="4.57" x2="275.517" y2="549.72" gradientTransform="matrix(1 0 0 -1 0 554)">
                            <stop  offset="0" style="stop-color:#E09B3D"/>
                            <stop  offset="0.3" style="stop-color:#C74C4D"/>
                            <stop  offset="0.6" style="stop-color:#C21975"/>
                            <stop  offset="1" style="stop-color:#7024C4"/>
                            </linearGradient>
                            <path style="fill:url(#SVGID_1_);" d="M386.878,0H164.156C73.64,0,0,73.64,0,164.156v222.722
                                c0,90.516,73.64,164.156,164.156,164.156h222.722c90.516,0,164.156-73.64,164.156-164.156V164.156
                                C551.033,73.64,477.393,0,386.878,0z M495.6,386.878c0,60.045-48.677,108.722-108.722,108.722H164.156
                                c-60.045,0-108.722-48.677-108.722-108.722V164.156c0-60.046,48.677-108.722,108.722-108.722h222.722
                                c60.045,0,108.722,48.676,108.722,108.722L495.6,386.878L495.6,386.878z"/>
                            
                                <linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="275.517" y1="4.57" x2="275.517" y2="549.72" gradientTransform="matrix(1 0 0 -1 0 554)">
                                <stop  offset="0" style="stop-color:#E09B3D"/>
                                <stop  offset="0.3" style="stop-color:#C74C4D"/>
                                <stop  offset="0.6" style="stop-color:#C21975"/>
                                <stop  offset="1" style="stop-color:#7024C4"/>
                            </linearGradient>
                            <path style="fill:url(#SVGID_2_);" d="M275.517,133C196.933,133,133,196.933,133,275.516s63.933,142.517,142.517,142.517
                                S418.034,354.1,418.034,275.516S354.101,133,275.517,133z M275.517,362.6c-48.095,0-87.083-38.988-87.083-87.083
                                s38.989-87.083,87.083-87.083c48.095,0,87.083,38.988,87.083,87.083C362.6,323.611,323.611,362.6,275.517,362.6z"/>
                            
                                <linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="418.31" y1="4.57" x2="418.31" y2="549.72" gradientTransform="matrix(1 0 0 -1 0 554)">
                                <stop  offset="0" style="stop-color:#E09B3D"/>
                                <stop  offset="0.3" style="stop-color:#C74C4D"/>
                                <stop  offset="0.6" style="stop-color:#C21975"/>
                                <stop  offset="1" style="stop-color:#7024C4"/>
                            </linearGradient>
                            <circle style="fill:url(#SVGID_3_);" cx="418.31" cy="134.07" r="34.15"/>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        </svg>
                    </a>

                </div>
            @endif
            @if ($agency->facebook != null)
                <div class="col-1">
                    <a href="{{$agency->facebook}}">
                        <svg height="50" viewBox="0 0 64 64" width="50" xmlns="http://www.w3.org/2000/svg"><g fill-rule="evenodd"><path d="m32 64h-16a16.0007 16.0007 0 0 1 -16-16v-32a16.0007 16.0007 0 0 1 16-16h32a16 16 0 0 1 16 16v32a16 16 0 0 1 -16 16h-6a5 5 0 0 0 -10 0z" fill="#3764b9"/><path d="m30 18h18a9.0006 9.0006 0 0 0 .92-17.954c-.306-.017-.609-.046-.92-.046h-32a16.0007 16.0007 0 0 0 -16 16v32a30.0007 30.0007 0 0 1 30-30" fill="#507dd2"/><path d="m48 32a16 16 0 1 0 16 16v-32a16 16 0 0 1 -16 16" fill="#1e4ba0"/><path d="m52 18a2 2 0 0 1 -2 2h-6a2 2 0 0 0 -2 2v8h7.56a2 2 0 0 1 1.9612 2.392c-.3713 1.857-.8757 4.379-1.2 6a2 2 0 0 1 -1.9612 1.608h-6.36v24h-10v-24h-6a2 2 0 0 1 -2-2v-6a2 2 0 0 1 2-2h6v-8a12 12 0 0 1 12-12h6a2 2 0 0 1 2 2z" fill="#fff"/></g></svg>
                    </a>
                </div>
            @endif
            @if ($agency->linkedin != null)
                <div class="col-1">
                    <a href="{{$agency->linkedin}}">
                        <svg height="50" viewBox="0 0 176 176" width="50" xmlns="http://www.w3.org/2000/svg"><g id="Layer_2" data-name="Layer 2"><g id="linkedin"><rect id="background" fill="#0077b5" height="176" rx="24" width="176"/><g id="icon" fill="#fff"><path d="m63.4 48a15 15 0 1 1 -15-15 15 15 0 0 1 15 15z"/><path d="m60 73v66.27a3.71 3.71 0 0 1 -3.71 3.73h-15.81a3.71 3.71 0 0 1 -3.72-3.72v-66.28a3.72 3.72 0 0 1 3.72-3.72h15.81a3.72 3.72 0 0 1 3.71 3.72z"/><path d="m142.64 107.5v32.08a3.41 3.41 0 0 1 -3.42 3.42h-17a3.41 3.41 0 0 1 -3.42-3.42v-31.09c0-4.64 1.36-20.32-12.13-20.32-10.45 0-12.58 10.73-13 15.55v35.86a3.42 3.42 0 0 1 -3.37 3.42h-16.42a3.41 3.41 0 0 1 -3.41-3.42v-66.87a3.41 3.41 0 0 1 3.41-3.42h16.42a3.42 3.42 0 0 1 3.42 3.42v5.78c3.88-5.82 9.63-10.31 21.9-10.31 27.18 0 27.02 25.38 27.02 39.32z"/></g></g></g></svg>
                    </a>
                </div>
            @endif
            @if ($agency->tiktok != null)
                <div class="col-1">
                    <a href="{{$agency->tiktok}}">
                        <svg id="Layer_1" height="50" viewBox="0 0 405.82 405.82" width="50" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><g transform="translate(-2.24 -1.18)"><path d="m408.07 204.09c0 112.06-90.85 202.91-202.92 202.91h-.38c-111.89-.21-202.53-91-202.53-202.91s90.64-202.71 202.53-202.91h.38c112.07 0 202.92 90.82 202.92 202.91z"/><path d="m204.77 1.18v405.82c-111.89-.21-202.53-91-202.53-202.91s90.64-202.71 202.53-202.91z" fill="#0c0c0c"/><path d="m315.56 147.92-.25 41.57a100.19 100.19 0 0 1 -24-3.22 101.52 101.52 0 0 1 -33.65-15.83c0 4.25.06 10.59.06 18.3 0 10.26 0 16.09-.06 22.28-.18 38.24.77 45.64-2.59 60.76a78.83 78.83 0 0 1 -2.86 10.75c-6.46 18-20.54 32.42-34.89 40.09a69.47 69.47 0 0 1 -12.55 5.17c-27.12 8.22-59.71 1-76.53-19l-.11-.12-.13-.17c-14.29-17.24-17.41-44.12-17.71-51 0-.88-.06-1.74-.06-1.74a84.38 84.38 0 0 1 4-27.72c2.9-9.26 12.45-28.59 33.9-40.33a74.14 74.14 0 0 1 43.74-8.37l-.49 42.07c-.85-.22-21.4-5.09-34.89 8.91-12.22 12.68-11.43 33.11-2.76 44.68.46.62.95 1.22 1.46 1.78 4.85 5.41 11 7.44 15.15 8.86a50.15 50.15 0 0 0 17.07 2.5 31.3 31.3 0 0 0 17.34-5.57c14.1-9.58 16-26.64 16.07-27.61q-.26-82.38-.49-164.76v-.05l26.43-.47h.43l3.83-.07a80.81 80.81 0 0 0 14.09 28 78.29 78.29 0 0 0 6.6 7.4 84.91 84.91 0 0 0 31.3 19.34h.08a90.74 90.74 0 0 0 12.47 3.57z" fill="#fd2854"/><path d="m303.61 166.73h-.08a91.72 91.72 0 0 1 -42.53-3.23 90.55 90.55 0 0 1 -26.62-13.89 269.58 269.58 0 0 1 0 88c-5.71 34.24-9.29 55.7-28.4 69.43-.4.29-.81.58-1.22.85-26.39 17.87-63.26 9-76.77.59l-.2-.12-.38-.24a88.54 88.54 0 0 1 -12.48-10 72.81 72.81 0 0 1 -22.11-51.47 78 78 0 0 1 4.87-29.21c2.25-6 10.61-27.34 33.9-40.33a75.7 75.7 0 0 1 48.92-8.28q-.1 5-.19 10v.07l-.39 21.1a63.8 63.8 0 0 0 -22.29-1.24c-6 .74-11.88 1.43-18.13 5.36a36.37 36.37 0 0 0 -15.78 22.52 30.31 30.31 0 0 0 -.8 13.86c.24 1.32 2 10.49 9.4 17.07 2.49 2.21 3.55 2.3 7.18 5.69 3.2 3 4 4.44 6.93 6.93 0 0 .72.61 1.9 1.47a2.15 2.15 0 0 0 .24.18 42.89 42.89 0 0 0 5.07 3.19c7.33 3.84 20.45 4.25 30.07-.42 13.31-6.47 20.57-21.35 20.54-30.19q-.24-82.41-.49-164.81h.92l40.82-.24a32.32 32.32 0 0 0 1.31 9.41c.1.33.2.64.31 1s.18.53.27.78a45 45 0 0 0 2.19 4.86l.57 1.15v.09a.12.12 0 0 0 0 .08l.09.19.09.18a3.79 3.79 0 0 0 .18.34c.06.13.13.26.2.39.38.73.9 1.69 1.49 2.77.37.67.76 1.34 1.16 2l.43.71c.21.36.43.72.65 1.07l.8 1.27c3.11 4.91 8.57 13.18 16.31 19.43 10.88 8.78 23.38 11.26 31.22 12 .05 2.46.11 4.92.16 7.38q.44 11.14.67 22.26z" fill="#24f6fa"/><path d="m303.74 178.48a89.19 89.19 0 0 1 -57.25-18.13v88c-.2 3.37-3.15 40.54-36.73 61-1.66 1-3.33 1.93-5 2.79-31.59 16.12-62.46 3.49-65.51 2.18a40.94 40.94 0 0 1 -8.66-4c-.85-.53-1.68-1.08-2.47-1.65l-.71-.53c-20.6-15.64-21.45-47.5-21.58-52.2a84.38 84.38 0 0 1 4-27.72c3.4-10.85 13.55-29.14 33.9-40.33a74.07 74.07 0 0 1 36.63-9v.07q-.25 15.85-.5 31.71c-2.15-.58-15.33-3.9-28.21 4.21a36.37 36.37 0 0 0 -15.78 22.52 32.43 32.43 0 0 0 -.8 13.85 31.66 31.66 0 0 0 7.78 15.26 36.46 36.46 0 0 0 5.53 5.17 2.15 2.15 0 0 0 .24.18 31.4 31.4 0 0 0 5.07 3.19l.06.05a31.38 31.38 0 0 0 33.68 13.14 37.37 37.37 0 0 0 8.47-2.86 33.53 33.53 0 0 0 8.87-6.14c10.12-9.73 11.6-23.19 11.67-24l-.44-164.89 4.4-.09 26.43-.52h.38c.1.26.21.52.32.78.61 1.47 1.34 3.1 2.19 4.86l.57 1.15v.09a.12.12 0 0 0 0 .08l.09.19.09.18a3.79 3.79 0 0 0 .18.34c.06.13.13.26.2.39.46.9 1 1.83 1.49 2.77.37.67.76 1.34 1.16 2l.43.71.65 1.07.8 1.27a98.26 98.26 0 0 0 16.31 19.43 98.5 98.5 0 0 0 31.3 19.34h.08c.13 7.41.26 14.84.38 22.25z" fill="#fff"/><path d="" fill="#24f6fa"/><path d="" fill="#fff"/><path d="" fill="#24f6fa"/><path d="m315.56 147.92-.25 41.57a100.19 100.19 0 0 1 -24-3.22 101.52 101.52 0 0 1 -33.65-15.83c0 4.25.06 10.59.06 18.3 0 10.26 0 16.09-.06 22.28-.18 38.24.77 45.64-2.59 60.76a78.83 78.83 0 0 1 -2.86 10.75c-6.46 18-20.54 32.42-34.89 40.09a69.47 69.47 0 0 1 -12.55 5.17v-248.18l40.82-.24a32.32 32.32 0 0 0 1.31 9.41c.1.33.2.64.31 1l3.83-.07a80.81 80.81 0 0 0 14.09 28 78.29 78.29 0 0 0 6.6 7.4c10.88 8.78 23.38 11.26 31.22 12 .05 2.46.11 4.92.16 7.38a90.74 90.74 0 0 0 12.45 3.43z" opacity=".17"/></g></svg>
                    </a>
                </div>
            @endif
            @if ($agency->whatsapp != null)
                <div class="col-1">
                    <a href="{{$agency->whatsapp}}">
                        <svg height="50" viewBox="0 0 176 176" width="50" xmlns="http://www.w3.org/2000/svg"><g id="Layer_2" data-name="Layer 2"><g id="whatsapp"><rect id="background" fill="#29a71a" height="176" rx="24" width="176"/><g id="icon" fill="#fff"><path d="m126.8 49.2a54.57 54.57 0 0 0 -87.42 63.13l-5.79 28.11a2.08 2.08 0 0 0 .33 1.63 2.11 2.11 0 0 0 2.24.87l27.55-6.53a54.56 54.56 0 0 0 63.09-87.21zm-8.59 68.56a42.74 42.74 0 0 1 -49.22 8l-3.84-1.9-16.89 4 .05-.21 3.5-17-1.88-3.71a42.72 42.72 0 0 1 7.86-49.59 42.73 42.73 0 0 1 60.42 0 2.28 2.28 0 0 0 .22.22 42.72 42.72 0 0 1 -.22 60.19z"/><path d="m116.71 105.29c-2.07 3.26-5.34 7.25-9.45 8.24-7.2 1.74-18.25.06-32-12.76l-.17-.15c-12.09-11.21-15.23-20.54-14.47-27.94.42-4.2 3.92-8 6.87-10.48a3.93 3.93 0 0 1 6.15 1.41l4.45 10a3.91 3.91 0 0 1 -.49 4l-2.25 2.92a3.87 3.87 0 0 0 -.35 4.32c1.26 2.21 4.28 5.46 7.63 8.47 3.76 3.4 7.93 6.51 10.57 7.57a3.82 3.82 0 0 0 4.19-.88l2.61-2.63a4 4 0 0 1 3.9-1l10.57 3a4 4 0 0 1 2.24 5.91z"/></g></g></g></svg>
                    </a>
                </div>
            @endif
            @if ($agency->youtube != null)
                <div class="col-1">
                    <a href="{{$agency->youtube}}">
                        <svg height="50" viewBox="0 -77 512.00213 512" width="50" xmlns="http://www.w3.org/2000/svg"><path d="m501.453125 56.09375c-5.902344-21.933594-23.195313-39.222656-45.125-45.128906-40.066406-10.964844-200.332031-10.964844-200.332031-10.964844s-160.261719 0-200.328125 10.546875c-21.507813 5.902344-39.222657 23.617187-45.125 45.546875-10.542969 40.0625-10.542969 123.148438-10.542969 123.148438s0 83.503906 10.542969 123.148437c5.90625 21.929687 23.195312 39.222656 45.128906 45.128906 40.484375 10.964844 200.328125 10.964844 200.328125 10.964844s160.261719 0 200.328125-10.546875c21.933594-5.902344 39.222656-23.195312 45.128906-45.125 10.542969-40.066406 10.542969-123.148438 10.542969-123.148438s.421875-83.507812-10.546875-123.570312zm0 0" fill="#f00"/><path d="m204.96875 256 133.269531-76.757812-133.269531-76.757813zm0 0" fill="#fff"/></svg>
                    </a>
                </div>
            @endif
        </div>
    </div>
{{-- </div>
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
</div> --}}
@endsection