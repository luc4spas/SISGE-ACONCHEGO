<?php

namespace App\Http\Controllers;

use App\Funcao;
use App\Colaboradores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use Redirect;
use Image;

class ColaboradoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('colaboradores.lista');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $funcoes = \App\Funcao::all();
        return view('colaboradores.col', compact('funcoes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $colab = new \App\Colaboradores;

        if($request->hasFile('amCol')){
            $colab->amCol=$request->file('amCol')->store('anamneseCol');
        }
        $colab->nomCol=$request->get('nomCol');
        $colab->corCol=$request->get('corCol');
        $colab->dtaNasc=$request->get('dtaNasc');
        $colab->sexo=$request->get('sexo');
        $colab->estCivil=$request->get('estCivil');
        $colab->gInst=$request->get('gInst');
        $colab->rg=$request->get('rg');
        $colab->orgEmis=$request->get('orgEmis');
        $colab->dtaEmis=$request->get('dtaEmis');
        $colab->cpfCol=$request->get('cpfCol');
        $colab->ctps=$request->get('ctps');
        $colab->serie=$request->get('serie');
        $colab->dtaCtps=$request->get('dtaCtps');
        $colab->pis=$request->get('pis');
        $colab->tElei=$request->get('tElei');
        $colab->zona=$request->get('zona');
        $colab->secao=$request->get('secao');
        $colab->nomPai=$request->get('nomPai');
        $colab->nomMae=$request->get('nomMae');
        $colab->dtaAdmi=$request->get('dtaAdmi');
        $colab->funcao_id=$request->get('funcao_id');
        $colab->salario=$request->get('salario');
        $colab->endCol=$request->get('endCol');
        $colab->comp=$request->get('comp');
        $colab->numCasa=$request->get('numCasa');
        $colab->bairro=$request->get('bairro');
        $colab->cep=$request->get('cep');
        $colab->cidade=$request->get('cidade');
        $colab->uf=$request->get('uf');
        $colab->regTrab=$request->get('regTrab');
        $colab->seguro=$request->get('seguro');
        $colab->contExp=$request->get('contExp');
        $colab->hEnt=$request->get('hEnt');
        $colab->hAlmo=$request->get('hAlmo');
        $colab->hSai=$request->get('hSai');
        $colab->folga=$request->get('folga');
        $colab->flag=$request->get('flag');
        $colab->email=$request->get('email');
        $colab->tel=$request->get('tel');
        $colab->cel=$request->get('cel');
        


        $colab->save();

        return redirect('colaboradores/lista')->with('sucess', 'Colaborador cadastrada com sucesso');


        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Colaboradores  $colaboradores
     * @return \Illuminate\Http\Response
     */
    public function show(Colaboradores $colaboradores)
    {
        $colab = DB::table('colaboradores')->where('flag', 'Ativo')->orderBy('nomCol', 'ASC')
                    ->join('funcaos', 'colaboradores.funcao_id', '=', 'funcaos.id' )
                    ->select('colaboradores.*', 'funcaos.funcao_nome')->paginate(20);

        return view('colaboradores.lista', ['colab' => $colab]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Colaboradores  $colaboradores
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colab = Colaboradores::findOrFail($id);
        $func = $colab->funcao;
        $funcoes = \App\Funcao::all();

        return view('colaboradores.edit', compact('colab','id','funcoes', 'func'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Colaboradores  $colaboradores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $colab = Colaboradores::find($id);
        if($request->hasFile('amCol')){
            $colab->amCol=$request->file('amCol')->store('anamneseCol');
        }
        $colab->nomCol=$request->get('nomCol');
        $colab->corCol=$request->get('corCol');
        $colab->dtaNasc=$request->get('dtaNasc');
        $colab->sexo=$request->get('sexo');
        $colab->estCivil=$request->get('estCivil');
        $colab->gInst=$request->get('gInst');
        $colab->rg=$request->get('rg');
        $colab->orgEmis=$request->get('orgEmis');
        $colab->dtaEmis=$request->get('dtaEmis');
        $colab->cpfCol=$request->get('cpfCol');
        $colab->ctps=$request->get('ctps');
        $colab->serie=$request->get('serie');
        $colab->dtaCtps=$request->get('dtaCtps');
        $colab->pis=$request->get('pis');
        $colab->tElei=$request->get('tElei');
        $colab->zona=$request->get('zona');
        $colab->secao=$request->get('secao');
        $colab->nomPai=$request->get('nomPai');
        $colab->nomMae=$request->get('nomMae');
        $colab->dtaAdmi=$request->get('dtaAdmi');
        $colab->funcao_id=$request->get('funcao_id');
        $colab->salario=$request->get('salario');
        $colab->endCol=$request->get('endCol');
        $colab->comp=$request->get('comp');
        $colab->numCasa=$request->get('numCasa');
        $colab->bairro=$request->get('bairro');
        $colab->cep=$request->get('cep');
        $colab->cidade=$request->get('cidade');
        $colab->uf=$request->get('uf');
        $colab->regTrab=$request->get('regTrab');
        $colab->seguro=$request->get('seguro');
        $colab->contExp=$request->get('contExp');
        $colab->hEnt=$request->get('hEnt');
        $colab->hAlmo=$request->get('hAlmo');
        $colab->hSai=$request->get('hSai');
        $colab->folga=$request->get('folga');
        $colab->flag=$request->get('flag');
        $colab->email=$request->get('email');
        $colab->tel=$request->get('tel');
        $colab->cel=$request->get('cel');        
        

        $colab->save();

        return redirect('colaboradores/lista')->with('sucess', 'Colaborador cadastrada com sucesso');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Colaboradores  $colaboradores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Colaboradores $colaboradores)
    {
        //
    }

    public function search(Request $request, Colaboradores $colabs)
    {
        $dataForm = $request->all();
        $colab =  $colabs->searchColab($dataForm);
        $funcao = $colabs->funcao;

        return view('colaboradores.search', compact('colab', 'funcao'));
    }

    public function colF()
    {
        $col = Colaboradores::find(36);
        $funcao = $col->funcao;

        echo '<h3>'.$col->nomCol.'</h3>';
        echo '<h3>'.$col->funcao->funcao_nome.'</h3>';
        echo '<h3>'.$col->funcao->id.'</h3>';

    }
}
