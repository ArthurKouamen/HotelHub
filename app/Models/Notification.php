<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
     protected $fillable[
       "message",
       "date",
       "user_id",
       "statut"
    ];
    public function utilisateur (){
        return $this ->belongsTo(Utilisateur::class);
    }
}
