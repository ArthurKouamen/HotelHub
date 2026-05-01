<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
     protected $fillable[
       "nom",
       "adresse",
       "ville",
       "description"
    ];
    public function chambres (){
        return $this -> hasMany(Chambre::class);
    }
    public function images(){
        return $this -> hasMany(Image::class);
    }
    public function avis (){
        return $this -> hasMany(Avis::class);
    }
}
