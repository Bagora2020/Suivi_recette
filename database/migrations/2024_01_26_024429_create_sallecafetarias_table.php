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
        Schema::create('sallecafetarias', function (Blueprint $table) {
            $table->id();
            $table->string('nomlocataire');
            $table->string('contactresponsable');
            $table->string('statut');
            $table->string('natureActivite');
            $table->string('motif');
            $table->date('date');
            $table->time('debutAct');
            $table->time('finAct');
            $table->integer('montant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sallecafetarias');
    }
};
