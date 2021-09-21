<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColaboradoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaboradores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomCol');
            $table->string('corCol');
            $table->date('dtaNasc');
            $table->string('sexo');
            $table->string('estCivil', 11);
            $table->string('gInst');
            $table->string('rg');
            $table->string('cel');
            $table->string('tel');
            $table->string('orgEmis');
            $table->date('dtaEmis');
            $table->string('cpfCol');
            $table->string('ctps');
            $table->string('serie');
            $table->date('dtaCtps');
            $table->string('pis');
            $table->string('tElei');
            $table->string('zona');  
            $table->string('secao'); 
            $table->string('nomPai');
            $table->string('nomMae'); 
            $table->date('dtaAdmi'); 
            $table->integer('funcao_id')->unsigned();
            $table->foreign('funcao_id')->references('id')->on('funcaos');
            $table->decimal('salario'); 
            $table->string('endCol'); 
            $table->string('comp'); 
            $table->string('numCasa'); 
            $table->string('bairro'); 
            $table->string('cep'); 
            $table->string('cidade'); 
            $table->string('uf'); 
            $table->string('regTrab');
            $table->string('seguro');
            $table->string('contExp');
            $table->string('hEnt');  
            $table->string('hAlmo'); 
            $table->string('hSai'); 
            $table->string('folga');
            $table->string('flag'); 
            $table->string('email'); 

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
        Schema::dropIfExists('colaboradores');
    }
}
