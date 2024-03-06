<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fazenda extends Model
{
    use HasFactory;
    protected $table = 'fazendas';
    protected $fillable = [
        'id',
        'name',
        'produtor',
        'inscricao',
        'local',
        'delete',
        'ativa',
    ];
}
