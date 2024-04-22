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
        Schema::create('presences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('directeur_id')->constrained(); // ID du directeur (foreign key)
            $table->foreignId('reunion_id')->constrained(); // ID de réunion (foreign key)
            $table->dateTime('date_heure_presence'); // Date et heure de présence
            $table->string('signature')->nullable(); // Signature
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presences');
    }
};
