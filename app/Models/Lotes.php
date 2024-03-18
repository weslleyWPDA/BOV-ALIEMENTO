<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lotes extends Model
{
    use HasFactory;
    protected $table = 'lotes';
    protected $fillable = [
        'id',
        'fazenda_id',
        'pasto',
        'tipo_capim',
        'area_pasto',
        'categoria_produto',
        'quant_cabeca',
        'categoria_bov',
        'gmd',
        'peso_entrada',
        'data_entrada',
        'racao_diaria',
        'quant_dias',
        'abatido',
        'data_abate',
        'peso_saida',
        'delete',
    ];
    public function fazenda()
    {
        return $this->hasOne(fazenda::class, 'id', 'fazenda_id');
    }
}
