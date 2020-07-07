<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    protected $fillable = [
        'CNPJ'
        , 'razaosocial'
        , 'fantasia'
        , 'telefone'
        , 'celular'
        , 'email'
        , 'CEP'
        , 'UF'
        , 'cidade'
        , 'endereco'
        , 'numero'
        , 'complemento'
        , 'bairro'
        , 'inscricaoestadual'
        , 'CNAE'
    ];
}
