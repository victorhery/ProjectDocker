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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('Nom_elev');
            $table->string('Prenom_eleve', NULL);
            $table->string('Cycle');
            $table->string('IM', 6);
            $table->string('Annee_scolaire', 10);
            $table->date('Date_naissance');
            $table->string('Lieu_naissances', 100);
            $table->string('Nom_parents', 100, NULL);

            $table->string('profession_parents', 100, NULL);
            $table->string('Nom_mere', 100, NULL);
            $table->string('profession_mere', 100, NULL);
            $table->string('Nom_tuteur', 100, NULL);
            $table->string('profession_tuteurs', 100, NULL);
            $table->string('Etat_actuel', 100, NULL);
            $table->string('Adresse_parents', 100);
            $table->string('Etat_class', 3, NULL);
            $table->string("code_Nom_ecol",20);

            $table->double('Mal_MJ1', 6, NULL);
            $table->double('Frs_MJ1', 6,NULL);
            $table->double('Ang_MJ1', 6,NULL);
            $table->double('HG_MJ1', 6,NULL);
            $table->double('EC_MJ1', 6,NULL);
            $table->double('Mths_MJ1', 6,NULL);
            $table->double('PC_MJ1', 6,NULL);
            $table->double('SVT_MJ1', 6,NULL);
            $table->double('EPS_MJ1', 6,NULL);

            
            $table->double('Mal_EX1', 6, NULL);
            $table->double('Frs_EX1', 6,NULL);
            $table->double('Ang_EX1', 6,NULL);
            $table->double('HG_EX1', 6,NULL);
            $table->double('EC_EX1', 6,NULL);
            $table->double('Mths_EX1', 6,NULL);
            $table->double('PC_EX1', 6,NULL);
            $table->double('SVT_EX1', 6,NULL);
            $table->double('EPS_EX1', 6,NULL);

            $table->double('Mal_MG1', 6,NULL);
            $table->double('Frs_MG1', 6,NULL);
            $table->double('Ang_MG1', 6,NULL);
            $table->double('HG_MG1', 6,NULL);
            $table->double('EC_MG1', 6,NULL);
            $table->double('Mths_MG1', 6,NULL);
            $table->double('PC_MG1', 6,NULL);
            $table->double('SVT_MG1', 6,NULL);
            $table->double('EPS_MG1', 6,NULL);

            $table->double('Mal_MJ2', 6,NULL);
            $table->double('Frs_MJ2', 6,NULL);
            $table->double('Ang_MJ2', 6,NULL);
            $table->double('HG_MJ2', 6,NULL);
            $table->double('EC_MJ2', 6,NULL);
            $table->double('Mths_MJ2', 6,NULL);
            $table->double('PC_MJ2', 6,NULL);
            $table->double('SVT_MJ2', 6,NULL);
            $table->double('EPS_MJ2', 6,NULL);

            $table->double('Mal_EX2', 6,NULL);
            $table->double('Frs_EX2', 6,NULL);
            $table->double('Ang_EX2', 6,NULL);
            $table->double('HG_EX2', 6,NULL);
            $table->double('EC_EX2', 6,NULL);
            $table->double('Mths_EX2', 6,NULL);
            $table->double('PC_EX2', 6,NULL);
            $table->double('SVT_EX2', 6,NULL);
            $table->double('EPS_EX2', 6,NULL);

            $table->double('Mal_MG2', 6,NULL);
            $table->double('Frs_MG2', 6);
            $table->double('Ang_MG2', 6,NULL);
            $table->double('HG_MG2', 6,NULL);
            $table->double('EC_MG2', 6,NULL);
            $table->double('Mths_MG2', 6,NULL);
            $table->double('PC_MG2', 6,NULL);
            $table->double('SVT_MG2', 6,NULL);
            $table->double('EPS_MG2', 6,NULL);

            $table->double('Mal_MJ3', 6,NULL);
            $table->double('Frs_MJ3', 6,NULL);
            $table->double('Ang_MJ3', 6,NULL);
            $table->double('HG_MJ3', 6,NULL);
            $table->double('EC_MJ3', 6,NULL);
            $table->double('Mths_MJ3', 6,NULL);
            $table->double('PC_MJ3', 6,NULL);
            $table->double('SVT_MJ3', 6,NULL);
            $table->double('EPS_MJ3', 6,NULL);

            $table->double('Mal_EX3', 6,NULL);
            $table->double('Frs_EX3', 6,NULL);
            $table->double('Ang_EX3', 6,NULL);
            $table->double('HG_EX3', 6,NULL);
            $table->double('EC_EX3', 6,NULL);
            $table->double('Mths_EX3', 6,NULL);
            $table->double('PC_EX3', 6,NULL);
            $table->double('SVT_EX3', 6,NULL);
            $table->double('EPS_EX3', 6,NULL);

            $table->double('Mal_MG3', 6,NULL);
            $table->double('Frs_MG3', 6,NULL);
            $table->double('Ang_MG3', 6,NULL);
            $table->double('HG_MG3', 6,NULL);
            $table->double('EC_MG3', 6,NULL);
            $table->double('Mths_MG3', 6,NULL);
            $table->double('PC_MG3', 6,NULL);
            $table->double('SVT_MG3', 6,NULL);
            $table->double('EPS_MG3', 6,NULL);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
