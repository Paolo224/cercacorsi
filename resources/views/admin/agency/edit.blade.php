@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{route('admin.agency.index')}}" class="btn btn-primary">Torna alla Lista</a>
        </div>
        <div class="col-12">
            @include('admin.agency.partials.editCreate', ['method' => 'PUT', 'routeName' => 'admin.agency.update'])
        </div>
    </div>
</div>
@endsection