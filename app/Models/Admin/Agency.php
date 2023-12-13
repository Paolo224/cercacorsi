<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = [
        'immagine_copertina',
        'logo',
        'nome',
        'slug',
        'descrizione',
        'email',
        'telefono',
        'indirizzo',
        'cap',
        'citta',
        'paese',
        'ragione_sociale',
        'p_iva',
        'tipo',
        'pec_sdi'
    ];

    public function isUrl($x)
    {
        return str_starts_with($this->$x, 'http');
    }
}
