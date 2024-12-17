<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    /**
     * Os atributos que são permitidos para atribuição em massa.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'estoque',
    ];
}
