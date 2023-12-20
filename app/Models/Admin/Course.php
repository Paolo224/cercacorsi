<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'agency_id',
        'categoria',
        'titolo',
        'slug',
        'sottotitolo',
        'immagine',
        'descrizione',
        'durata',
        'video_corso',
        'attestato',
        'descrizione_attestato',
        'prezzo',
        'competenze_partenza',
        'programma',
        'obiettivi',
        'visibile',
        'in_aula',
        'on_site',
        'fad',
        'lingua',
        'a_chi_si_rivolge',
        'requisiti_richiesti'
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function lingueErogazioneCorso()
    {
        $lingueErogazioneCorso = [
            'Italiano' => 'Italiano',
            'Francese' => 'Francese',
            'Inglese' => 'Inglese',
            'Spagnolo' => 'Spagnolo',
            'Tedesco' => 'Tedesco'
        ];

        return $lingueErogazioneCorso;
    }

    public function categoriaCorso()
    {
        $categoriaCorso = [
            'disegno' => 'disegno',
            'informatica' => 'informatica',
            'foto' => 'foto'
        ];

        return $categoriaCorso;
    }
}
