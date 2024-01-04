<div class="position-fixed d-flex flex-column" style="right: 3px; top: 63px;">
    <a style="height: 40px; width: 40px;" href="{{route('admin.tutti-i-corsi.index')}}" class="btn btn-dark"><i class="fa-solid fa-arrow-left-long"></i></a>
</div>
<form action="{{route($routeName, $course)}}" method="POST" enctype="multipart/form-data" class="mt-2">

    @csrf
    @method($method)
    <div class="mb-3 d-flex">
        <div class="w-50">
            <label for="course_agency_id" class="my_form_label_input">A Quale Azienda fa Riferimento il Corso? <span style="color: red">*</span></label>
            <select class="my_form_input_azienda" {{-- class="js-example-basic-single"--}} name="agency_id" id="course_agency_id"> 
                <option value="" selected disabled></option>
                @foreach ($agencies as $agency)    
                <option value="{{$agency->id}}" @if(Route::currentRouteName() === 'admin.tutti-i-corsi.create') @else {{ $course->agency_id == $agency->id ? 'selected' : '' }} @endif>{{$agency->nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="w-50">
            <label for="course_categoria" class="my_form_label_input">Categoria <span style="color: red">*</span></label>
            <select class="my_form_input_categoria" {{-- class="js-example-basic-single"--}} name="categoria" id="course_categoria"> 
                <option value="" selected disabled></option>
                @foreach ($categoriaCorso as $categoria => $valore)    
                <option value="{{$categoria}}" @if(Route::currentRouteName() === 'admin.course.create') @else {{ old('categoria', $course->categoria) == $categoria ? 'selected' : '' }} @endif>{{$valore}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3">
        <label for="coruse_titolo" class="my_form_label_input">Titolo del Corso <span style="color: red">*</span></label>
        <input class="my_form_input_titolo" type="text" id="coruse_titolo" name="titolo" value="{{old('titolo', $course->titolo)}}">
    </div>

    <div class="mb-3">
        <label for="course_sottotitolo" class="my_form_label_input">Sottotitolo</label>
        <input class="my_form_input_sottotitolo" type="text" id="course_sottotitolo" name="sottotitolo" value="{{old('sottotitolo', $course->sottotitolo)}}">
    </div>

    <div class="mb-3">
        <label for="course_descrizione" class="my_form_label_input">Descrizione <span style="color: red">*</span></label>
        <textarea class="my_form_input_descrizione" id="course_descrizione" rows="10" name="descrizione">{{old('descrizione', $course->descrizione)}}</textarea>
    </div>

    <div class="mb-3 d-flex">
        <div class="w-50 d-flex flex-column justify-content-center position-relative">
            <input class="form-control d-none" type="file" id="course_immagine" name="immagine" value="{{old('immagine', $course->immagine)}}">
            <p class="m-0">Immagine Copertina</p>
            <label for="course_immagine" class="custom-file-upload">Scegli FIle...</label>
            <img class="position-absolute" id="course_immagine_Image" src="#" alt="Preview" style="height: 40px; border-radius: 7px; display: none; max-width: 180px; left: 63%; bottom: 46%; transform: translateY(70%);">
        </div>
        
        <div class="w-50">
            <label for="course_video_corso" class="my_form_label_input">Video di Presentazione</label>
            <input class="my_form_input_video" type="text" id="course_video_corso" name="video_corso" value="{{old('video_corso', $course->video_corso)}}">
        </div>
    </div>

    <div class="mb-3 d-flex justify-content-between">
        <div style="width: 26%;">
            <label for="course_prezzo" class="my_form_label_input">Prezzo</label>
            <input maxlength="11" class="my_form_input_prezzo" type="text" id="course_prezzo" name="prezzo" value="{{old('prezzo', $course->prezzo)}}">
        </div>

        <div style="width: 26%;">
            <label for="course_durata" class="my_form_label_input">Durata del Corso <span style="color: red">*</span></label>
            <input class="my_form_input_durata" type="text" id="course_durata" name="durata" value="{{old('durata', $course->durata)}}">
        </div>
        
        <div style="width: 26%;">
            <label for="course_lingua" class="my_form_label_input">Lingua del Corso <span style="color: red">*</span></label>
            <select {{-- class="js-example-basic-single"--}} class="my_form_input_lingua" name="lingua" id="course_lingua"> 
                <option value="" selected disabled></option>
                @foreach ($lingueErogazioneCorso as $lingua => $valore)    
                <option value="{{$lingua}}" @if(Route::currentRouteName() === 'admin.course.create') @else {{ old('lingua', $course->lingua) == $lingua ? 'selected' : '' }} @endif>{{$valore}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="mb-3 d-flex">
        <div class="w-50">
            <label for="course_programma" class="my_form_label_input">Programma del Corso <span style="color: red">*</span></label>
            <textarea class="my_form_input_programma" id="course_programma" rows="7" name="programma">{{old('programma', $course->programma)}}</textarea>
        </div>
        
        <div class="w-50 d-flex flex-column justify-content-evenly">
            <div class="w-100">
                <label for="course_competenze_partenza" class="my_form_label_input">Competenze di Partenza <span style="color: red">*</span></label>
                <input class="my_form_input_cPartenza" id="course_competenze_partenza" name="competenze_partenza" value="{{old('competenze_partenza', $course->competenze_partenza)}}">
            </div>
            
            <div class="w-100">
                <label for="course_obiettivi" class="my_form_label_input">Obiettivi <span style="color: red">*</span></label>
                <input class="my_form_input_obiettivi" type="text" id="course_obiettivi" name="obiettivi" value="{{old('obiettivi', $course->obiettivi)}}">
            </div>
        </div>
    </div>

    <div class="mb-3">
        <div class="w-50 d-flex">
            <label class="checkbox-attestato">
                <input class="my_form_input_attestato" type="radio" id="course_attestato_si" name="attestato" value="1" required @checked(old('attestato', $course->attestato))>
                <span>
                    È presente un attestato
                </span>
            </label>
    
            <label class="checkbox-attestato">
                <input class="my_form_input_attestato" type="radio" id="course_attestato_no" name="attestato" value="0" required @checked(!old('attestato', $course->attestato))>
                <span>
                    Non è presente un attestato
                </span>
            </label>
        </div>
    </div>

    <div class="mb-3" id="course_descrizione_attestato_riga" @if(Route::currentRouteName() === 'admin.tutti-i-corsi.create') style="overflow: hidden; height: 0;" @elseif(Route::currentRouteName() === 'admin.tutti-i-corsi.edit' && $course->attestato == 0) style="overflow: hidden; height: 0;" @else  @endif>
        <label for="course_descrizione_attestato" class="my_form_label_input">Descrizione Attestato</label>
        <textarea class="my_form_input_descrizione" id="course_descrizione_attestato" rows="10" name="descrizione_attestato">{{old('descrizione_attestato', $course->descrizione_attestato)}}</textarea>
    </div>

    <section class="my-5">
        <div class="mb-3 d-flex align-items-center">
            <label for="course_on_site" class="switch">
                <input type="checkbox" id="course_on_site" name="on_site" value="1" @if(Route::currentRouteName() === 'admin.course.create') @else {{ old('on_site', $course->on_site) == 1 ? 'checked' : '' }} @endif>
                <span class="slider"></span>
            </label>
            <p class="m-0 ps-2 fs-5">Corso On Site</p>
        </div>
    
        <div class="mb-3 d-flex align-items-center">
            <label for="course_in_aula" class="switch">
                <input type="checkbox" id="course_in_aula" name="in_aula" value="1" @if(Route::currentRouteName() === 'admin.course.create') @else {{ old('in_aula', $course->in_aula) == 1 ? 'checked' : '' }} @endif>
                <span class="slider"></span>
            </label>
            <p class="m-0 ps-2 fs-5">Corso In Aula</p>
        </div>
    
        <div class="mb-3 d-flex align-items-center">
            <label for="course_fad" class="switch">
                <input type="checkbox" id="course_fad" name="fad" value="1" @if(Route::currentRouteName() === 'admin.course.create') @else {{ old('fad', $course->fad) == 1 ? 'checked' : '' }} @endif>
                <span class="slider"></span>
            </label>
            <p class="m-0 ps-2 fs-5">Corso di Formazione a Distanza</p>
        </div>
    </section>

    <div class="mb-3 d-flex">
        <div class="w-50">
            <label for="course_a_chi_si_rivolge" class="my_form_label_input">A chi è rivolto il corso? <span style="color: red">*</span></label>
            <input class="my_form_input_rCorso" type="text" id="course_a_chi_si_rivolge" name="a_chi_si_rivolge" value="{{old('a_chi_si_rivolge', $course->a_chi_si_rivolge)}}">
        </div>
        
        <div class="w-50">
            <label for="course_requisiti_richiesti" class="my_form_label_input">Requisiti Richiesti <span style="color: red">*</span></label>
            <input class="my_form_input_rRichiesti" type="text" id="course_requisiti_richiesti" name="requisiti_richiesti" value="{{old('requisiti_richiesti', $course->requisiti_richiesti)}}">
        </div>
    </div>

    <div class="mb-3">
        <div class="w-50 d-flex">
            <label class="checkbox-visible">
                <input class="my_form_input_visibile" type="radio" id="visible" name="visibile" value="1" required @checked(old('visibile', $course->visibile))>
                <span>
                    Visibile
                </span>
            </label>
        
            <label class="checkbox-visible">
                <input class="my_form_input_visibile" type="radio" id="not_visible" name="visibile" value="0" required @checked(!old('visibile', $course->visibile))>
                <span>
                    Non Visibile
                </span>
            </label>
        </div>
    </div>

    <div class="mb-3">
        <button style="height: 40px; width: 40px; right: 3px; top: 107px;" type="submit" class="btn btn-success position-fixed">
            <i class="fa-solid fa-floppy-disk"></i>
        </button>
    </div>
</form>