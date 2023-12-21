<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class AgencyController extends Controller
{

    protected $validationRules = [
        'nome' => ['required', 'unique:agencies'],
        'logo' => 'image|max:2048|mimes:jpg,png,gif',
        'immagine_copertina' => 'image|max:2048|mimes:jpg,png,gif',
        'video_presentazione' => 'url:http,https|nullable',
        'descrizione' => 'required',
        'motto' => '',
        'altre_informazioni' => '',
        'telefono1' => 'required|max:10',
        'telefono2' => '|max:10',
        'email' => 'required|',
        'indirizzo' => 'required',
        'citta' => 'required',
        'provincia' => 'required|max:2',
        'paese' => 'required',
        'cap' => 'required|max:5',
        'ragione_sociale' => 'required',
        'p_iva' => 'required|max:13',
        'codice_fiscale' => 'required|max:16',
        'sdi' => 'required|max:7',
        'pec' => 'required',
        'whatsapp' => ['regex:/\bwhatsapp\b/', 'nullable'],
        'facebook' => ['regex:/\bfacebook\b/', 'nullable'],
        'linkedin' => ['regex:/\blinkedin\b/', 'nullable'],
        'tiktok' => ['regex:/\btiktok\b/', 'nullable'],
        'youtube' => ['regex:/\byoutube\b/', 'nullable'],
        'instagram' => ['regex:/\binstagram\b/', 'nullable'],
        'tipo' => 'required',
    ];

    protected $customMessages = [];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $agencies = $user->agencies;
        return view('admin.agency.index', compact('agencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Agency $agency)
    {

        $provinceItaliane = [
            'AG' => 'Agrigento',
            'AL' => 'Alessandria',
            'AN' => 'Ancona',
            'AO' => 'Aosta',
            'AR' => 'Arezzo',
            'AP' => 'Ascoli Piceno',
            'AT' => 'Asti',
            'AV' => 'Avellino',
            'BA' => 'Bari',
            'BT' => 'Barletta-Andria-Trani',
            'BL' => 'Belluno',
            'BN' => 'Benevento',
            'BG' => 'Bergamo',
            'BI' => 'Biella',
            'BO' => 'Bologna',
            'BZ' => 'Bolzano',
            'BS' => 'Brescia',
            'BR' => 'Brindisi',
            'CA' => 'Cagliari',
            'CL' => 'Caltanissetta',
            'CB' => 'Campobasso',
            'CI' => 'Carbonia-Iglesias',
            'CE' => 'Caserta',
            'CT' => 'Catania',
            'CZ' => 'Catanzaro',
            'CH' => 'Chieti',
            'CO' => 'Como',
            'CS' => 'Cosenza',
            'CR' => 'Cremona',
            'KR' => 'Crotone',
            'CN' => 'Cuneo',
            'EN' => 'Enna',
            'FM' => 'Fermo',
            'FE' => 'Ferrara',
            'FI' => 'Firenze',
            'FG' => 'Foggia',
            'FC' => 'Forlì-Cesena',
            'FR' => 'Frosinone',
            'GE' => 'Genova',
            'GO' => 'Gorizia',
            'GR' => 'Grosseto',
            'IM' => 'Imperia',
            'IS' => 'Isernia',
            'SP' => 'La Spezia',
            'AQ' => 'L\'Aquila',
            'LT' => 'Latina',
            'LE' => 'Lecce',
            'LC' => 'Lecco',
            'LI' => 'Livorno',
            'LO' => 'Lodi',
            'LU' => 'Lucca',
            'MC' => 'Macerata',
            'MN' => 'Mantova',
            'MS' => 'Massa-Carrara',
            'MT' => 'Matera',
            'ME' => 'Messina',
            'MI' => 'Milano',
            'MO' => 'Modena',
            'MB' => 'Monza e della Brianza',
            'NA' => 'Napoli',
            'NO' => 'Novara',
            'NU' => 'Nuoro',
            'OG' => 'Ogliastra',
            'OT' => 'Olbia-Tempio',
            'OR' => 'Oristano',
            'PD' => 'Padova',
            'PA' => 'Palermo',
            'PR' => 'Parma',
            'PV' => 'Pavia',
            'PG' => 'Perugia',
            'PU' => 'Pesaro e Urbino',
            'PE' => 'Pescara',
            'PC' => 'Piacenza',
            'PI' => 'Pisa',
            'PT' => 'Pistoia',
            'PN' => 'Pordenone',
            'PZ' => 'Potenza',
            'PO' => 'Prato',
            'RG' => 'Ragusa',
            'RA' => 'Ravenna',
            'RC' => 'Reggio Calabria',
            'RE' => 'Reggio Emilia',
            'RI' => 'Rieti',
            'RN' => 'Rimini',
            'RM' => 'Roma',
            'RO' => 'Rovigo',
            'SA' => 'Salerno',
            'VS' => 'Medio Campidano',
            'SS' => 'Sassari',
            'SV' => 'Savona',
            'SI' => 'Siena',
            'SR' => 'Siracusa',
            'SO' => 'Sondrio',
            'TA' => 'Taranto',
            'TE' => 'Teramo',
            'TR' => 'Terni',
            'TO' => 'Torino',
            'OG' => 'Ogliastra',
            'TP' => 'Trapani',
            'TN' => 'Trento',
            'TV' => 'Treviso',
            'TS' => 'Trieste',
            'UD' => 'Udine',
            'VA' => 'Varese',
            'VE' => 'Venezia',
            'VB' => 'Verbano-Cusio-Ossola',
            'VC' => 'Vercelli',
            'VR' => 'Verona',
            'VV' => 'Vibo Valentia',
            'VI' => 'Vicenza',
            'VT' => 'Viterbo',
        ];

        return view('admin.agency.create', compact('agency', 'provinceItaliane'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validationRules);
        if ($request->hasFile('logo')) {
            $data['logo'] = Storage::put('uploads/img', $data['logo']);
        }
        if ($request->hasFile('immagine_copertina')) {
            $data['immagine_copertina'] = Storage::put('uploads/img', $data['immagine_copertina']);
        }
        $data['slug'] = Str::slug($data['nome']);
        $data['user_id'] = Auth::user()->id;
        $newAgency = new Agency();
        $newAgency->fill($data);
        $newAgency->save();

        return redirect()->route('admin.le-mie-aziende.show', $newAgency->slug)->with('message', "$newAgency->nome AGGIUNTA CON SUCCESSO!!!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Agency $agency)
    {
        return view('admin.agency.show', compact('agency'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agency $agency)
    {
        $provinceItaliane = [
            'AG' => 'Agrigento',
            'AL' => 'Alessandria',
            'AN' => 'Ancona',
            'AO' => 'Aosta',
            'AR' => 'Arezzo',
            'AP' => 'Ascoli Piceno',
            'AT' => 'Asti',
            'AV' => 'Avellino',
            'BA' => 'Bari',
            'BT' => 'Barletta-Andria-Trani',
            'BL' => 'Belluno',
            'BN' => 'Benevento',
            'BG' => 'Bergamo',
            'BI' => 'Biella',
            'BO' => 'Bologna',
            'BZ' => 'Bolzano',
            'BS' => 'Brescia',
            'BR' => 'Brindisi',
            'CA' => 'Cagliari',
            'CL' => 'Caltanissetta',
            'CB' => 'Campobasso',
            'CI' => 'Carbonia-Iglesias',
            'CE' => 'Caserta',
            'CT' => 'Catania',
            'CZ' => 'Catanzaro',
            'CH' => 'Chieti',
            'CO' => 'Como',
            'CS' => 'Cosenza',
            'CR' => 'Cremona',
            'KR' => 'Crotone',
            'CN' => 'Cuneo',
            'EN' => 'Enna',
            'FM' => 'Fermo',
            'FE' => 'Ferrara',
            'FI' => 'Firenze',
            'FG' => 'Foggia',
            'FC' => 'Forlì-Cesena',
            'FR' => 'Frosinone',
            'GE' => 'Genova',
            'GO' => 'Gorizia',
            'GR' => 'Grosseto',
            'IM' => 'Imperia',
            'IS' => 'Isernia',
            'SP' => 'La Spezia',
            'AQ' => 'L\'Aquila',
            'LT' => 'Latina',
            'LE' => 'Lecce',
            'LC' => 'Lecco',
            'LI' => 'Livorno',
            'LO' => 'Lodi',
            'LU' => 'Lucca',
            'MC' => 'Macerata',
            'MN' => 'Mantova',
            'MS' => 'Massa-Carrara',
            'MT' => 'Matera',
            'ME' => 'Messina',
            'MI' => 'Milano',
            'MO' => 'Modena',
            'MB' => 'Monza e della Brianza',
            'NA' => 'Napoli',
            'NO' => 'Novara',
            'NU' => 'Nuoro',
            'OG' => 'Ogliastra',
            'OT' => 'Olbia-Tempio',
            'OR' => 'Oristano',
            'PD' => 'Padova',
            'PA' => 'Palermo',
            'PR' => 'Parma',
            'PV' => 'Pavia',
            'PG' => 'Perugia',
            'PU' => 'Pesaro e Urbino',
            'PE' => 'Pescara',
            'PC' => 'Piacenza',
            'PI' => 'Pisa',
            'PT' => 'Pistoia',
            'PN' => 'Pordenone',
            'PZ' => 'Potenza',
            'PO' => 'Prato',
            'RG' => 'Ragusa',
            'RA' => 'Ravenna',
            'RC' => 'Reggio Calabria',
            'RE' => 'Reggio Emilia',
            'RI' => 'Rieti',
            'RN' => 'Rimini',
            'RM' => 'Roma',
            'RO' => 'Rovigo',
            'SA' => 'Salerno',
            'VS' => 'Medio Campidano',
            'SS' => 'Sassari',
            'SV' => 'Savona',
            'SI' => 'Siena',
            'SR' => 'Siracusa',
            'SO' => 'Sondrio',
            'TA' => 'Taranto',
            'TE' => 'Teramo',
            'TR' => 'Terni',
            'TO' => 'Torino',
            'OG' => 'Ogliastra',
            'TP' => 'Trapani',
            'TN' => 'Trento',
            'TV' => 'Treviso',
            'TS' => 'Trieste',
            'UD' => 'Udine',
            'VA' => 'Varese',
            'VE' => 'Venezia',
            'VB' => 'Verbano-Cusio-Ossola',
            'VC' => 'Vercelli',
            'VR' => 'Verona',
            'VV' => 'Vibo Valentia',
            'VI' => 'Vicenza',
            'VT' => 'Viterbo',
        ];

        return view('admin.agency.edit', compact('agency', 'provinceItaliane'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agency $agency)
    {
        $data = $request->validate([
            'nome' => ['required', Rule::unique('agencies')->ignore($agency->id)],
            'logo' => 'image|max:2048|mimes:jpg,png,gif',
            'immagine_copertina' => 'image|max:2048|mimes:jpg,png,gif',
            'video_presentazione' => 'url:http,https|nullable',
            'descrizione' => 'required',
            'motto' => '',
            'altre_informazioni' => '',
            'telefono1' => 'required|max:10',
            'telefono2' => '|max:10',
            'email' => 'required|',
            'indirizzo' => 'required',
            'citta' => 'required',
            'provincia' => 'required|max:2',
            'paese' => 'required',
            'cap' => 'required|max:5',
            'ragione_sociale' => 'required',
            'p_iva' => 'required|max:13',
            'codice_fiscale' => 'required|max:16',
            'sdi' => 'required|max:7',
            'pec' => 'required',
            'visibile' => 'required',
            'whatsapp' => ['regex:/\bwhatsapp\b/', 'nullable'],
            'facebook' => ['regex:/\bfacebook\b/', 'nullable'],
            'linkedin' => ['regex:/\blinkedin\b/', 'nullable'],
            'tiktok' => ['regex:/\btiktok\b/', 'nullable'],
            'youtube' => ['regex:/\byoutube\b/', 'nullable'],
            'instagram' => ['regex:/\binstagram\b/', 'nullable'],
            'tipo' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            if ($agency->logo !== 'immagine_placeholder.jpg') {
                Storage::delete($agency->logo);
            }
            $data['logo'] = Storage::put('uploads/img', $data['logo']);
        }
        if ($request->hasFile('immagine_copertina')) {
            if ($agency->immagine_copertina !== 'immagine_placeholder_copertina.png') {
                Storage::delete($agency->immagine_copertina);
            }
            $data['immagine_copertina'] = Storage::put('uploads/img', $data['immagine_copertina']);
        }

        $agency->update($data);
        return redirect()->route('admin.le-mie-aziende.show', compact('agency'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function enableToggle(Request $request, Agency $agency)
    {
        $agency->visibile = !$agency->visibile;
        $agency->save();

        $message = ($agency->visibile) ? $agency->nome . " è visibile" : $agency->nome . " non è visibile";
        return redirect()->route('admin.le-mie-aziende.index')->with('alert-type', 'success')->with('alert-message', "<b>$message</b>");
    }
}
