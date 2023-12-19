@extends('layouts.admin')

@section('content')
<h1>
    {{$course->titolo}}
</h1>
<p>{{$course->durata}} ore</p>
@if ($course->on_site == 1)
    <p>Presso Terzi</p>
@endif
@if ($course->in_aula == 1)
    <p>In Aula</p>
@endif
@if ($course->fad == 1)
    <p>Formazione a distanza</p>
@endif
@endsection