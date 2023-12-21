@extends('layouts.admin')

@section('content')
<div class="container-fluid container-xxl">
    <div class="row mt-3 justify-content-center">
            @if(!$courses->isNotEmpty())
            <div class="col-12 text-end">
                <a href="{{route('admin.tutti-i-corsi.create')}}" class="btn btn-sm btn-success" style="width: 80px;">
                    + Nuovo
                </a>
            </div>
                <h3 class="text-center mt-5 mb-2"><i class="fa-regular fa-face-sad-tear"></i> Nessun Corso di Formazione trovato...</h3>
                <h4 class="text-center mb-2">Inserisci un corso cliccando il tasto "Nuovo"</h4>
            @else
            <div class="row p-0">
                <div class="col-12 d-flex align-items-center mb-2">
                    @if (Route::currentRouteName() != 'admin.tutti-i-corsi.index')
                    <a href="{{route('admin.tutti-i-corsi.index')}}" class="btn btn-sm btn-danger me-2" style="width: 30px; height: 30px;">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                    @endif
                    <p class="fs-4 fw-bold m-0">
                        Filtra per:
                    </p>
                </div>
                <div class="col-2 d-flex justify-content-center">
                    <form action="{{ route('admin.tutti-i-corsi.Visibili') }}" method="GET" class="me-2">
                        <button type="submit" class="btn btn-outline-dark">Visibili</button>
                    </form>
    
                    <form action="{{ route('admin.tutti-i-corsi.NonVisibili') }}" method="GET">
                        <button type="submit" class="btn btn-outline-dark">Non visibili</button>
                    </form>
                </div>
                <div class="col-2 d-flex justify-content-center">
                    <form action="{{ route('admin.tutti-i-corsi.Categoria') }}" method="GET" style="height: 100%">
                        <select id="SearchCategoria" name="categoriaFilter" onchange="this.form.submit()" style="height: 100%; border: 1px solid #212529; border-radius: 0.375rem;">
                            <option value="" selected disabled></option>
                            @foreach ($categoriaCorso as $categoria)    
                                <option type="submit" value="{{$categoria}}">{{$categoria}}</option>
                            @endforeach
                        </select>
                    </form>
                    <p class="ms-2 m-0 d-flex align-items-center">Categoria</p>
                </div>
                <div class="col-3 d-flex justify-content-center">
                    <form action="{{ route('admin.tutti-i-corsi.Agency') }}" method="GET" style="height: 100%">
                        <select id="SearchAzienda" name="AgencyFilter" onchange="this.form.submit()" style="height: 100%; width: 250px; border: 1px solid #212529; border-radius: 0.375rem;">
                            <option value="" selected disabled></option>
                            @foreach ($AllAgencies as $agency)    
                                <option type="submit" value="{{$agency->id}}">{{$agency->nome}}</option>
                            @endforeach
                        </select>
                    </form>
                    <p class="ms-2 m-0 d-flex align-items-center">Azienda</p>
                </div>
                <div class="col-5 d-flex justify-content-center">
                    <form action="" method="GET" style="width: 100%; height: 100%">
                        <input type="text" id="SearchNomeCorso" name="SearchNomeCorso" placeholder="Cerca per Nome del Corso">
                    </form>
                </div>
            </div>
            <table class="table table-striped table-hover mt-3 table-bordered" id="coursesTable">
                <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-center">Azienda</th>
                    <th scope="col" class="text-center">Corso</th>
                    <th scope="col" class="text-center" style="width: 120px">Categoria</th>
                    <th scope="col" class="text-center">Durata</th>
                    <th scope="col" class="text-center" style="width: 120px">Prezzo</th>
                    <th scope="col" class="text-center" style="width: 100px">Lingua</th>
                    <th scope="col" class="text-center" style="width: 80px">On Site</th>
                    <th scope="col" class="text-center" style="width: 80px">In Aula</th>
                    <th scope="col" class="text-center" style="width: 80px">FAD</th>
                    <th scope="col" class="text-center" style="width: 80px">Visibilità</th>
                    <th scope="col" class="text-center" style="width: 150px">
                        <a href="{{route('admin.tutti-i-corsi.create')}}" class="btn btn-sm btn-success bottone_aggiungi_index_corsi">
                            <i class="fa-regular fa-square-plus"></i>
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td class="text-center align-middle">
                                <img src="{{asset('storage/' . $course->agency->logo)}}" class="card-img-top mb-1" alt="{{$course->titolo}}" style="width: 50px;">
                                <p class="m-0 fw-bold">{{$course->agency->nome}}</p>
                            </td>
                            <td class="text-center align-middle fw-bold text-uppercase">
                                {{$course->titolo}}
                            </td>
                            <td class="text-center align-middle fw-bold text-uppercase">
                                {{$course->categoria}}
                            </td>
                            <td class="text-center align-middle fw-bold text-uppercase">
                                {{$course->durata}} ore
                            </td>
                            <td class="text-center align-middle fw-bold text-uppercase">
                                @if ($course->prezzo != null || $course->prezzo != 0)
                                    {{$course->prezzo}}&euro;
                                @else
                                -
                                @endif
                            </td>
                            <td class="text-center align-middle fw-bold text-uppercase">
                                @if ($course->lingua === 'Italiano')
                                <svg height="32" viewBox="0 0 480 480" width="32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><radialGradient id="radial-gradient" cx="240" cy="240" gradientUnits="userSpaceOnUse" r="240"><stop offset=".88" stop-opacity="0"/><stop offset="1" stop-opacity=".3"/></radialGradient><g id="Layer_2" data-name="Layer 2"><g id="Mali"><circle cx="240" cy="240" fill="#ffffff" r="240"/><path d="m480 236.9a.21.21 0 0 1 0 .11.61.61 0 0 1 0 .19v5.6a.61.61 0 0 1 0 .19.21.21 0 0 1 0 .11c-1.27 98.64-62 182.9-148 218.64v-443.48c86 35.74 146.73 120 148 218.64z" fill="#ed1d2a"/><path d="m148 18.27v443.46c-86-35.73-146.73-120-148-218.63a.21.21 0 0 1 0-.1c0-2 0-4 0-6a.21.21 0 0 1 0-.11c1.27-98.62 62-182.89 148-218.62z" fill="#009d00"/><path d="m240 0c-132.55 0-240 107.45-240 240s107.45 240 240 240 240-107.45 240-240-107.45-240-240-240zm0 452c-116.9 0-212-95.1-212-212s95.1-212 212-212 212 95.1 212 212-95.1 212-212 212z" fill="url(#radial-gradient)"/></g></g></svg>
                                @elseif($course->lingua === 'Francese')
                                <svg height="32" viewBox="0 0 480 480" width="32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><radialGradient id="radial-gradient" cx="240" cy="240" gradientUnits="userSpaceOnUse" r="240"><stop offset=".88" stop-opacity="0"/><stop offset="1" stop-opacity=".3"/></radialGradient><g id="Layer_2" data-name="Layer 2"><g id="Romania"><circle cx="240" cy="240" fill="#ffffff" r="240"/><path d="m480 236.9a.21.21 0 0 1 0 .11v6a.21.21 0 0 1 0 .11c-1.27 98.62-62 182.88-148 218.62v-443.48c86 35.74 146.73 120 148 218.64z" fill="#ed1d2a"/><path d="m148 18.27v443.46c-86-35.73-146.73-120-148-218.63a.21.21 0 0 1 0-.1c0-2 0-4 0-6a.21.21 0 0 1 0-.11c1.27-98.62 62-182.89 148-218.62z" fill="#0a389e"/><path d="m240 0c-132.55 0-240 107.45-240 240s107.45 240 240 240 240-107.45 240-240-107.45-240-240-240zm0 452c-116.9 0-212-95.1-212-212s95.1-212 212-212 212 95.1 212 212-95.1 212-212 212z" fill="url(#radial-gradient)"/></g></g></svg>
                                @elseif($course->lingua === 'Tedesco')
                                <svg height="32" viewBox="0 0 480 480" width="32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><radialGradient id="radial-gradient" cx="240" cy="240" gradientUnits="userSpaceOnUse" r="240"><stop offset=".88" stop-opacity="0"/><stop offset="1" stop-opacity=".3"/></radialGradient><g id="Layer_2" data-name="Layer 2"><g id="Belgium"><circle cx="240" cy="240" fill="#ffe12a" r="240"/><path d="m160.5 13.48v453c-88.81-31.12-153.74-113.04-160-210.92v-31.12c6.26-97.88 71.19-179.8 160-210.96z"/><path d="m480 240c0 104.31-66.55 193.08-159.5 226.16v-452.32c92.95 33.08 159.5 121.85 159.5 226.16z" fill="#ff2437"/><path d="m240 0c-132.55 0-240 107.45-240 240s107.45 240 240 240 240-107.45 240-240-107.45-240-240-240zm0 452c-116.9 0-212-95.1-212-212s95.1-212 212-212 212 95.1 212 212-95.1 212-212 212z" fill="url(#radial-gradient)"/></g></g></svg>
                                @elseif($course->lingua === 'Inglese')
                                <svg height="32" viewBox="0 0 480 480" width="32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><radialGradient id="radial-gradient" cx="240" cy="240" gradientUnits="userSpaceOnUse" r="240"><stop offset=".88" stop-opacity="0"/><stop offset="1" stop-opacity=".3"/></radialGradient><g id="Layer_2" data-name="Layer 2"><g id="United_Kingdom" data-name="United Kingdom"><path d="m480 240c0 132.51-107.39 239.94-239.89 240h-2.59a242.26 242.26 0 0 1 -34.74-2.87 236 236 0 0 1 -27.9-6.06 240.08 240.08 0 0 1 -174.88-231.07c0-132.53 107.42-240 240-240h.11a239.26 239.26 0 0 1 174.34 75.17 239.79 239.79 0 0 1 65.55 164.83z" fill="#fff"/><path d="m179.43 168.62v10.8h-34.89l-98-81.49a239 239 0 0 1 19.7-23.48z" fill="#c8102e"/><path d="m433.77 98.37-97.43 81h-35.77v-10.02l113.58-94.49.3.31a236.65 236.65 0 0 1 18.34 21.83z" fill="#c8102e"/><path d="m179.43 300.56v10.8l-113.19 94.19c-1-1-2-2.08-2.94-3.13a238.48 238.48 0 0 1 -16.75-20.35l98-81.51z" fill="#c8102e"/><path d="m433.78 381.62a240 240 0 0 1 -19.62 23.51l-113.59-94.5v-10.07h35.77z" fill="#c8102e"/><g fill="#012169"><path d="m95.85 179.42h-88.14a237.85 237.85 0 0 1 22-55.07z"/><path d="m93.86 300.56-64.86 53.94a238 238 0 0 1 -21.29-53.94z"/><path d="m179.43 351.28v121c-1.52-.39-3-.8-4.55-1.23a239.12 239.12 0 0 1 -86.09-44.68z"/><path d="m179.43 7.71v119.1l-89.29-74.28a239.16 239.16 0 0 1 89.29-44.82z"/><path d="m391.23 53.65-90.66 75.15v-121.08l1.37.35a239 239 0 0 1 89.29 45.58z"/><path d="m472.29 179.42h-86l64.71-53.84a238.17 238.17 0 0 1 21.29 53.84z"/><path d="m392 425.78a239.25 239.25 0 0 1 -91.38 46.51v-122.53z"/><path d="m472.29 300.56a238.61 238.61 0 0 1 -20.65 52.71l-63.35-52.71z"/></g><path d="m480 237.49v4.79a242.25 242.25 0 0 1 -2.63 33.43h-201.66v201.65a242.45 242.45 0 0 1 -33.22 2.64h-5a240.78 240.78 0 0 1 -33.23-2.65v-201.64h-201.62a243 243 0 0 1 -2.64-33.26c0-1.57 0-3.15 0-4.73a242.4 242.4 0 0 1 2.63-33.44h201.66v-201.64a243.84 243.84 0 0 1 31.62-2.64h7.74a240.26 240.26 0 0 1 30.19 2.34l1.87.28v201.66h201.65a242.31 242.31 0 0 1 2.64 33.21z" fill="#c8102e"/><path d="m240 0c-132.55 0-240 107.45-240 240s107.45 240 240 240 240-107.45 240-240-107.45-240-240-240zm0 452c-116.9 0-212-95.1-212-212s95.1-212 212-212 212 95.1 212 212-95.1 212-212 212z" fill="url(#radial-gradient)"/></g></g></svg>
                                @elseif($course->lingua === 'Spagnolo')
                                <svg height="32" viewBox="0 0 480 480" width="32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><radialGradient id="radial-gradient" cx="240" cy="240" gradientUnits="userSpaceOnUse" r="240"><stop offset=".88" stop-opacity="0"/><stop offset="1" stop-opacity=".3"/></radialGradient><g id="Layer_2" data-name="Layer 2"><g id="Spain"><circle cx="240" cy="240" fill="#ed1d2a" r="240"/><path d="m480 240a239 239 0 0 1 -31.71 119.32h-416.58a240.37 240.37 0 0 1 0-238.65h416.58a239 239 0 0 1 31.71 119.33z" fill="#fecb00"/><path d="m240 0c-132.55 0-240 107.45-240 240s107.45 240 240 240 240-107.45 240-240-107.45-240-240-240zm0 452c-116.9 0-212-95.1-212-212s95.1-212 212-212 212 95.1 212 212-95.1 212-212 212z" fill="url(#radial-gradient)"/></g></g></svg>
                                @endif
                            </td>
                            <td class="text-center align-middle">
                                @if ($course->on_site != 1)
                                    <i class="fa-solid fa-circle-xmark fa-2x" style="color: #cc2424;"></i>
                                @else
                                    <i class="fa-solid fa-circle-check fa-2x" style="color: #40a23f;"></i>
                                @endif
                            </td>
                            <td class="text-center align-middle">
                                @if ($course->in_aula != 1)
                                    <i class="fa-solid fa-circle-xmark fa-2x" style="color: #cc2424;"></i>
                                @else
                                    <i class="fa-solid fa-circle-check fa-2x" style="color: #40a23f;"></i>
                                @endif
                            </td>
                            <td class="text-center align-middle">
                                @if ($course->fad != 1)
                                    <i class="fa-solid fa-circle-xmark fa-2x" style="color: #cc2424;"></i>
                                @else
                                    <i class="fa-solid fa-circle-check fa-2x" style="color: #40a23f;"></i>
                                @endif
                            </td>
                            <td class="text-center align-middle">
                                @if ($course->visibile != 1)
                                <i class="fa-solid fa-eye-slash fa-2x"></i>
                                @else
                                <i class="fa-solid fa-eye fa-2x"></i>
                                @endif
                            </td>
                            <td class="text-center align-middle">
                                <a href="{{route('admin.tutti-i-corsi.show', $course->id)}}" class="btn btn-sm p-2 bottone_mostra_index_corsi">
                                    <i class="fa-solid fa-circle-info fa-2x" style="color: black"></i>
                                </a>
                                <a href="{{route('admin.tutti-i-corsi.edit', $course->id)}}" class="btn btn-sm p-2 bottone_modifica_index_corsi">
                                    <i class="fa-solid fa-pen-to-square fa-2x"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
@endsection