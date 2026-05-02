<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id('id_reservation');
            $table->date('date_arrivee');
            $table->date('date_depart');
            $table->enum('statut' ,['confirmee','annulee']);
            $table->foreignId('id_utilisateurs')->constained('utilisateurs')->onDelete('cascade');
            $table->foreignId('id_chambre')->constained('chambres')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
