@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{route('admin.tutti-i-corsi.index')}}" class="btn btn-primary">Torna alla Lista</a>
        </div>
        <div class="col-12">
            @include('admin.course.partials.editCreate', ['method' => 'PUT', 'routeName' => 'admin.tutti-i-corsi.update'])
        </div>
    </div>
</div>
@endsection