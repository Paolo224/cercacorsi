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
        'competenze_partenza',
        'programma',
        'obiettivi',
        'lingua',
        'a_chi_si_rivolge',
        'requisiti_richiesti'
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }
}
