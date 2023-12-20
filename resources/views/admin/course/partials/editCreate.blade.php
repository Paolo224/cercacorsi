<form action="{{route($routeName, $course)}}" method="POST" enctype="multipart/form-data">

    @csrf
    @method($method)
    <div class="mb-3">
        <label for="course_agency_id" class="form-label">A quale azienda fa riferimento questo corso?</label>
        <select {{-- class="js-example-basic-single"--}} name="agency_id" id="course_agency_id"> 
            <option value="" selected disabled></option>
            @foreach ($agencies as $agency)    
            <option value="{{$agency->id}}" @if(Route::currentRouteName() === 'admin.course.create') @else {{ $course->agency_id == $agency->id ? 'selected' : '' }} @endif>{{$agency->nome}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="course_categoria" class="form-label">Di che Categoria fa Parte il Corso?</label>
        <select {{-- class="js-example-basic-single"--}} name="categoria" id="course_categoria"> 
            <option value="" selected disabled></option>
            @foreach ($categoriaCorso as $categoria => $valore)    
            <option value="{{$categoria}}" @if(Route::currentRouteName() === 'admin.course.create') @else {{ old('categoria', $course->categoria) == $categoria ? 'selected' : '' }} @endif>{{$valore}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="coruse_titolo" class="form-label">Titolo del Corso</label>
        <input class="form-control" type="text" id="coruse_titolo" name="titolo" value="{{old('titolo', $course->titolo)}}">
    </div>

    <div class="mb-3">
        <label for="course_sottotitolo" class="form-label">Sottotitolo</label>
        <input class="form-control" type="text" id="course_sottotitolo" name="sottotitolo" value="{{old('sottotitolo', $course->sottotitolo)}}">
    </div>

    <div class="mb-3">
        <label for="course_descrizione" class="form-label">Descrizione</label>
        <textarea class="form-control" id="course_descrizione" rows="10" name="descrizione">{{old('descrizione', $course->descrizione)}}</textarea>
    </div>

    <div class="mb-3">
        <label for="course_immagine" class="form-label">Immagine</label>
        <input class="form-control" type="file" id="course_immagine" name="immagine" value="{{old('immagine', $course->immagine)}}">
    </div>
    <img id="course_immagine_Image" src="#" alt="Preview" style="display: none; max-width: 100px;">
    
    <div class="mb-3">
        <label for="course_video_corso" class="form-label">Video di Presentazione</label>
        <input class="form-control" type="text" id="course_video_corso" name="video_corso" value="{{old('video_corso', $course->video_corso)}}">
    </div>

    <div class="mb-3">
        <label for="course_prezzo" class="form-label">Prezzo</label>
        <input class="form-control" type="text" id="course_prezzo" name="prezzo" value="{{old('prezzo', $course->prezzo)}}">
    </div>

    <div class="mb-3">
        <label for="course_durata" class="form-label">Durata del Corso</label>
        <input class="form-control" type="text" id="course_durata" name="durata" value="{{old('durata', $course->durata)}}">
    </div>

    <div class="mb-3">
        <label for="course_programma" class="form-label">Programma del Corso</label>
        <textarea class="form-control" id="course_programma" rows="3" name="programma">{{old('programma', $course->programma)}}</textarea>
    </div>

    <div class="mb-3">
        <label for="course_competenze_partenza" class="form-label">Competenze di Partenza</label>
        <input class="form-control" id="course_competenze_partenza" name="competenze_partenza" value="{{old('competenze_partenza', $course->competenze_partenza)}}">
    </div>

    <div class="mb-3">
        <label for="course_obiettivi" class="form-label">Obiettivi</label>
        <input class="form-control" type="text" id="course_obiettivi" name="obiettivi" value="{{old('obiettivi', $course->obiettivi)}}">
    </div>
    
    <div class="mb-3">
        <label for="course_attestato" class="form-label">É presente un attestato?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" id="course_attestato_si" name="attestato" value="1" required @checked(old('attestato', $course->attestato))>
            <label class="form-check-label">
                Si
            </label>
        </div>
    
        <div class="form-check">
            <input class="form-check-input" type="radio" id="course_attestato_no" name="attestato" value="0" required @checked(!old('attestato', $course->attestato))>
            <label class="form-check-label">
                No
            </label>
        </div>
    </div>

    <div class="mb-3">
        <label for="course_descrizione_attestato" class="form-label">Descrizione Attestato</label>
        <textarea class="form-control" id="course_descrizione_attestato" rows="10" name="descrizione_attestato">{{old('descrizione_attestato', $course->descrizione_attestato)}}</textarea>
    </div>

    <label for="course_lingua" class="form-label">Lingua del Corso</label>
    <select {{-- class="js-example-basic-single"--}} name="lingua" id="course_lingua"> 
        <option value="" selected disabled></option>
        @foreach ($lingueErogazioneCorso as $lingua => $valore)    
        <option value="{{$lingua}}" @if(Route::currentRouteName() === 'admin.course.create') @else {{ old('provincia', $course->lingua) == $lingua ? 'selected' : '' }} @endif>{{$valore}}</option>
        @endforeach
    </select>

    <div class="mb-3">
        <label for="course_on_site" class="form-label">Corso di Formazione presso Terzi</label>
        <input type="checkbox" id="course_on_site" name="on_site" value="1" @if(Route::currentRouteName() === 'admin.course.create') @else {{ old('on_site', $course->on_site) == 1 ? 'checked' : '' }} @endif>
    </div>

    <div class="mb-3">
        <label for="course_in_aula" class="form-label">Corso in Presenza</label>
        <input type="checkbox" id="course_in_aula" name="in_aula" value="1" @if(Route::currentRouteName() === 'admin.course.create') @else {{ old('in_aula', $course->in_aula) == 1 ? 'checked' : '' }} @endif>
    </div>

    <div class="mb-3">
        <label for="course_fad" class="form-label">Corso di Formazione a Distanza</label>
        <input type="checkbox" id="course_fad" name="fad" value="1" @if(Route::currentRouteName() === 'admin.course.create') @else {{ old('fad', $course->fad) == 1 ? 'checked' : '' }} @endif>
    </div>

    <div class="mb-3">
        <label for="course_a_chi_si_rivolge" class="form-label">A chi è rivolto il corso?</label>
        <input class="form-control" type="text" id="course_a_chi_si_rivolge" name="a_chi_si_rivolge" value="{{old('a_chi_si_rivolge', $course->a_chi_si_rivolge)}}">
    </div>
    
    <div class="mb-3">
        <label for="course_requisiti_richiesti" class="form-label">Requisiti Richiesti</label>
        <input class="form-control" type="text" id="course_requisiti_richiesti" name="requisiti_richiesti" value="{{old('requisiti_richiesti', $course->requisiti_richiesti)}}">
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" id="visible" name="visibile" value="1" required @checked(old('visibile', $course->visibile))>
        <label class="form-check-label">
            Visibile
        </label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" id="not_visible" name="visibile" value="0" required @checked(!old('visibile', $course->visibile))>
        <label class="form-check-label">
            Non Visibile
        </label>
    </div>
    
    <div class="mb-3">
        <button type="submit" class="btn btn-outline-dark">
            Salva
        </button>
    </div>
</form>