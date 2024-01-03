<div class="position-fixed d-flex flex-column" style="right: 3px; top: 63px;">
    <a style="height: 40px; width: 40px;" href="{{route('admin.le-mie-aziende.index')}}" class="btn btn-dark"><i class="fa-solid fa-arrow-left-long"></i></a>
</div>
<form action="{{route($routeName, $agency)}}" method="POST" enctype="multipart/form-data" class="mt-2">

    @csrf
    @method($method)

    <div class="mb-3 d-flex">
        <div class="w-50">
            <label for="agency_nome" class="my_form_label_input">Nome dell'Azienda <span style="color: red">*</span></label>
            <input class="my_form_input_nome" type="text" id="agency_nome" name="nome" value="{{old('nome', $agency->nome)}}">
        </div>
        <div class="w-50 d-flex flex-column justify-content-center position-relative">
            <input class="my_form_input_logo d-none" type="file" id="agency_logo" name="logo" value="{{old('logo', $agency->logo)}}">
            <p class="m-0">Logo Aziendale</p>
            <label for="agency_logo" class="custom-file-upload">Scegli File...</label>
            <img class="position-absolute" id="agency_logo_Image" src="#" alt="Preview" style="height: 40px; border: 1px solid black; border-radius: 7px; display: none; max-width: 50px; left: 63%; bottom: 46%; padding: 2px; transform: translateY(75%);">
        </div>
    </div>
    
    <div class="mb-3">
        <label for="agency_motto" class="my_form_label_input">Motto Aziendale</label>
        <input class="my_form_input_motto" id="agency_motto" name="motto" value="{{old('motto', $agency->motto)}}">
    </div>

    <div class="mb-3 d-flex">
        <div class="w-50">
            <label for="agency_descrizione" class="my_form_label_input">Descrizione Aziendale <span style="color: red">*</span></label>
            <textarea id="agency_descrizione" rows="17" name="descrizione">{{old('descrizione', $agency->descrizione)}}</textarea>
        </div>
        <div class="w-50">
            <label for="agency_altre_informazioni" class="my_form_label_input">Altre Informazioni</label>
            <textarea id="agency_altre_informazioni" rows="17" name="altre_informazioni">{{old('altre_informazioni', $agency->altre_informazioni)}}</textarea>
        </div>
    </div>

    <div class="mb-3 d-flex">
        <div class="w-50 d-flex flex-column justify-content-center position-relative">
            <input class="form-control d-none" type="file" id="agency_immagine_copertina" name="immagine_copertina" value="{{old('immagine_copertina', $agency->immagine_copertina)}}">
            <p class="m-0">Immagine Copertina</p>
            <label for="agency_immagine_copertina" class="custom-file-upload">Immagine di copertina</label>
            <img class="position-absolute" id="agency_immagine_copertina_Image" src="#" alt="Preview" style="height: 40px; border-radius: 7px; display: none; max-width: 180px; left: 63%; bottom: 46%; transform: translateY(70%);">
        </div>
        <div class="w-50">
            <label for="agency_video_presentazione" class="my_form_label_input">Video di Presentazione</label>
            <input class="my_form_input_motto" type="text" id="agency_video_presentazione" name="video_presentazione" value="{{old('video_presentazione', $agency->video_presentazione)}}">
        </div>
    </div>

    <div class="mb-3 d-flex justify-content-between">
        <div class="w-50">
            <label for="agency_email" class="my_form_label_input">Email <span style="color: red">*</span></label>
            <input class="my_form_input_email" type="text" id="agency_email" name="email" value="{{old('email', $agency->email)}}">
        </div>
        <div class="w-50 d-flex">
            <div class="w-50">
                <label for="agency_telefono1" class="my_form_label_input">Telefono n.1 <span style="color: red">*</span></label>
                <input class="my_form_input_telefono" type="text" id="agency_telefono1" name="telefono1" maxlength="10" value="{{old('telefono1', $agency->telefono1)}}">
            </div>
            <div class="w-50">
                <label for="agency_telefono2" class="my_form_label_input">Telefono n.2</label>
                <input class="my_form_input_telefono" type="text" id="agency_telefono2" name="telefono2" maxlength="10" value="{{old('telefono2', $agency->telefono2)}}">
            </div>
        </div>
    </div>

    <div class="mb-3 d-flex">
        <div class="w-50 d-flex">
            <div class="w-50">
                <label for="agency_indirizzo" class="my_form_label_input">Indirizzo <span style="color: red">*</span></label>
                <input class="my_form_input_indirizzo" type="text" id="agency_indirizzo" name="indirizzo" value="{{old('indirizzo', $agency->indirizzo)}}">
            </div>
            <div class="w-50">
                <label for="agency_citta" class="my_form_label_input">Città <span style="color: red">*</span></label>
                <input class="my_form_input_citta" type="text" id="agency_citta" name="citta" value="{{old('citta', $agency->citta)}}">
            </div>
        </div>
    </div>
    
    <div class="mb-3 d-flex">
        <div class="w-50 d-flex">
            <div class="w-50">
                <label for="agency_cap" class="my_form_label_input">Codice Postale <span style="color: red">*</span></label>
                <input class="my_form_input_cap" type="text" id="agency_cap" name="cap"  maxlength="5" value="{{old('cap', $agency->cap)}}">
            </div>
            <div class="w-50">
                <label for="agency_provincia" class="my_form_label_input">Provincia <span style="color: red">*</span></label>
                <select class="js-example-basic-single" name="provincia" id="agency_provincia">
                    <option value="" selected>Selezione Provincia</option>
                    @foreach ($provinceItaliane as $abbreviazione => $provincia)    
                    <option value="{{$abbreviazione}}" @if(Route::currentRouteName() === 'admin.agency.create') @else {{ old('provincia', $agency->provincia) == $abbreviazione ? 'selected' : '' }} @endif>{{$provincia}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="w-50">
            <label for="agency_paese" class="my_form_label_input">Paese <span style="color: red">*</span></label>
            <input class="my_form_input_paese" type="text" id="agency_paese" name="paese" value="{{old('paese', $agency->paese)}}">
        </div>
    </div>
    <section class="dati_aziendali mb-3">
        <h3>
            Dati Legali e Fatturazione Elettronica
        </h3>
    
        <div class="mb-3 d-flex">
            <div class="w-50">
                <label for="agency_ragione_sociale" class="my_form_label_input">Ragione Sociale <span style="color: red">*</span></label>
                <input class="my_form_input_rSociale" type="text" id="agency_ragione_sociale" name="ragione_sociale" value="{{old('ragione_sociale', $agency->ragione_sociale)}}">
            </div>
            <div class="w-50">
                <label for="agency_tipo" class="my_form_label_input">Tipologia <span style="color: red">*</span></label>
                <input class="my_form_input_tipo" type="text" id="agency_tipo" name="tipo" value="{{old('tipo', $agency->tipo)}}">
            </div>
        </div>

        <div class="mb-3 d-flex">
            {{-- TODO NULLABLE NELLA MIGRATION A P.IVA e CODICE FISCALE gia scritto fare REFRESH--}}
            <div class="w-50">
                <label for="agency_p_iva" class="my_form_label_input">Partita IVA</label>
                <input class="my_form_input_pIva" type="text" id="agency_p_iva" name="p_iva" maxlength="13" value="{{old('p_iva', $agency->p_iva)}}">
            </div>
            <div class="w-50">
                <label for="agency_codice_fiscale" class="my_form_label_input">Codice Fiscale</label>
                <input class="my_form_input_cFiscale" type="text" id="agency_codice_fiscale" name="codice_fiscale" maxlength="16" value="{{old('codice_fiscale', $agency->codice_fiscale)}}">
            </div>
        </div>
    
        <div class="mb-3">
            <label for="agency_pec" class="my_form_label_input">Pec</label>
            <input class="my_form_input_pec" type="text" id="agency_pec" name="pec" value="{{old('pec', $agency->pec)}}">
        </div>
    
        <div class="mb-3">
            <label for="agency_sdi" class="my_form_label_input">Codice SDI</label>
            <input class="my_form_input_sdi" type="text" id="agency_sdi" name="sdi" value="{{old('sdi', $agency->sdi)}}">
        </div>
    </section>

    <div class="mb-3">
        <div class="w-50 d-flex">
            <label class="checkbox-visible">
                <input class="my_form_input_visibile" type="radio" id="visible" name="visibile" value="1" required @checked(old('visibile', $agency->visibile))>
                <span>
                    Visibile
                </span>
            </label>
        
            <label class="checkbox-visible">
                <input class="my_form_input_visibile" type="radio" id="not_visible" name="visibile" value="0" required @checked(!old('visibile', $agency->visibile))>
                <span>
                    Non Visibile
                </span>
            </label>
        </div>
    </div>

    <div class="mb-3">
        <label for="agency_whatsapp" class="my_form_label_input">Whatsapp</label>
        <input class="form-control" type="text" id="agency_whatsapp" name="whatsapp" value="{{old('whatsapp', $agency->whatsapp)}}">
    </div>
    <div class="mb-3">
        <label for="agency_instagram" class="my_form_label_input">Instagram</label>
        <input class="form-control" type="text" id="agency_instagram" name="instagram" value="{{old('instagram', $agency->instagram)}}">
    </div>
    <div class="mb-3">
        <label for="agency_facebook" class="my_form_label_input">Facebook</label>
        <input class="form-control" type="text" id="agency_facebook" name="facebook" value="{{old('facebook', $agency->facebook)}}">
    </div>
    <div class="mb-3">
        <label for="agency_youtube" class="my_form_label_input">Youtube</label>
        <input class="form-control" type="text" id="agency_youtube" name="youtube" value="{{old('youtube', $agency->youtube)}}">
    </div>
    <div class="mb-3">
        <label for="agency_tiktok" class="my_form_label_input">TikTok</label>
        <input class="form-control" type="text" id="agency_tiktok" name="tiktok" value="{{old('tiktok', $agency->tiktok)}}">
    </div>
    <div class="mb-3">
        <label for="agency_linkedin" class="my_form_label_input">Linkedin</label>
        <input class="form-control" type="text" id="agency_linkedin" name="linkedin" value="{{old('linkedin', $agency->linkedin)}}">
    </div>

    <div class="mb-3">
        <button style="height: 40px; width: 40px; right: 3px; top: 107px;" type="submit" class="btn btn-success position-fixed">
            <i class="fa-solid fa-floppy-disk"></i>
        </button>
    </div>
</form>