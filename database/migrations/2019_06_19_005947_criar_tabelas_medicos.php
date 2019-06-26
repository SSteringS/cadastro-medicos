<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelasMedicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email');
            $table->string('cpf');
            $table->string('especialidade');
            $table->string('data_aniversario');
            $table->string('telefone')->nullable();
            $table->string('salario')->nullable();
            $table->string('crm')->nullable();

        });
    }


    public function down()
    {
        Schema::drop('medicos');
    }
}
