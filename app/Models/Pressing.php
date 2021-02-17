<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pressing extends Model
{
    use HasFactory;
    protected $fillable = ['nom','adresse','telephone','logo'];
    public $table = 'pressing';
    public $timestamps = false;
    public function user()
    {
       return  $this->hasMany(User::class);
    }
}
