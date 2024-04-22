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
        Schema::create('directeurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // Nom
            $table->string('prenom'); // Prénom
            $table->foreignId('ecole_id')->constrained(); // ID École (foreign key)
            $table->string('telephone'); // Numéro de téléphone
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directeurs');
    }
};
