<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $fillable [
        "nom",
        "prenom",
        "prenom",
        "email",
        "mot_de_passe",
        "telephone"
        "role"
    ];
    public function reservations() {
        return $this -> hasMany(Reservation::class);
    }
    public function avis() {
        return $this -> hasMany(Avis::class);
    }
    public function notificaations() {
        return $this -> hasMany(Notification::class);
    }
}
