<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entree extends Model
{
    //use HasFactory;
    public $timestamps = false;
    public $table = 'entrees';
    protected $fillable = ['dateEntree','pu','poids','pt','type','dateSortie','totalVetement','montantVerse','montantRestant','prixRepassage','client_id','user_id'];
    public function etats()
    {
       return $this->belongsToMany(Etat::class,'entree_etat');
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function details()
    {
        return $this->hasMany(Detail::class);
    }
}
