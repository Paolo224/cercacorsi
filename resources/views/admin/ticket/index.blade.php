@extends('layouts.admin')

@section('content')

    @forelse ($tickets as $ticket)
    <div style="border: 1px solid black" class="mb-2 mt-3 p-3 position-relative">
        <style>
            @keyframes ruotaInfinito {
                from {
                    transform: rotate(0deg);
                }
                to {
                    transform: rotate(360deg);
                }
            }
            .rotazione-infinita {
            animation: ruotaInfinito 2s linear infinite; 
            }
        </style>
        @if($ticket->status === 'respinto') 
            <p class="position-absolute" style="top: 10px; right: 10px; padding: 3px;">
                <i style="color: red;" class="fa-solid fa-ban"></i>
                {{$ticket->status}}
            </p>
        @else
            <p class="position-absolute" style="top: 10px; right: 10px; padding: 3px; border-radius: 5px; @if($ticket->status === 'aperto') color: white; background-color: green; @elseif($ticket->status === 'chiuso') color: white; background-color: red; @elseif($ticket->status === 'In elaborazione') color: white; background-color: rgb(83, 83, 83); @endif ">
                @if($ticket->status === 'In elaborazione') <span><i class="fa-solid fa-spinner rotazione-infinita"></i></span> @endif
                <span>
                    {{$ticket->status}}
                </span>
            </p>
        @endif
        <p class="mx-2"><span class="fw-bold">Titolo: </span> {{$ticket->titolo}}</p>
        <div class="mx-2">
            <p class="mb-0 fw-bold">
                Descrizione: 
            </p>
            <p class="mb-0">
                {{$ticket->descrizione}}
            </p>
        </div>
        @if ($ticket->allegato)    
        <a class="mx-2 m" target="_blank" href="{{asset('storage/' . $ticket->allegato)}}">
            <p class="mb-1">
                <i class="fa-solid fa-paperclip"></i> Allegato
            </p>
        </a>
        @endif
        @if (Auth::user()->super_admin_role != null)
            @if ($ticket->status === 'In elaborazione' || $ticket->status === 'aperto')
                <section class="d-flex justify-content-between">
                    @if ($ticket->status != 'aperto')    
                        <form class="d-inline-block" action="{{ route('admin.aperto', $ticket->id) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <button class="btn btn-sm btn-outline-success me-3" type="submit">
                                Accetta e apri il ticket
                            </button>
                        </form>
                    @endif
                    <div>
                        <form class="d-inline-block popupCloseTicket" action="{{ route('admin.chiuso', $ticket->id) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <button class="btn btn-sm btn-outline-danger me-3" type="submit">
                                Chiudi
                            </button>
                        </form>
                        <form class="d-inline-block popupRejectTicket" action="{{ route('admin.respinto', $ticket->id) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <button class="btn btn-sm btn-outline-warning me-3" type="submit">
                                Rifiuta il ticket
                            </button>
                        </form>
                    </div>
                </section>
            @endif
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var popupCloseTicket = document.querySelectorAll('form.popupCloseTicket');
                    popupCloseTicket.forEach(function(popupCloseTheTicket) {
                        popupCloseTheTicket.addEventListener('submit', function(event){
                            event.preventDefault();
                            Swal.fire({
                                title: "Sei sicuro di voler chiudere questo ticket?",
                                text: " ",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#3085d6",
                                cancelButtonColor: "#d33",
                                confirmButtonText: "Si!",
                                cancelButtonText: "Indietro"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    this.submit()
                                }
                            });
                        })
                    });

                    var popupRejectTicket = document.querySelectorAll('form.popupRejectTicket');
                    popupRejectTicket.forEach(function(popupRejectTheTicket) {
                        popupRejectTheTicket.addEventListener('submit', function(event){
                            event.preventDefault();
                            Swal.fire({
                                title: "Sei sicuro di voler respingere questo ticket?",
                                text: " ",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#3085d6",
                                cancelButtonColor: "#d33",
                                confirmButtonText: "Si!",
                                cancelButtonText: "Indietro"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    this.submit()
                                }
                            });
                        })
                    });
                });
            </script>
        @endif
        <p class="m-0 text-center">{{$ticket->created_at->diffForHumans()}}</p>
    </div>
        @empty
        <p>Non ci sono ticket</p>
    @endforelse
@endsection