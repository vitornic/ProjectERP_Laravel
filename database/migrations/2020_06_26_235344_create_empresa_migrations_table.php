<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaMigrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_migrations', function (Blueprint $table) {
            $table->IntegerIncrements('codempresa');
            $table->string('razao_social', 64)->unique();
            $table->string('fantasia', 64)->unique();
            $table->string('endereco', 64);
            $table->string('numero', 16);
            $table->string('bairro', 48);
            $table->string('cidade', 48);
            $table->string('complemento', 48);
            $table->string('UF', 2);
            $table->string('CNPJ', 14);
            $table->string('INSCR_EST', 16);
            $table->string('INSCR_MUN', 16);
            $table->string('CNAE', 16);
            $table->string('FONE1', 16);
            $table->string('FONE2', 16);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa_migrations');
    }
}
