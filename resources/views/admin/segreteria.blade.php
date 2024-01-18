@extends('layouts.admin')
@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        @if (session('message'))
        <div class="col-12">
            <p id="messageBox" style="
            background-color: #003087;
            color: white;
            font-weight: 500;
            padding: 20px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 15px;
            font-size: 1.5rem;
            transition: all 1s ease;
            margin: 0;
            z-index: 999;
            position: relative;
            ">
                {{session('message')}} {{Auth::user()->nome}} {{Auth::user()->cognome}}
                <span id="closeButton" style="
                    position: absolute;
                    right: 5px;
                    cursor: pointer;
                    font-weight: bold;
                    font-size: 1.2rem;
                "><i class="fa-regular fa-circle-xmark"></i></span>
            </p>

            <script>
                document.getElementById('closeButton').addEventListener('click', function() {
                    document.getElementById('messageBox').style.display = 'none'; // Nascondi il messaggio
                });
            </script>
        </div>
        @endif
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.register') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="id_admin" class="col-md-4 col-form-label text-md-right">Datore di Lavoro: {{Auth::user()->nome . ' ' . Auth::user()->cognome}}</label>

                            <div style="display: none" class="col-md-6">
                                <input id="id_admin" class="form-control" name="id_admin" value="{{Auth::user()->id}}">
                                    {{-- <option value="{{Auth::user()->id}}" selected>{{Auth::user()->nome}} {{Auth::user()->cognome}}</option> --}}
                            </div>
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
                                    Salva Segretario/a
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
            <table class="table table-striped table-hover mt-3">
                <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-center">Nome</th>
                    <th scope="col" class="text-center">Cognome</th>
                    <th scope="col" class="text-center" style="width: 120px">Email</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($segretari as $segretario)
                        <tr>
                            <td class="text-center align-middle">
                                <p class="m-0 fw-bold">{{$segretario->nome}}</p>
                            </td>
                            <td class="text-center align-middle">
                                <p class="m-0 fw-bold">{{$segretario->cognome}}</p>
                            </td>
                            <td class="text-center align-middle">
                                <p class="m-0 fw-bold">{{$segretario->email}}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection