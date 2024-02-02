@extends('layouts.admin')
 
@section('content')
@if (session('ticket-inviato'))
    <script>
        Swal.fire({
            position: "bottom-end",
            icon: "success",
            title: "La tua richiesta è stata inviata correttamente!",
            showConfirmButton: false,
            timer: 2500
        });
    </script>
@endif
<form action="{{route('admin.ticket.store')}}" method="post" class="mt-3" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 w-100">
        <input type="text" name="titolo" id="titolo_ticket" class="w-50" placeholder="Titolo" @error('titolo') style="border: 1px solid red" @enderror>
        @error('titolo')    
            <div class="text-danger">
                <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3 w-100">
        <textarea name="descrizione" id="descrizione_ticket" cols="30" rows="10" class="w-50" placeholder="Descrivi la tua richiesta..." @error('descrizione') style="border: 1px solid red" @enderror></textarea>
        @error('descrizione')    
        <div class="text-danger">
            <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
        </div>
    @enderror
    </div>
    <div class="mb-3 w-100">
        <input type="file" name="allegato" id="allegato_ticket" class="w-50">
    </div>
    <div class="mb-3 w-50 text-center">
        <button type="submit" class="btn btn-outline-dark">Invia ticket</button>
    </div>
</form>
@endsection