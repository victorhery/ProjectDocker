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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('matiere');
            $table->string('Num_bulletin');
            $table->string('Annee_scolaire');
            $table->float('Note');
            $table->string('IM');
            $table->string('id_elev');
            $table->string('Nom_elev');
            $table->string('Prenom_eleve');
            $table->string('Cycle');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
