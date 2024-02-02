<p>Nuovo ticket aperto da {{$newTicket->user->nome}}</p>
<p>Titolo:</p>
<p>{{$newTicket->titolo}}</p>
<hr>
<p>Descrizione:</p>
<p>{{$newTicket->descrizione}}</p>

<a href="{{route('admin.ticket.index')}}">Vai alla lista di ticket</a>