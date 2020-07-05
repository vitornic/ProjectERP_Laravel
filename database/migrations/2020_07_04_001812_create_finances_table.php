<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finances', function (Blueprint $table) {
            $table->id();
            $table->string('cliente');
            $table->integer('codCliente');
            $table->integer('fatura')->unique();
            $table->string('descricao');
            $table->decimal('valor',14,2);
            $table->string('cdreceita');
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
        Schema::dropIfExists('Finances');
    }
}
