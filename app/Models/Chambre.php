<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    protected $fillable[
        "type",
        "prix",
        "statut",
        "iid_hotel"
    ];
   public function hotels(){
    return $this -> belongsTo(Hotel::class);
   }
   public function reservations(){
    return $this -> hasOne(Reservation::class);
   }
   public function images(){
    return $this -> hasMany(Image::class);
   }
}
