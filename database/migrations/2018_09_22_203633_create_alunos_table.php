<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matricula')->unique();
            $table->string('image')->nullable();
            $table->string('nome')->unique();
            $table->date('dta_nasc');
            $table->string('sexo');
            $table->string('endereco');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cep');
            $table->string('cidade');
            $table->string('uf');
            $table->string('cor');
            $table->string('nome_pai');
            $table->string('cpf_pai');
            $table->date('nasc_pai');
            $table->string('prof_pai')->nullable();
            $table->string('nome_mae');
            $table->string('cpf_mae');
            $table->date('nasc_mae');
            $table->string('prof_mae')->nullable();
            $table->string('responsavel');
            $table->string('nacionalidade');
            $table->string('email')->nullable();
            $table->string('fone')->nullable();
            $table->string('cel')->nullable();
            $table->string('obs')->nullable();
            $table->string('comp')->nullable();
            $table->string('status');
            $table->string('turma');
            $table->string('profissao');
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
        Schema::dropIfExists('alunos');
    }
}
