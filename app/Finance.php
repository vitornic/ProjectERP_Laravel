<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    protected $fillable = ['cliente', 'fatura', 'codCliente', 'descricao', 'valor', 'cdreceita', 'operacao', 'datacompetencia'];
}
