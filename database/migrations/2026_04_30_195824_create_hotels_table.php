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
            $table->string('address');
            $table->string('city');
            $table->text('description');
            $table->enum('status' ,['confirmée','annulée']);
            $table -> string('name');
            $table -> string('phone');
            $table -> string('email');
            $table-> integer('pixmax');
            $table-> integer('numberroom');
            $table -> integer('numberetoile');
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
