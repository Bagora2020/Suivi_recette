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
        Schema::create('credits', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('prevision');
            $table->bigInteger('budget');

            
            
            $table->foreignId('annee_actifs_id')
            ->constrained('annee_actifs')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            $table->foreignId('comptes_id')
            ->constrained('comptes')
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
        Schema::dropIfExists('credits');
    }
};
