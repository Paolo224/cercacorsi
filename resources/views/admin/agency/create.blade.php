@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{route('admin.agency.store')}}" method="POST">

                @csrf
                @method('POST')

                <div class="mb-3">
                    <label for="agency_nome" class="form-label">Nome dell'Azienda</label>
                    <input class="form-control" type="text" id="agency_nome" placeholder="Esempio: MAC Formazione" name="nome">
                </div>

                <div class="mb-3">
                    <label for="agency_descrizione" class="form-label">Descrizione Aziendale</label>
                    <textarea class="form-control" id="agency_descrizione" rows="5"
                    placeholder="Esempio: Siamo un'azienda di formazione dedicata a potenziare le competenze professionali e personali. Offriamo programmi formativi su misura per individui e aziende, mirando a migliorare le prospettive di carriera e l'efficacia sul lavoro." name="descrizione"></textarea>
                </div>

                <div class="mb-3">
                    <label for="agency_p_iva" class="form-label">Partita IVA</label>
                    <input class="form-control" type="text" id="agency_p_iva" placeholder="Esempio: IT02760840641" name="p_iva" maxlength="13">
                </div>

                <div class="mb-3">
                    <label for="agency_indirizzo" class="form-label">Indirizzo</label>
                    <input class="form-control" type="text" id="agency_indirizzo" placeholder="Esempio: Via Toppole 3" name="indirizzo">
                </div>

                <div class="mb-3">
                    <label for="agency_citta" class="form-label">Città</label>
                    <input class="form-control" type="text" id="agency_citta" placeholder="Esempio: Manocalzati (AV)" name="citta">
                </div>

                <div class="mb-3">
                    <label for="agency_cap" class="form-label">Codice Postale</label>
                    <input class="form-control" type="text" id="agency_cap" placeholder="Esempio: 83100" name="cap"  maxlength="5">
                </div>

                <div class="mb-3">
                    <label for="agency_paese" class="form-label">Paese</label>
                    <input class="form-control" type="text" id="agency_paese" placeholder="Esempio: Avellino" name="paese">
                </div>

                <div class="mb-3">
                    <label for="agency_ragione_sociale" class="form-label">Ragione Sociale</label>
                    <input class="form-control" type="text" id="agency_ragione_sociale" placeholder="Esempio: MAC Formazione" name="ragione_sociale">
                </div>

                <div class="mb-3">
                    <label for="agency_tipo" class="form-label">Tipologia</label>
                    <input class="form-control" type="text" id="agency_tipo" placeholder="Esempio: Azienda (SRL, SPA) o altra Società for profit" name="tipo">
                </div>

                <div class="mb-3">
                    <label for="agency_pec_sdi" class="form-label">Pec o SDI</label>
                    <input class="form-control" type="text" id="agency_pec_sdi" placeholder="Esempio: example@pec.it" name="pec_sdi">
                </div>

                <div class="mb-3">
                    <label for="agency_telefono" class="form-label">Telefono</label>
                    <input class="form-control" type="text" id="agency_telefono" placeholder="Esempio: 02 899 195 66" name="telefono" maxlength="10">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-outline-dark">
                        Salva
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection