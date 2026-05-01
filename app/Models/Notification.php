<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
     protected $fillable[
       "message",
       "date",
       "id_utilisateur",
       "statut"
    ];
    public function utilisateur (){
        return $this ->belongsTo(Utilisateur::class);
    }
}
