@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @include('admin.agency.partials.editCreate', ['method' => 'PUT', 'routeName' => 'admin.le-mie-aziende.update'])
        </div>
    </div>
</div>
@endsection