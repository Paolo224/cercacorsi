<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssegnazioneAziendeAiGestori extends Model
{
    use HasFactory;

    protected $table = 'assegnazione_aziende_ai_gestori';

    protected $fillable = [
        'id_admin', 'id_gestore', 'id_azienda',
        // Altri campi se presenti...
    ];
}
