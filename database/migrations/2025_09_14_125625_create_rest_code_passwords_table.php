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
        Schema::create('rest_code_passwords', function (Blueprint $table) {
            $table->id();
            $table->string('code'); // stock le code de verification envoyé par email
            $table->string('email')->unique(); //savoir a quel email envoyer le code
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rest_code_passwords');
    }
};
