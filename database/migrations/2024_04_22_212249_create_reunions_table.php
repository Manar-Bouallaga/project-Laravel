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
        Schema::create('reunions', function (Blueprint $table) {
            $table->id();
            $table->date('date_reunion'); // Date-réunion
            $table->time('heure_rendez_vous'); // Heure-rendez-vous
            $table->string('lieu_rencontre'); // Lieu de rencontre
            $table->string('code_qr_reunion')->nullable(); // Code QR de réunion (nullable)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reunions');
    }
};
