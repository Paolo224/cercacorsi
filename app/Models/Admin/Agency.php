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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
