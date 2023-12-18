
<form action="{{route($routeName, $agency)}}" method="POST" enctype="multipart/form-data">

    @csrf
    @method($method)

    <div class="mb-3">
        <label for="agency_nome" class="form-label">Nome dell'Azienda</label>
        <input class="form-control" type="text" id="agency_nome" name="nome" value="{{old('nome', $agency->nome)}}">
    </div>

    <div class="mb-3">
        <label for="agency_logo" class="form-label">Logo Aziendale</label>
        <input class="form-control" type="file" id="agency_logo" name="logo" value="{{old('logo', $agency->logo)}}">
    </div>
    <img id="agency_logo_Image" src="#" alt="Preview" style="display: none; max-width: 100px;">
    
    <div class="mb-3">
        <label for="agency_motto" class="form-label">Motto dell'Azienda</label>
        <textarea class="form-control" id="agency_motto" rows="3" name="motto">{{old('motto', $agency->motto)}}</textarea>
    </div>

    <div class="mb-3">
        <label for="agency_descrizione" class="form-label">Descrizione Aziendale</label>
        <textarea class="form-control" id="agency_descrizione" rows="10" name="descrizione">{{old('descrizione', $agency->descrizione)}}</textarea>
    </div>

    <div class="mb-3">
        <label for="agency_altre_informazioni" class="form-label">Altre Informazioni</label>
        <textarea class="form-control" id="agency_altre_informazioni" rows="5" name="altre_informazioni">{{old('altre_informazioni', $agency->altre_informazioni)}}</textarea>
    </div>

    <div class="mb-3">
        <label for="agency_immagine_copertina" class="form-label">Immagine di copertina</label>
        <input class="form-control" type="file" id="agency_immagine_copertina" name="immagine_copertina" value="{{old('immagine_copertina', $agency->immagine_copertina)}}">
    </div>
    <img id="agency_immagine_copertina_Image" src="#" alt="Preview" style="display: none; max-width: 100px;">

    <div class="mb-3">
        <label for="agency_video_presentazione" class="form-label">Video di Presentazione</label>
        <input class="form-control" type="text" id="agency_video_presentazione" name="video_presentazione" value="{{old('video_presentazione', $agency->video_presentazione)}}">
    </div>

    <div class="mb-3">
        <label for="agency_email" class="form-label">Email</label>
        <input class="form-control" type="text" id="agency_email" name="email" value="{{old('email', $agency->email)}}">
    </div>
    
    <div class="mb-3">
        <label for="agency_telefono1" class="form-label">Telefono n.1</label>
        <input class="form-control" type="text" id="agency_telefono1" name="telefono1" maxlength="10" value="{{old('telefono1', $agency->telefono1)}}">
    </div>

    <div class="mb-3">
        <label for="agency_telefono2" class="form-label">Telefono n.2</label>
        <input class="form-control" type="text" id="agency_telefono2" name="telefono2" maxlength="10" value="{{old('telefono2', $agency->telefono2)}}">
    </div>

    <div class="mb-3">
        <label for="agency_indirizzo" class="form-label">Indirizzo</label>
        <input class="form-control" type="text" id="agency_indirizzo" name="indirizzo" value="{{old('indirizzo', $agency->indirizzo)}}">
    </div>
    
    <div class="mb-3">
        <label for="agency_citta" class="form-label">Città</label>
        <input class="form-control" type="text" id="agency_citta" name="citta" value="{{old('citta', $agency->citta)}}">
    </div>
    
    <div class="mb-3">
        <label for="agency_provincia" class="form-label">Provincia</label>
        {{-- <input class="form-control" type="text" id="agency_provincia" name="provincia" value="{{old('provincia', $agency->provincia)}}"> --}}
        <select class="js-example-basic-single" name="provincia" id="agency_provincia">
            <option value="" selected>Selezione Provincia</option>
            @foreach ($provinceItaliane as $abbreviazione => $provincia)    
            <option value="{{$abbreviazione}}" @if(Route::currentRouteName() === 'admin.agency.create') @else {{ old('provincia', $agency->provincia) == $abbreviazione ? 'selected' : '' }} @endif>{{$provincia}}</option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label for="agency_cap" class="form-label">Codice Postale</label>
        <input class="form-control" type="text" id="agency_cap" name="cap"  maxlength="5" value="{{old('cap', $agency->cap)}}">
    </div>
    
    <div class="mb-3">
        <label for="agency_paese" class="form-label">Paese</label>
        <input class="form-control" type="text" id="agency_paese" name="paese" value="{{old('paese', $agency->paese)}}">
    </div>

    <div class="mb-3">
        <label for="agency_ragione_sociale" class="form-label">Ragione Sociale</label>
        <input class="form-control" type="text" id="agency_ragione_sociale" name="ragione_sociale" value="{{old('ragione_sociale', $agency->ragione_sociale)}}">
    </div>

    <div class="mb-3">
        <label for="agency_p_iva" class="form-label">Partita IVA</label>
        <input class="form-control" type="text" id="agency_p_iva" name="p_iva" maxlength="13" value="{{old('p_iva', $agency->p_iva)}}">
    </div>

    <div class="mb-3">
        <label for="agency_codice_fiscale" class="form-label">Codice Fiscale</label>
        <input class="form-control" type="text" id="agency_codice_fiscale" name="codice_fiscale" maxlength="16" value="{{old('codice_fiscale', $agency->codice_fiscale)}}">
    </div>

    <div class="mb-3">
        <label for="agency_pec" class="form-label">Pec</label>
        <input class="form-control" type="text" id="agency_pec" name="pec" value="{{old('pec', $agency->pec)}}">
    </div>

    <div class="mb-3">
        <label for="agency_sdi" class="form-label">Codice SDI</label>
        <input class="form-control" type="text" id="agency_sdi" name="sdi" value="{{old('sdi', $agency->sdi)}}">
    </div>

    <div class="mb-3">
        <label for="agency_tipo" class="form-label">Tipologia</label>
        <input class="form-control" type="text" id="agency_tipo" name="tipo" value="{{old('tipo', $agency->tipo)}}">
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" id="visible" name="visibile" value="1" required @checked(old('visibile', $agency->visibile))>
        <label class="form-check-label" for="dishVisible">
            Visibile
        </label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" id="not_visible" name="visibile" value="0" required @checked(!old('visibile', $agency->visibile))>
        <label class="form-check-label" for="dish-notVisible">
            Non Visibile
        </label>
    </div>

    <div class="mb-3">
        <label for="agency_whatsapp" class="form-label">Whatsapp</label>
        <input class="form-control" type="text" id="agency_whatsapp" name="whatsapp" value="{{old('whatsapp', $agency->whatsapp)}}">
    </div>
    <div class="mb-3">
        <label for="agency_instagram" class="form-label">Instagram</label>
        <input class="form-control" type="text" id="agency_instagram" name="instagram" value="{{old('instagram', $agency->instagram)}}">
    </div>
    <div class="mb-3">
        <label for="agency_facebook" class="form-label">Facebook</label>
        <input class="form-control" type="text" id="agency_facebook" name="facebook" value="{{old('facebook', $agency->facebook)}}">
    </div>
    <div class="mb-3">
        <label for="agency_youtube" class="form-label">Youtube</label>
        <input class="form-control" type="text" id="agency_youtube" name="youtube" value="{{old('youtube', $agency->youtube)}}">
    </div>
    <div class="mb-3">
        <label for="agency_tiktok" class="form-label">TikTok</label>
        <input class="form-control" type="text" id="agency_tiktok" name="tiktok" value="{{old('tiktok', $agency->tiktok)}}">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-outline-dark">
            Salva
        </button>
    </div>
</form>