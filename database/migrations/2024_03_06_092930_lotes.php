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
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fazenda_id')->nullable()->default(null)->constrained('fazendas');
            $table->string('pasto')->nullable()->default(null);
            $table->string('tipo_capim')->nullable()->default(null);
            $table->double('area_pasto')->nullable()->default(null);
            $table->string('categoria_produto')->nullable()->default(null);
            $table->bigInteger('quant_cabeca')->nullable()->default(null);
            $table->string('categoria_bov')->nullable()->default(null);
            $table->double('gmd')->nullable()->default(null);
            $table->double('peso_entrada')->nullable()->default(null);
            $table->date('data_entrada')->nullable()->default(null);
            $table->double('racao_diaria')->nullable()->default(null);
            $table->bigInteger('quant_dias')->nullable()->default(null);
            $table->integer('abatido')->nullable()->default(null);
            $table->date('data_abate')->nullable()->default(null);
            $table->double('peso_saida')->nullable()->default(null);
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
