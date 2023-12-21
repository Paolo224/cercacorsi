@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            @include('admin.agency.partials.editCreate', ['method' => 'POST', 'routeName' => 'admin.le-mie-aziende.store'])
        </div>
    </div>
</div>
@endsection