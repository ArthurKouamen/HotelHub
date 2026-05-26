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
            $table->id('id');
            $table->string('number');
            $table->enum('type',['simple', 'double','suite']);
            $table->decimal('price', 10, 2);
            $table -> text('discription');
            $table -> integer('capacity');
            $table->enum('status',['disponible','occupee'])->default('disponible');
            $table->foreignId('hotels_id')->constained('hotels')->onDelete('cascade');
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
