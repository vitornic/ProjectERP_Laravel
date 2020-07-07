<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->string('fornecedor');
            $table->integer('codFornecedor');
            $table->integer('notafiscal')->unique();
            $table->string('descricao');
            $table->decimal('valor',14,2);
            $table->string('cddespesa');
            $table->integer('operacao');
            $table->date('datacompetencia');
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
        Schema::dropIfExists('Pagamentos');
    }
}
