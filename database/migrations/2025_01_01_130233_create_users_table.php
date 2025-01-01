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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Le nom de l'utilisateur
            $table->string('email')->unique();  // L'email, qui doit être unique
            $table->string('password');  // Le mot de passe
            $table->boolean('is_active')->default(true);  // Indicateur si l'utilisateur est actif
            $table->timestamps();  // Les timestamps pour created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
