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
        Schema::create('chambres', function (Blueprint $table) {
            $table->id('id_chambre');
            $table->string('numero');
            $table->enum('type',['simple', 'double','suite']);
            $table->enum('statut' ,['confirmee','annulee']);
            $table->decimal('prix', 10, 2);
            $table->enum('statut',['disponible','occupee'])->default('disponible');
            $table->foreignId('id_hotel')->constained('hotels')->onDelete('cascade');
            $table->timestamps(); 
        }); //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
