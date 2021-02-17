<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remise extends Model
{
    use HasFactory;
    protected $fillable = ['taux','description','user_id'];
    public $timestamps = false;
    protected $table ='remise';
    public function clients()
    {
       return $this->hasMany(Client::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
