<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'titolo',
        'allegato',
        'descrizione',
        'user_id',
        'allegato'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
