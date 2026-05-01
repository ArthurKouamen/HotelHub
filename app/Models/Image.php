<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable[
       "url",
       "id_hotel",
       "id_chambre"
    ];
   public function chambres (){
    return $this -> belongsTo(Chambre::class);
   }
   public function hotels (){
    return $this -> belongsTo(Hotel::class);
   }
}
