@extends('layouts.admin')
@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        @if (session('message'))
            <div class="row">
                <div class="alert alert-success d-flex justify-content-between" role="alert">
                    <strong>{{session('message')}} {{Auth::user()->nome}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-flex justify-content-between">
                        Datore di Lavoro 
                        <span>
                            {{Auth::user()->nome . ' ' . Auth::user()->cognome}}
                        </span>
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.register') }}">
                        @csrf

                            <div style="display: none" class="col-md-6">
                                <input id="id_admin" class="form-control" name="id_admin" value="{{Auth::user()->id}}">
                            </div>

                        <div class="mb-4 row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" autocomplete="nome" autofocus>

                                @error('nome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="cognome" class="col-md-4 col-form-label text-md-right">Cognome</label>

                            <div class="col-md-6">
                                <input id="cognome" type="text" class="form-control @error('cognome') is-invalid @enderror" name="cognome" value="{{ old('cognome') }}" autocomplete="cognome" autofocus>

                                @error('cognome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Salva Gestore
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
        <div class="col-6">
            @php
                // Esegui la query utilizzando Eloquent
                $segretari = \App\Models\User::where('id_admin', Auth::user()->id)->get();
            @endphp
            @foreach ($segretari as $segretario)
            <section class="d-flex justify-content-between">
                <div>
                    <div>
                        <span class="fw-bold">Nome: </span><span class="m-0 ms-2">{{$segretario->nome}}</span>
                    </div>
                    <div>
                        <span class="fw-bold">Cognome: </span><span class="m-0 ms-2">{{$segretario->cognome}}</span>
                    </div>
                    <div>
                        <span class="fw-bold">Email: </span><span class="m-0 ms-2">{{$segretario->email}}</span>
                    </div>
                </div>
                <div>
                    <form class="popup_delete_segretaria" action="{{ route('admin.elimina.utente') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $segretario->id }}">
                        <button type="submit" class="btn btn-danger me-4">Elimina</button>
                    </form>
                </div>
            </section>
            <div class="mt-3">
                @include('admin.partials.assegnazione', ['segretario' => $segretario])
            </div>
            @endforeach
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var popupDeleteSegretariaList = document.querySelectorAll('form.popup_delete_segretaria');
                    popupDeleteSegretariaList.forEach(function(popupDeleteSegretaria) {
                        popupDeleteSegretaria.addEventListener('submit', function(event){
                            event.preventDefault();
                            Swal.fire({
                                title: "Sei sicuro?",
                                text: "Sei sicuro di voler eliminare questo/a segretario/a?",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#3085d6",
                                cancelButtonColor: "#d33",
                                confirmButtonText: "Si, Elimina!"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    this.submit()
                                }
                            });
                        })
                    });
                });
            </script>
        </div>
    </div>
</div>
@endsection