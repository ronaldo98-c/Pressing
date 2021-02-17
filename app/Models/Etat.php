<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etat extends Model
{
    use HasFactory;
    protected $fillable = ['nom','libelle'];
    public function users()
    {
       return $this->belongsToMany(User::class,'users_etat');
    }
    public function entree()
    {
       return $this->belongsToMany(Entree::class,'entree_etat');
    }
}
