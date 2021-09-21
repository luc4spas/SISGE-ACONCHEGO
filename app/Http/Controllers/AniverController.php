<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Aluno;
use App\Turma;
use App\Colaboradores;
use Illuminate\Http\Request;
use File;
use Redirect;
use Image;

class AniverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function printAluno(){
        $alunoA = DB::select('SELECT * FROM `alunos` WHERE Month(dta_nasc) = Month(Now())AND `status` = "Ativo" ORDER BY DAY(dta_nasc) ASC');

        return view ('aniver.aluno', compact('alunoA'));

    }

    public function printPais(){
        $paiA = DB::select('SELECT * FROM `alunos` WHERE Month(nasc_pai) = Month(Now()) AND `status` = "Ativo" ORDER BY DAY(nasc_pai) ASC');

        return view ('aniver.pais', compact('paiA'));

    }

    public function printColab(){
        $colA = DB::select('SELECT * FROM `colaboradores` WHERE Month(dtaNasc) = Month(Now()) AND `flag` = "Ativo" ORDER BY DAY(dtaNasc) ASC');

        return view ('aniver.colab', compact('colA'));

    }

    public function printMae(){
        $maeA = DB::select('SELECT * FROM `alunos` WHERE Month(nasc_mae) = Month(Now()) AND `status` = "Ativo" ORDER BY DAY(nasc_mae) ASC');

        return view ('aniver.mae', compact('maeA'));

    }
    public function index()
    {
        $alunoA = DB::select('SELECT * FROM `alunos` WHERE Month(dta_nasc) = Month(Now())AND `status` = "Ativo" ORDER BY DAY(dta_nasc) ASC');
        $paiA = DB::select('SELECT * FROM `alunos` WHERE Month(nasc_pai) = Month(Now()) AND `status` = "Ativo" ORDER BY DAY(nasc_pai) ASC');
        $maeA = DB::select('SELECT * FROM `alunos` WHERE Month(nasc_mae) = Month(Now()) AND `status` = "Ativo" ORDER BY DAY(nasc_mae) ASC');
        $colA = DB::select('SELECT * FROM `colaboradores` WHERE Month(dtaNasc) = Month(Now()) AND `flag` = "Ativo" ORDER BY DAY(dtaNasc) ASC');

        return view ('aniver.aniv', compact('alunoA', 'paiA', 'maeA', 'colA'));
     

    }

    public function filtro(Request $request)
    {
        $pesquisa = $request->get('mes');
  
        $alunoB = Aluno::whereMonth('dta_nasc', $pesquisa)->where('status', 'Ativo')->orderby('dta_nasc')->get();        
        $paiB = Aluno::whereMonth('nasc_pai', $pesquisa)->where('status', 'Ativo')->orderby('nasc_pai')->get();
        $maeB = Aluno::whereMonth('nasc_mae', $pesquisa)->where('status', 'Ativo')->get();
        $colB = Colaboradores::whereMonth('dtaNasc', $pesquisa)->where('flag', 'Ativo')->get();
        
        return view ('aniver.filtro', compact('alunoB', 'paiB', 'maeB', 'colB'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
