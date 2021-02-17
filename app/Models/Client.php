<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ='client';
    protected $fillable = ['nom','sexe','telephone','user_id','dateJour','remise_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function remise()
    {
       return $this->belongsTo(Remise::class);
    }
    public function entrees()
    {
        return $this->hasMany(Entree::class);
    }
    public function redevances()
    {
        return $this->hasMany(Redevance::class);
    }
}
