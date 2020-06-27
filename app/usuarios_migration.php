<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuarios_migration extends Model
{
    protected $fillable = ['codempresa','abreviacao','email','senha', 'nivel_acesso'];
    protected $guarded = ['codusuario', 'created_at', 'update_at'];
    protected $table = 'usuarios_migrations';
}
