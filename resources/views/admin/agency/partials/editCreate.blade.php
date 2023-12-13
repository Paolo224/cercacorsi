
<form action="{{route($routeName, $agency)}}" method="POST" enctype="multipart/form-data">

    @csrf
    @method($method)

    <div class="mb-3">
        <label for="agency_nome" class="form-label">Nome dell'Azienda</label>
        <input class="form-control" type="text" id="agency_nome" placeholder="Esempio: MAC Formazione" name="nome" value="{{old('nome', $agency->nome)}}">
    </div>

    <div class="mb-3">
        <label for="agency_logo" class="form-label">Logo Aziendale</label>
        <input class="form-control" type="file" id="agency_logo" name="logo" value="{{old('logo', $agency->logo)}}">
    </div>

    <div class="mb-3">
        <label for="agency_immagine_copertina" class="form-label">Immagine di copertina</label>
        <input class="form-control" type="file" id="agency_immagine_copertina" name="immagine_copertina" value="{{old('immagine_copertina', $agency->immagine_copertina)}}">
    </div>

    <div class="mb-3">
        <label for="agency_descrizione" class="form-label">Descrizione Aziendale</label>
        <textarea class="form-control" id="agency_descrizione" rows="5"
        placeholder="Inserisci una descrizione" name="descrizione">
        {{old('descrizione', $agency->descrizione)}}
        </textarea>
    </div>

    <div class="mb-3">
        <label for="agency_p_iva" class="form-label">Partita IVA</label>
        <input class="form-control" type="text" id="agency_p_iva" placeholder="Esempio: IT02760840641" name="p_iva" maxlength="13" value="{{old('p_iva', $agency->p_iva)}}">
    </div>

    <div class="mb-3">
        <label for="agency_indirizzo" class="form-label">Indirizzo</label>
        <input class="form-control" type="text" id="agency_indirizzo" placeholder="Esempio: Via Toppole 3" name="indirizzo" value="{{old('indirizzo', $agency->indirizzo)}}">
    </div>

    <div class="mb-3">
        <label for="agency_citta" class="form-label">Città</label>
        <input class="form-control" type="text" id="agency_citta" placeholder="Esempio: Manocalzati (AV)" name="citta" value="{{old('citta', $agency->citta)}}">
    </div>

    <div class="mb-3">
        <label for="agency_cap" class="form-label">Codice Postale</label>
        <input class="form-control" type="text" id="agency_cap" placeholder="Esempio: 83100" name="cap"  maxlength="5" value="{{old('cap', $agency->cap)}}">
    </div>

    <div class="mb-3">
        <label for="agency_paese" class="form-label">Paese</label>
        <input class="form-control" type="text" id="agency_paese" placeholder="Esempio: Avellino" name="paese" value="{{old('paese', $agency->paese)}}">
    </div>

    <div class="mb-3">
        <label for="agency_ragione_sociale" class="form-label">Ragione Sociale</label>
        <input class="form-control" type="text" id="agency_ragione_sociale" placeholder="Esempio: MAC Formazione" name="ragione_sociale" value="{{old('ragione_sociale', $agency->ragione_sociale)}}">
    </div>

    <div class="mb-3">
        <label for="agency_tipo" class="form-label">Tipologia</label>
        <input class="form-control" type="text" id="agency_tipo" placeholder="Esempio: Azienda (SRL, SPA) o altra Società for profit" name="tipo" value="{{old('tipo', $agency->tipo)}}">
    </div>

    <div class="mb-3">
        <label for="agency_pec_sdi" class="form-label">Pec o SDI</label>
        <input class="form-control" type="text" id="agency_pec_sdi" placeholder="Esempio: example@pec.it" name="pec_sdi" value="{{old('pec_sdi', $agency->pec_sdi)}}">
    </div>

    <div class="mb-3">
        <label for="agency_telefono" class="form-label">Telefono</label>
        <input class="form-control" type="text" id="agency_telefono" placeholder="Esempio: 02 899 195 66" name="telefono" maxlength="10" value="{{old('telefono', $agency->telefono)}}">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-outline-dark">
            Salva
        </button>
    </div>
</form>