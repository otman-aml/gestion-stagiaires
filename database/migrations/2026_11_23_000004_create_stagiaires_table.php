<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stagiaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('etablissement');
            $table->string('filiere');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->text('sujet_stage');
            $table->foreignId('encadrant_id')->constrained('encadrants');
            $table->enum('statut', ['À venir', 'En cours', 'Terminé']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stagiaires');
    }
};
