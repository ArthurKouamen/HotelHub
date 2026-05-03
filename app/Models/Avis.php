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
       "user_id",
       "hotel_id"
    ];
    public function hotels(){
        return $this -> belongsTo(Hotel::class);
    }
}
