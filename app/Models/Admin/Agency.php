<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = [
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
}
