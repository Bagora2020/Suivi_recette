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
        Schema::create('greenvibes', function (Blueprint $table) {
            $table->id();
            $table->string('objetrecette');
            $table->string('mois');
            $table->bigInteger('montant');
            $table->string('nomAgent');
            $table->date('datepaiement');
            
            $table->timestamps('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('greenvibes');
    }
};
