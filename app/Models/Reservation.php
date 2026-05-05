<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'arival_date',
        'departure_date',
        'status',
        'user_id',
        'room_id',
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
