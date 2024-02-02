@extends('layouts.admin')

@section('content')

    @forelse ($tickets as $ticket)
    <div style="border: 1px solid black" class="mb-2 mt-3 p-3 position-relative">
        <p class="position-absolute" style="top: 10px; right: 10px; padding: 3px; border-radius: 5px; @if($ticket->status === 'aperto') color: white; background-color: green; @elseif($ticket->status === 'chiuso') background-color: yellow; @elseif($ticket->status === 'respinto') color: white; background-color: red; @endif ">{{$ticket->status}}</p>
        <p class="position-absolute mb-0 p-1" style="border: 1px solid black; top: 10px; border-radius: 5px; right: 6%;">{{$ticket->created_at->diffForHumans()}}</p>
        <p class="mx-2"><span class="fw-bold">Titolo: </span> {{$ticket->titolo}}</p>
        <div class="mx-2">
            <p class="mb-0 fw-bold">
                Descrizione: 
            </p>
            <p>
                {{$ticket->descrizione}}
            </p>
        </div>
        @if ($ticket->allegato)    
        <a class="mx-2" target="_blank" href="{{asset('storage/' . $ticket->allegato)}}">
            <i class="fa-solid fa-paperclip"></i> Allegato
        </a>
        @endif
        @if (Auth::user()->super_admin_role != null)
        <form class="d-inline-block" action="{{ route('admin.chiuso', $ticket->id) }}" method="POST">
            @method('PATCH')
            @csrf
            <button class="btn btn-sm btn-outline-dark me-3" type="submit">
                Chiudi
            </button>
        </form>
        <form class="d-inline-block" action="{{ route('admin.respinto', $ticket->id) }}" method="POST">
            @method('PATCH')
            @csrf
            <button class="btn btn-sm btn-outline-dark me-3" type="submit">
                Rifiuta
            </button>
        </form>
        @endif
    </div>
        @empty
        <p>Non ci sono ticket</p>
    @endforelse
@endsection