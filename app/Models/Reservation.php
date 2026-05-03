<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable[
        "date_depart",
        "date_arrive",
        "statut",
        "id_chambre",
        "id_utilisateur"
    ];
    public function chambres() {
        return $this -> belongsTo(Chambre::class);
    }
    public function utilisateurs(){
        return $this -> belongsTo(Utilisateur::class);
    }

}
