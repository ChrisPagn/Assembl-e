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
        Schema::create('versets', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('jour_index')->unique(); // 1..365
            $table->string('reference', 100);                     // ex: "Matthieu 18:20"
            $table->text('texte');                                // texte du verset
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('versets');
    }
};
