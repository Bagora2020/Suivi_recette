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
        Schema::create('cantines', function (Blueprint $table) {
            $table->id();
            $table->string('objetrecette');
            $table->integer('numero');
            $table->string('nomLoc');
            $table->string('mois');
            $table->integer('montant');
            $table->string('nomAgent');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cantines');
    }
};
