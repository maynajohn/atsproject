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
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('adresse');
            $table->date('date_naissance');
            $table->string('niveau_etude');
            $table->string('domaine');
            $table->string('experience');
            $table->string('statut_emploi');
            $table->date('disponibilite');
            $table->string('linkedin')->nullable();
            $table->string('portfolio')->nullable();
            $table->string('langue');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidats');
    }
};
