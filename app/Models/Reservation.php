<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'date_arrivee',
        'date_depart',
        'statut',
        'user_id',
        'chambre_id',
    ];

    public function chambre()
    {
        return $this->belongsTo(Chambre::class, 'chambre_id', 'id');
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'user_id', 'id');
    }

}
