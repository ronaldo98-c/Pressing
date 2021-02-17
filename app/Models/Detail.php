<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'detail';
    protected $fillable = ['quantite','marque','couleur','repassage','categorie_id','entree_id'];
    public function entree()
    {
        return $this->belongsTo(Entree::class);
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
