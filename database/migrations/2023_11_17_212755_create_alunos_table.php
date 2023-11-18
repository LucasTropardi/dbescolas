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
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('sala_id')->constrained();
            $table->string('alNome');
            $table->integer('alNumero');
            $table->string('alResponsavel');
            $table->string('alTelefone');
            $table->string('alEndereco');
            $table->string('alCidade');
            $table->string('alObs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
