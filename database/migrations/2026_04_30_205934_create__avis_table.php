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
        Schema::create('Avis', function (Blueprint $table) {
            $table->id('id_avis');
            $table->integer('note');
            $table->text('commemtaire')->nullable();
            $table->date('date');
            $table->foreignId('id_utilisateur')->contained('utilisateurs')->onDelete('cascade');
            $table->foreignId('id_hotel')->contained('hotels')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_avis');
    }
};
