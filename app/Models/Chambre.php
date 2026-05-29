<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;
use App\Models\Reservation;
use App\Models\Image;

class Chambre extends Model
{
    protected $fillable=[
        "type",
        "price",
        "status",
        "hotel_id",
    ];
   public function hotels(){
    return $this -> belongsTo(Hotel::class, 'hotels_id');
   }
   public function reservations(){
    return $this -> hasOne(Reservation::class);
   }
   public function images(){
    return $this -> hasMany(Image::class);
   }
}
