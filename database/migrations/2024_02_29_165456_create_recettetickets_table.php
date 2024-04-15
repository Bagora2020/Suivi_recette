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
        Schema::create('recettetickets', function (Blueprint $table) {
            $table->id();
            $table->integer('quantite');
            $table->bigInteger('montant');
            $table->date('date');
            $table->string('partieVersante');
            $table->foreignId('typeticket_nomticket')
                    ->constrained('typetickets')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recettetickets');
    }
};
