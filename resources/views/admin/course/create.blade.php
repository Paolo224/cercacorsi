@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            @include('admin.course.partials.editCreate', ['method' => 'POST', 'routeName' => 'admin.course.store'])
        </div>
    </div>
</div>
@endsection