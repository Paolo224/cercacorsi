@php
    $user = Auth::user();

    $agencies = $user->agencies;

    $aziendeAssegnate = \App\Models\Admin\AssegnazioneAziendeAiGestori::where('id_gestore', $segretario->id)->get();

@endphp
<form action="{{route('admin.assegnazione')}}" method="post">
    @csrf
    <input type="hidden" name="id_gestore" value="{{ $segretario->id }}">
    @foreach ($agencies as $agency)
        <div class="mb-2">
            <label for="{{$agency->nome}}">{{$agency->nome}}</label>
            <input type="checkbox" name="id_azienda[]" value="{{$agency->id}}" {{ in_array($agency->id, old('id_azienda', [])) || in_array($agency->id, $aziendeAssegnate->pluck('id_azienda')->toArray()) ? 'checked' : '' }}>
        </div>
    @endforeach
    <button type="submit" class="btn-sm btn btn-outline-dark">Salva</button>
</form>