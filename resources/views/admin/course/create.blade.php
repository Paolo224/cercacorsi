@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @include('admin.course.partials.editCreate', ['method' => 'POST', 'routeName' => 'admin.tutti-i-corsi.store'])
        </div>
    </div>
</div>
@endsection