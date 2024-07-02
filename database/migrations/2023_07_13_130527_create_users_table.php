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
            $table->string("divisins",30);
            $table->string("Zap");
            $table->string("Nom_ecol");
            $table->string('name');
            $table->string('password');
            $table->string("DRN");
            $table->string("code_DRN",6);
            $table->string("Cisco");
            $table->string("code_Cisco",6);
            // $table->string("code_Zap",6);
            $table->string("code_Nom_ecol",20);
            $table->string("commune");
            $table->string("code_commune",10);
            $table->string("fokontany");
            $table->string("code_fokontany",10);
            $table->string("quartier");
            $table->timestamps();
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
