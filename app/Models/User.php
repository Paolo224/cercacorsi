<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Http\Controllers\Admin\AssegnazioneController;
use App\Models\Admin\Agency;
use App\Models\Admin\Ticket;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'cognome',
        'email',
        'password',
        'saldo',
        'id_admin',
        'super_admin_role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function Agencies()
    {
        return $this->hasMany(Agency::class);
    }

    public function assegnazioni()
    {
        return $this->hasMany(AssegnazioneController::class, 'id_gestore', 'id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
