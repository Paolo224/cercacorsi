@extends('layouts.admin')

@section('content')
<div class="container-fluid container-xxl">
    <div class="row mt-3">
            @if(!$courses->isNotEmpty())
            <div class="col-12 text-end">
                <a href="{{route('admin.course.create')}}" class="btn btn-sm btn-success" style="width: 80px;">
                    + Nuovo
                </a>
            </div>
                <h3 class="text-center mt-5 mb-2">Non hai inserito nessuna Corso di Formazione...</h3>
                <h4 class="text-center mb-2">Inserisci un corso cliccando il tasto "Nuovo"</h4>
            @else
            <table class="table table-striped table-hover mt-3 table-bordered">
                <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-center"></th>
                    <th scope="col" class="text-center">Immagine</th>
                    <th scope="col" class="text-center">Titolo</th>
                    <th scope="col" class="text-center">Durata</th>
                    <th scope="col" class="text-center">
                        <a href="{{route('admin.course.create')}}" class="btn btn-sm btn-success">
                            + Aggiungi un Azienda
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td class="text-center align-middle">
                                <img src="{{asset('storage/' . $course->agency->logo)}}" class="card-img-top me-2" alt="{{$course->titolo}}" style="width: 50px;">
                            </td>
                            <td class="text-center align-middle">
                                <img src="{{asset('storage/' . $course->immagine)}}" class="card-img-top" alt="{{$course->titolo}}" style="width: 50px;">
                            </td>
                            <td class="text-center align-middle">{{$course->titolo}}</td>
                            <td class="text-center align-middle">{{$course->durata}} ore</td>
                            <td class="text-center align-middle">
                                <a href="{{route('admin.course.show', $course->id)}}" class="btn btn-sm btn-primary">
                                    Mostra
                                </a>
                                <a href="{{route('admin.course.edit', $course->id)}}" class="btn btn-sm btn-warning">
                                    Modifica
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