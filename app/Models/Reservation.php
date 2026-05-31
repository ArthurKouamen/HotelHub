<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chambre;
use App\Models\Utilisateur;

class Reservation extends Model
{
    protected $fillable = [
        'arrival_date',
        'departure_date',
        'status',
        'users_id',
        'room_id',
        'chambre_id',
    ];

    public function chambres()
    {
        return $this->belongsTo(Chambre::class, 'chambres_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(Utilisateur::class, 'users_id', 'id');
    }

}
