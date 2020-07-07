<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamentos extends Model
{
    protected $fillable = ['fornecedor', 'notafiscal', 'codFornecedor', 'descricao', 'valor', 'cddespesa', 'operacao', 'datacompetencia'];
}
