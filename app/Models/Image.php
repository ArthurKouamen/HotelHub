<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chambre;
use App\Models\Hotel;
class Image extends Model
{
    protected $fillable = ([
       "url",
       "hotels_id",
       "chambres_id"
    ]);
   public function chambres (){
    return $this -> belongsTo(Chambre::class, 'chambres_id');
   }
   public function hotels (){
    return $this -> belongsTo(Hotel::class, 'hotels_id');
   }
}
