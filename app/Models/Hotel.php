<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chambre;
use App\Models\Image;
use App\Models\Avis;
class Hotel extends Model
{
     protected $fillable = [
       "name",
       "address",
       "city",
       "description",
       "image",
       "arrival_date",
       "departure_date",
       "status",
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
