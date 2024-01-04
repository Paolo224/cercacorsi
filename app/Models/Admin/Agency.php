<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nome',
        'slug',
        'logo',
        'immagine_copertina',
        'video_presentazione',
        'descrizione',
        'motto',
        'altre_informazioni',
        'email',
        'telefono1',
        'telefono2',
        'indirizzo',
        'citta',
        'provincia',
        'cap',
        'paese',
        'ragione_sociale',
        'p_iva',
        'codice_fiscale',
        'sdi',
        'pec',
        'visibile',
        'whatsapp',
        'facebook',
        'linkedin',
        'tiktok',
        'youtube',
        'instagram',
        'tipo'
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Courses()
    {
        return $this->hasMany(Course::class);
    }

    public function getABooleanFromNumber($num)
    {
        return ($num) ? '1' : '0';
    }

    public function paesiMondiali()
    {

        $countries = [
            'Italia' => 'Italia',
            'Albania' => 'Albania',
            'Austria' => 'Austria',
            'Cina' => 'Cina',
            'Croazia' => 'Croazia',
            'Francia' => 'Francia',
            'Germania' => 'Germania',
            'Grecia' => 'Grecia',
            'Inghilterra' => 'Ingilterra',
            'Portogallo' => 'Portogallo',
            'San Marino' => 'San Marino',
            'Slovenia' => 'Slovenia',
            'Spagna' => 'Spagna',
            'Svizzera' => 'Svizzera',
            'USA' => 'USA',
        ];

        return $countries;
    }

    public function provinceItaliane()
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

        return $provinceItaliane;
    }

    public function tipologiaAziendale()
    {

        $tipologiaAziendale = [
            'Azienda(SRL, SPA) o altra Sociatà for profit',
            'Individuale(Attività, P.IVA o Ditta Individuale)',
            'Non Profit(Associazione, Onlus e simili)',
            'Pubblica Amministrazione',
        ];

        return $tipologiaAziendale;
    }
}
