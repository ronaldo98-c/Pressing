<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redevance extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'redevance';
    protected $fillable = ['id','client_id','dateJour','montant'];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
