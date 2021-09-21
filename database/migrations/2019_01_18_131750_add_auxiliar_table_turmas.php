<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuxiliarTableTurmas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       // Schema::table('turmas', function (Blueprint $table) {
         //   $table->string('auxiliar')->after('colaborador_id');
        //});
        //Schema::table('turmas', function (Blueprint $table) {
          //  $table->string('qtdVaga')->after('turno');
        //});
        //Schema::table('alunos', function (Blueprint $table) {
           // $table->date('dta_mat')->after('dta_nasc');
       // });

        Schema::table('colaboradores', function (Blueprint $table) {
         $table->string('amCol')->after('cel');
        });

        Schema::table('alunos', function (Blueprint $table) {
            $table->string('amAl')->after('turma');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('turmas', function (Blueprint $table) {
            //
        });
    }
}
