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
        Schema::create('trato_diario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fazenda_id')->nullable()->default(null)->constrained('fazendas');
            $table->foreignId('user_id')->nullable()->default(null)->constrained('fazendas');
            $table->foreignId('lote_id')->nullable()->default(null)->constrained('fazendas');
            $table->double('total_trato')->nullable()->default(null);
            $table->string('categoria_produto')->nullable()->default(null);
            $table->date('data')->nullable()->default(null);
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
        Schema::dropIfExists('trato_diario');
    }
};
