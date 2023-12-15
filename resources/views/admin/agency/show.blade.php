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
                <div class="row contenitore_informazioni_aziendali">
                    <!-- MAIL -->
                    <div class="col-6 d-flex align-items-center mb-3">
                        <?xml class="d-inline" version="1.0" encoding="iso-8859-1"?>
                        <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                            style="enable-background:new 0 0 512 512;" xml:space="preserve" width="30" height="30">
                            <g>
                                <g>
                                    <path d="M507.49,101.721L352.211,256L507.49,410.279c2.807-5.867,4.51-12.353,4.51-19.279V121
                    C512,114.073,510.297,107.588,507.49,101.721z" />
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M467,76H45c-6.927,0-13.412,1.703-19.279,4.51l198.463,197.463c17.548,17.548,46.084,17.548,63.632,0L486.279,80.51
                    C480.412,77.703,473.927,76,467,76z" />
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path
                                        d="M4.51,101.721C1.703,107.588,0,114.073,0,121v270c0,6.927,1.703,13.413,4.51,19.279L159.789,256L4.51,101.721z" />
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M331,277.211l-21.973,21.973c-29.239,29.239-76.816,29.239-106.055,0L181,277.211L25.721,431.49
                    C31.588,434.297,38.073,436,45,436h422c6.927,0,13.412-1.703,19.279-4.51L331,277.211z" />
                                </g>
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
                        <span class="ms-2">{{$agency->email}}</span>
                    </div>
                    <!-- PAESE -->
                    <div class="col-6 d-flex align-items-center mb-3">
                        <svg height="30" viewBox="0 0 58 58" width="30" xmlns="http://www.w3.org/2000/svg">
                            <g id="Page-1" fill="none" fill-rule="evenodd">
                                <g id="037---Waypoint-Flag" fill="rgb(0,0,0)" fill-rule="nonzero"
                                    transform="translate(0 -1)">
                                    <path id="Shape"
                                        d="m14.678 58.9507 1.0678-.2984c1.0270794-.287091 1.6269982-1.3523947 1.34-2.3795l-12.2083-43.6888c-.17227193-.6165569-.58242107-1.139423-1.14021438-1.4535673-.5577933-.3141444-1.21753647-.3938324-1.83408562-.2215327l-.1379.0385c-1.28397381.3587434-2.0340279 1.6904218-1.6753 2.9744l12.2086 43.6888c.2870014 1.0271063 1.3522895 1.6270863 2.3794 1.3401z" />
                                    <path id="Shape"
                                        d="m57.67 28.42c-3.8715209-1.930437-7.4530885-4.3944478-10.64-7.32-.2678864-.245221-.3726619-.6216366-.27-.97 1.579074-5.9738125 2.7517572-12.04771023 3.51-18.18.12-1.02-.43-1.32-1.01-.62-11.38 13.61-31.07-2.49-42.79 9.88.14070884.2634479.25140182.5418575.33.83l7.92 28.36c11.74-12.22 31.36 3.78 42.72-9.8.58-.7.69-1.98.23-2.18z" />
                                </g>
                            </g>
                        </svg>
                        <span class="ms-2">{{$agency->paese}}</span>
                    </div>
                    <!-- TELEFONO 1 -->
                    <div class="col-6 d-flex align-items-center mb-3">
                        <?xml version="1.0" encoding="iso-8859-1"?>
                        <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 513.64 513.64"
                            style="enable-background:new 0 0 513.64 513.64;" xml:space="preserve" width="30"
                            height="30">
                            <g>
                                <g>
                                    <path d="M499.66,376.96l-71.68-71.68c-25.6-25.6-69.12-15.359-79.36,17.92c-7.68,23.041-33.28,35.841-56.32,30.72
                    c-51.2-12.8-120.32-79.36-133.12-133.12c-7.68-23.041,7.68-48.641,30.72-56.32c33.28-10.24,43.52-53.76,17.92-79.36l-71.68-71.68
                    c-20.48-17.92-51.2-17.92-69.12,0l-48.64,48.64c-48.64,51.2,5.12,186.88,125.44,307.2c120.32,120.32,256,176.641,307.2,125.44
                    l48.64-48.64C517.581,425.6,517.581,394.88,499.66,376.96z" />
                                </g>
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

                        <span class="ms-2">{{$agency->telefono1}}</span>
                    </div>
                    <!-- CAP -->
                    <div class="col-6 d-flex align-items-center mb-3">
                        <?xml version="1.0" encoding="iso-8859-1"?>
                        <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                            style="enable-background:new 0 0 512 512;" xml:space="preserve" width="30" height="30">
                            <g>
                                <g>
                                    <path d="M437,166h-90c-8.284,0-15,6.716-15,15v90c0,8.284,6.716,15,15,15h90c8.284,0,15-6.716,15-15v-90
            C452,172.716,445.284,166,437,166z M422,256h-60v-60h60V256z" />
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path
                                        d="M225,316H75c-8.284,0-15,6.716-15,15s6.716,15,15,15h150c8.284,0,15-6.716,15-15S233.284,316,225,316z" />
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path
                                        d="M165,256H75c-8.284,0-15,6.716-15,15s6.716,15,15,15h90c8.284,0,15-6.716,15-15S173.284,256,165,256z" />
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M467.005,46c-0.003,0-0.005,0-0.008,0C448.759,46,63.747,46,45,46C20.187,46,0,66.187,0,91c0,9.81,0,306.673,0,330
            c0,24.813,20.187,45,45,45h422c24.813,0,45-20.187,45-45c0-10.909,0-319.723,0-330C512,66.189,491.816,46.003,467.005,46z
             M383.213,76h47.574l-30,30h-47.574L383.213,76z M291.213,76h49.574l-30,30h-49.574L291.213,76z M201.213,76h47.574l-30,30
            h-47.574L201.213,76z M111.213,76h47.574l-30,30H81.213L111.213,76z M30,91c0-8.271,6.729-15,15-15h23.787l-30,30H30V91z
             M39.753,435.034C34.066,432.9,30,427.423,30,421v-15h38.787L39.753,435.034z M128.787,436H81.213l30-30h47.574L128.787,436z
             M218.787,436h-47.574l30-30h47.574L218.787,436z M310.787,436h-49.574l30-30h49.574L310.787,436z M400.787,436h-47.574l30-30
            h47.574L400.787,436z M482,421c0,8.271-6.729,15-15,15h-23.787l30-30H482V421z M482,376c-25.319,0-426.651,0-452,0
            c0-8.28,0-229.301,0-240h452C482,153.86,482,366.069,482,376z M482,106h-38.787l29.034-29.034C477.934,79.1,482,84.577,482,91V106
            z" />
                                </g>
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

                        <span class="ms-2">{{$agency->cap}}</span>
                    </div>
                    <!-- TELEFONO 2 -->
                    <div class="col-6 d-flex align-items-center mb-3">
                        <?xml version="1.0" encoding="iso-8859-1"?>
                        <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 513.64 513.64"
                            style="enable-background:new 0 0 513.64 513.64;" xml:space="preserve" width="30"
                            height="30">
                            <g>
                                <g>
                                    <path d="M499.66,376.96l-71.68-71.68c-25.6-25.6-69.12-15.359-79.36,17.92c-7.68,23.041-33.28,35.841-56.32,30.72
                    c-51.2-12.8-120.32-79.36-133.12-133.12c-7.68-23.041,7.68-48.641,30.72-56.32c33.28-10.24,43.52-53.76,17.92-79.36l-71.68-71.68
                    c-20.48-17.92-51.2-17.92-69.12,0l-48.64,48.64c-48.64,51.2,5.12,186.88,125.44,307.2c120.32,120.32,256,176.641,307.2,125.44
                    l48.64-48.64C517.581,425.6,517.581,394.88,499.66,376.96z" />
                                </g>
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

                        <span class="ms-2">{{$agency->telefono2}}</span>
                    </div>
                    <!-- CITTA E PROVINCIA -->
                    <div class="col-6 d-flex align-items-center mb-3">
                        <?xml version="1.0" encoding="iso-8859-1"?>
                        <!-- Generator: Adobe Illustrator 16.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <!DOCTYPE svg
                            PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30" height="30"
                            viewBox="0 0 495.398 495.398" style="enable-background:new 0 0 495.398 495.398;"
                            xml:space="preserve">
                            <g>
                                <g>
                                    <g>
                                        <path
                                            d="M487.083,225.514l-75.08-75.08V63.704c0-15.682-12.708-28.391-28.413-28.391c-15.669,0-28.377,12.709-28.377,28.391
                v29.941L299.31,37.74c-27.639-27.624-75.694-27.575-103.27,0.05L8.312,225.514c-11.082,11.104-11.082,29.071,0,40.158
                c11.087,11.101,29.089,11.101,40.172,0l187.71-187.729c6.115-6.083,16.893-6.083,22.976-0.018l187.742,187.747
                c5.567,5.551,12.825,8.312,20.081,8.312c7.271,0,14.541-2.764,20.091-8.312C498.17,254.586,498.17,236.619,487.083,225.514z" />
                                        <path d="M257.561,131.836c-5.454-5.451-14.285-5.451-19.723,0L72.712,296.913c-2.607,2.606-4.085,6.164-4.085,9.877v120.401
                c0,28.253,22.908,51.16,51.16,51.16h81.754v-126.61h92.299v126.61h81.755c28.251,0,51.159-22.907,51.159-51.159V306.79
                c0-3.713-1.465-7.271-4.085-9.877L257.561,131.836z" />
                                    </g>
                                </g>
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