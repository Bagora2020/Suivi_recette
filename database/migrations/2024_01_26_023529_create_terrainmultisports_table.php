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
        Schema::create('terrainmultisports', function (Blueprint $table) {
            $table->id();
            $table->string('nomLocataire');
            $table->string('contact');
            $table->string('statut');
            $table->date('date');
            $table->time('debutmatch');
            $table->time('finmatch');
            $table->integer('montant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terrainmultisports');
    }
};
