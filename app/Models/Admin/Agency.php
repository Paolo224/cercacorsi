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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Courses()
    {
        return $this->hasMany(Courses::class);
    }

    public function getABooleanFromNumber($num)
    {
        return ($num) ? 'true' : 'false';
    }
}
