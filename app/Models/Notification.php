<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Utilisateur;

class Notification extends Model
{
     protected $fillable[
       "message",
       "date",
       "user_id",
       "status"
    ];
    public function utilisateur (){
        return $this ->belongsTo(Utilisateur::class);
    }
}
