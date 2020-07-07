<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSistemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sistemas', function (Blueprint $table) {
            $table->id();
            $table->string('CNPJ', 14);
            $table->string('razaosocial', 255);
            $table->string('fantasia', 255);
            $table->string('telefone', 13);
            $table->string('celular', 14);
            $table->string('email', 255);
            $table->string('CEP', 8);
            $table->string('UF', 2);
            $table->string('cidade', 255);
            $table->string('endereco', 255);
            $table->integer('numero');
            $table->string('complemento', 255);
            $table->string('bairro', 255);
            $table->string('inscricaoestadual', 255);
            $table->string('CNAE', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sistemas');
    }
}
