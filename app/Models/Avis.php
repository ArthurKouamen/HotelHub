<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
     protected $fillable[
       "note",
       "commentaaire",
       "date",
       "id_utilisateur",
       "id_hotel"
    ];
    public function hotels(){
        return $this -> belongsTo(Hotel::class);
    }
}
