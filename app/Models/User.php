<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'dateEmbauche',
        'age',
        'sexe',
        'telephone',
        'email',
        'password',
        'role',
        'last_view',
        'pressing_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function etat()
    {
       return $this->belongsToMany(Etat::class,'users_etat');
    }
    public function client()
    {
        return $this->hasMany(Client::class);
    }
    public function entree()
    {
        return $this->hasMany(Entree::class);
    }
    public function pressing()
    {
        return $this->belongsTo(Pressing::class);
    }
    public function remise()
    {
        return $this->hasMany(Remise::class);
    }
}
