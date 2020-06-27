<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosMigrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_migrations', function (Blueprint $table) {
            $table->integerIncrements('codusuario');
            $table->integer('codempresa')->references('codempresa')->on('empresa_migrations');
            $table->string('abreviacao', 48)->unique();
            $table->string('email', 128)->unique();
            $table->string('senha', 256);
            $table->integer('nivel_acesso');
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
        Schema::dropIfExists('usuarios_migrations');
    }
}
