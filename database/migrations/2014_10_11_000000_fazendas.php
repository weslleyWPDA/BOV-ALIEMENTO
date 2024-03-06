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
        Schema::create('fazendas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('produtor')->nullable()->default(null);
            $table->string('inscricao')->nullable()->default(null);
            $table->string('local')->nullable()->default(null);
            $table->integer('ativo')->nullable()->default(null);
            $table->integer('delete')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fazendas');
    }
};
