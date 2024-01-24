<div class="position-fixed d-flex flex-column" style="right: 3px; top: 63px;">
    <a style="height: 40px; width: 40px;" href="{{route('admin.le-mie-aziende.index')}}" class="btn btn-dark"><i class="fa-solid fa-arrow-left-long"></i></a>
</div>
<form action="{{route($routeName, $agency)}}" method="POST" enctype="multipart/form-data" class="mt-2">

    @csrf
    @method($method)

    <div class="mb-3 d-flex">
        @if (Auth::user()->id_admin !== 0)
        <div class="w-50 @if (Auth::user()->id_admin !== 0) d-none @endif">
            <label for="agency_nome" class="my_form_label_input">Nome dell'Azienda <span style="color: red">*</span></label>
            <input class="my_form_input_nome"  @if (Auth::user()->id_admin === 0) type="text" @else type="hidden" @endif id="agency_nome" name="nome" value="{{old('nome', $agency->nome)}}" @error('nome') style="border: 1px solid red" @enderror>
            @error('nome')    
                <div class="text-danger">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
                </div>
            @enderror
        </div>
        @endif
        <div class="w-50 d-flex flex-column justify-content-center position-relative">
            <input class="my_form_input_logo d-none" type="file" id="agency_logo" name="logo" value="{{old('logo', $agency->logo)}}">
            <p class="m-0">Logo Aziendale</p>
            <label for="agency_logo" class="custom-file-upload" @error('logo') style="border: 1px solid red; background-color: red; opacity: 0.4; color: white;" @enderror>Scegli File...</label>
            <img class="position-absolute" id="agency_logo_Image" src="#" alt="Preview" style="height: 40px; border: 1px solid black; border-radius: 7px; display: none; max-width: 50px; left: 63%; bottom: 46%; padding: 2px; transform: translateY(75%);">
            @error('logo')    
                <div class="text-danger">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
                </div>
            @enderror
        </div>
    </div>
    
    <div class="mb-3">
        <label for="agency_motto" class="my_form_label_input">Motto Aziendale</label>
        <input class="my_form_input_motto" id="agency_motto" name="motto" value="{{old('motto', $agency->motto)}}" @error('motto') style="border: 1px solid red" @enderror>
        @error('motto')    
                <div class="text-danger">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
                </div>
        @enderror
    </div>

    <div class="mb-3 d-flex">
        <div class="w-50">
            <label for="agency_descrizione" class="my_form_label_input">Descrizione Aziendale <span style="color: red">*</span></label>
            <textarea @error('descrizione') style="border: 1px solid red" @enderror id="agency_descrizione" rows="17" name="descrizione">{{old('descrizione', $agency->descrizione)}}</textarea>
            @error('descrizione')    
                <div class="text-danger">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
                </div>
            @enderror
        </div>
        <div class="w-50">
            <label for="agency_altre_informazioni" class="my_form_label_input">Altre Informazioni</label>
            <textarea @error('altre_informazioni') style="border: 1px solid red" @enderror id="agency_altre_informazioni" rows="17" name="altre_informazioni">{{old('altre_informazioni', $agency->altre_informazioni)}}</textarea>
            @error('altre_informazioni')    
                <div class="text-danger">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
                </div>
            @enderror
        </div>
    </div>

    <div class="mb-3 d-flex">
        <div class="w-50 d-flex flex-column justify-content-center position-relative">
            <input class="form-control d-none" type="file" id="agency_immagine_copertina" name="immagine_copertina" value="{{old('immagine_copertina', $agency->immagine_copertina)}}">
            <p class="m-0">Immagine Copertina</p>
            <label for="agency_immagine_copertina" class="custom-file-upload" @error('immagine_copertina') style="border: 1px solid red; background-color: red; opacity: 0.4; color: white;" @enderror>Scegli File...</label>
            <img class="position-absolute" id="agency_immagine_copertina_Image" src="#" alt="Preview" style="height: 40px; border-radius: 7px; display: none; max-width: 180px; left: 63%; bottom: 46%; transform: translateY(70%);">
            @error('immagine_copertina')    
                <div class="text-danger">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
                </div>
            @enderror
        </div>
        <div class="w-50">
            <label for="agency_video_presentazione" class="my_form_label_input">Video di Presentazione</label>
            <input @error('video_presentazione') style="border: 1px solid red" @enderror class="my_form_input_video" type="text" id="agency_video_presentazione" name="video_presentazione" value="{{old('video_presentazione', $agency->video_presentazione)}}">
            @error('video_presentazione')    
                <div class="text-danger">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
                </div>
            @enderror
        </div>
    </div>

    <div class="mb-3 d-flex justify-content-between">
        <div class="w-50">
            <label for="agency_email" class="my_form_label_input">Email <span style="color: red">*</span></label>
            <input @error('email') style="border: 1px solid red" @enderror class="my_form_input_email" type="text" id="agency_email" name="email" value="{{old('email', $agency->email)}}">
            @error('email')    
                <div class="text-danger">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
                </div>
            @enderror
        </div>
        <div class="w-50 d-flex">
            <div class="w-50">
                <label for="agency_telefono1" class="my_form_label_input">Telefono n.1 <span style="color: red">*</span></label>
                <input @error('telefono1') style="border: 1px solid red" @enderror class="my_form_input_telefono" type="text" id="agency_telefono1" name="telefono1" maxlength="10" value="{{old('telefono1', $agency->telefono1)}}">
                @error('telefono1')    
                    <div class="text-danger">
                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
                    </div>
                @enderror
            </div>
            <div class="w-50">
                <label for="agency_telefono2" class="my_form_label_input">Telefono n.2</label>
                <input @error('telefono2') style="border: 1px solid red" @enderror class="my_form_input_telefono" type="text" id="agency_telefono2" name="telefono2" maxlength="10" value="{{old('telefono2', $agency->telefono2)}}">
                @error('telefono2')    
                    <div class="text-danger">
                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="mb-3 d-flex">
        <div class="w-50 d-flex">
            <div class="w-50">
                <label for="agency_indirizzo" class="my_form_label_input">Indirizzo <span style="color: red">*</span></label>
                <input @error('indirizzo') style="border: 1px solid red" @enderror class="my_form_input_indirizzo" type="text" id="agency_indirizzo" name="indirizzo" value="{{old('indirizzo', $agency->indirizzo)}}">
                @error('indirizzo')    
                    <div class="text-danger">
                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
                    </div>
                @enderror
            </div>
            <div class="w-50">
                <label for="agency_citta" class="my_form_label_input">Città <span style="color: red">*</span></label>
                <input @error('citta') style="border: 1px solid red" @enderror class="my_form_input_citta" type="text" id="agency_citta" name="citta" value="{{old('citta', $agency->citta)}}">
                @error('citta')    
                    <div class="text-danger">
                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="mb-3 d-flex">
        <div class="w-50 d-flex">
            <div class="w-50">
                <label for="agency_cap" class="my_form_label_input">Codice Postale <span style="color: red">*</span></label>
                <input @error('cap') style="border: 1px solid red" @enderror class="my_form_input_cap" type="text" id="agency_cap" name="cap"  maxlength="5" value="{{old('cap', $agency->cap)}}">
                @error('cap')    
                    <div class="text-danger">
                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
                    </div>
                @enderror
            </div>
            <div class="w-50">
                <label for="agency_provincia" class="my_form_label_input">Provincia <span style="color: red">*</span></label>
                <select class="js-example-basic-single js-example-responsive" style="width: 80%; height: 40px;" name="provincia" id="agency_provincia">
                    <option value="" selected>Selezione Provincia</option>
                    @foreach ($provinceItaliane as $abbreviazione => $provincia)    
                    <option value="{{$abbreviazione}}" @if(Route::currentRouteName() === 'admin.agency.create') @else {{ old('provincia', $agency->provincia) == $abbreviazione ? 'selected' : '' }} @endif>{{$provincia}}</option>
                    @endforeach
                </select>
                @error('provincia')    
                    <div class="text-danger">
                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="w-50">
            <label for="agency_paese" class="my_form_label_input">Paese <span style="color: red">*</span></label>
            {{-- <input class="my_form_input_paese" type="text" id="agency_paese" name="paese" value="{{old('paese', $agency->paese)}}"> --}}
            <select @error('paese') style="border: 1px solid red" @enderror class="my_form_input_paese" name="paese" id="agency_paese">
                <option value="" selected>Selezione Paese</option>
                @foreach ($paesiMondiali as $paeseK => $paese)    
                <option value="{{$paeseK}}" @if(Route::currentRouteName() === 'admin.agency.create') @else {{ old('paese', $agency->paese) == $paeseK ? 'selected' : '' }} @endif>{{$paese}}</option>
                @endforeach
            </select>
            @error('paese')    
                <div class="text-danger">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
                </div>
            @enderror
        </div>
    </div>
    <section class="dati_aziendali mb-3 @if (Auth::user()->id_admin !== 0) d-none @endif">
        <h3>
            Dati Legali e Fatturazione Elettronica
        </h3>
        
        <div class="mb-3 d-flex">
            <div class="w-50">
                <label for="agency_ragione_sociale" class="my_form_label_input">Ragione Sociale <span style="color: red">*</span></label>
                <input @error('ragione_sociale') style="border: 1px solid red" @enderror class="my_form_input_rSociale" @if (Auth::user()->id_admin === 0) type="text" @else type="hidden" @endif id="agency_ragione_sociale" name="ragione_sociale" value="{{old('ragione_sociale', $agency->ragione_sociale)}}">
                @error('ragione_sociale')    
                    <div class="text-danger">
                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
                    </div>
                @enderror
            </div>
            <div class="w-50">
                <label for="agency_tipo" class="my_form_label_input">Tipologia <span style="color: red">*</span></label>
                {{-- <input class="my_form_input_tipo" type="text" id="agency_tipo" name="tipo" value="{{old('tipo', $agency->tipo)}}"> --}}
                <select @error('tipo') style="border: 1px solid red" @enderror class="my_form_input_tipo" name="tipo" id="agency_tipo" onchange="handleChange()">
                    <option value="" selected>Seleziona Tipo</option>
                    @foreach ($tipologiaAziendale as $tipo)    
                    <option value="{{$tipo}}" @if(Route::currentRouteName() === 'admin.agency.create') @else {{ old('tipo', $agency->tipo) == $tipo ? 'selected' : '' }} @endif>{{$tipo}}</option>
                    @endforeach
                </select>
                @error('tipo')    
                    <div class="text-danger">
                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            
            <div class="mb-3 d-flex">
                <div class="w-50">
                    <label for="agency_p_iva" class="my_form_label_input">Partita IVA <span style="color: red">*</span></label>
                    <input @error('p_iva') style="border: 1px solid red" @enderror class="my_form_input_pIva" @if (Auth::user()->id_admin === 0) type="text" @else type="hidden" @endif id="agency_p_iva" name="p_iva" maxlength="13" value="{{old('p_iva', $agency->p_iva)}}">
                    @error('p_iva')    
                    <div class="text-danger">
                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
                    </div>
                    @enderror
                </div>
                <div class="w-50">
                <label for="agency_codice_fiscale" class="my_form_label_input">Codice Fiscale</label>
                <input @error('codice_fiscale') style="border: 1px solid red" @enderror class="my_form_input_cFiscale" @if (Auth::user()->id_admin === 0) type="text" @else type="hidden" @endif id="agency_codice_fiscale" name="codice_fiscale" maxlength="16" value="{{old('codice_fiscale', $agency->codice_fiscale)}}" disabled>
                @error('codice_fiscale')    
                    <div class="text-danger">
                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
                    </div>
                @enderror
            </div>
            <script>
                function handleChange() {
                    var select = document.getElementById("agency_tipo");
                    var codiceFiscaleInput = document.getElementById("agency_codice_fiscale");
            
                    if (select.value === "Pubblica Amministrazione" || select.value === "Azienda(SRL, SPA) o altra Sociatà for profit") {
                        codiceFiscaleInput.value = ""; 
                        codiceFiscaleInput.disabled = true; 
                    } else {
                        codiceFiscaleInput.disabled = false; 
                    }
                }
                handleChange()
            </script>
        </div>
    
        <div class="mb-3">
            <label for="agency_pec" class="my_form_label_input">Pec <span style="color: red">*</span></label>
            <input @error('pec') style="border: 1px solid red" @enderror class="my_form_input_pec" @if (Auth::user()->id_admin === 0) type="text" @else type="hidden" @endif id="agency_pec" name="pec" value="{{old('pec', $agency->pec)}}">
            @error('pec')    
                <div class="text-danger">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
                </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="agency_sdi" class="my_form_label_input">Codice SDI <span style="color: red">*</span></label>
            <input @error('sdi') style="border: 1px solid red" @enderror class="my_form_input_sdi" @if (Auth::user()->id_admin === 0) type="text" @else type="hidden" @endif id="agency_sdi" name="sdi" value="{{old('sdi', $agency->sdi)}}">
            @error('sdi')    
            <div class="text-danger">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
                </div>
            @enderror
        </div>
    </section>
    <div class="mb-3 @if (Auth::user()->id_admin !== 0) d-none @endif">
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
        <input @error('whatsapp') style="border: 1px solid red" @enderror class="my_form_input_whatsapp" type="text" id="agency_whatsapp" name="whatsapp" value="{{old('whatsapp', $agency->whatsapp)}}">
        @error('whatsapp')    
            <div class="text-danger">
                <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="agency_instagram" class="my_form_label_input">Instagram</label>
        <input @error('instagram') style="border: 1px solid red" @enderror class="my_form_input_instagram" type="text" id="agency_instagram" name="instagram" value="{{old('instagram', $agency->instagram)}}">
        @error('instagram')    
            <div class="text-danger">
                <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="agency_facebook" class="my_form_label_input">Facebook</label>
        <input @error('facebook') style="border: 1px solid red" @enderror class="my_form_input_facebook" type="text" id="agency_facebook" name="facebook" value="{{old('facebook', $agency->facebook)}}">
        @error('facebook')    
            <div class="text-danger">
                <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="agency_youtube" class="my_form_label_input">Youtube</label>
        <input @error('youtube') style="border: 1px solid red" @enderror class="my_form_input_youtube" type="text" id="agency_youtube" name="youtube" value="{{old('youtube', $agency->youtube)}}">
        @error('youtube')    
            <div class="text-danger">
                <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="agency_tiktok" class="my_form_label_input">TikTok</label>
        <input @error('tiktok') style="border: 1px solid red" @enderror class="my_form_input_tiktok" type="text" id="agency_tiktok" name="tiktok" value="{{old('tiktok', $agency->tiktok)}}">
        @error('tiktok')    
            <div class="text-danger">
                <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="agency_linkedin" class="my_form_label_input">Linkedin</label>
        <input @error('linkedin') style="border: 1px solid red" @enderror class="my_form_input_linkedin" type="text" id="agency_linkedin" name="linkedin" value="{{old('linkedin', $agency->linkedin)}}">
        @error('linkedin')    
            <div class="text-danger">
                <i class="fa-solid fa-circle-exclamation pe-1"></i>{{$message}}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <button style="height: 40px; width: 40px; right: 3px; top: 107px;" type="submit" class="btn btn-success position-fixed">
            <i class="fa-solid fa-floppy-disk"></i>
        </button>
    </div>
</form>