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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('id');
            $table->date('date_arrivee');
            $table->date('date_depart');
            $table->enum('statut', ['confirmée', 'annulée'])->default('confirmée');
            $table->foreignId('utilisateurs_id')->constrained('users', 'id')->onDelete('cascade');
            $table->foreignId('chambres_id')->constrained('chambres', 'id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
