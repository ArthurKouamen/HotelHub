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
            $table->id('id');
            $table->date('arrival_date');
            $table->date('departure_date');
            $table->enum('status' ,['confirmée','annulée']);
            $table -> string('name');
            $table -> text('description');
            $table -> string('address');
            $table -> integer('phone');
            $table -> string('email');
            $table-> integer('pixmax');
            $table -> integer('numberetoile');
            $table -> string('city');
            $table->foreignId('users_id')->constrained('users', 'id')->onDelete('cascade');
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
