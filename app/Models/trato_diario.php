<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trato_diario extends Model
{
    use HasFactory;
    protected $table = 'trato_diario';
    protected $fillable = [
        'id',
        'fazenda_id',
        'user_id',
        'lote_id',
        'total_trato',
        'categoria_produto',
        'data',
        'ativo',
        'delete',
    ];
    public function fazenda()
    {
        return $this->hasOne(fazenda::class, 'id', 'fazenda_id');
    }
    public function lote()
    {
        return $this->hasOne(Lotes::class, 'id', 'lote_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
