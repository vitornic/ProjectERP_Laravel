<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operacoes extends Model
{
    protected $fillable = [
        'descricao'
        , 'movimento'
    ];
}
