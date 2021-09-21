<?php

namespace App\Http\Controllers;

use App\Funcao;
use Illuminate\Http\Request;
use App\Alunos;
use App\Colaboradores;

class FuncaoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('conf.resgiterf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'funcao_nome' => 'required',
            'funcao_desc' => 'required',
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        $funcao= new \App\Funcao;
        $funcao->funcao_nome=$request->get('funcao_nome');
        $funcao->funcao_desc=$request->get('funcao_desc');
        $funcao->funcao_obs=$request->get('funcao_obs');
        $funcao->save();

        return redirect('conf/funcao')->with('sucess', 'Função cadastrada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Funcao  $funcao
     * @return \Illuminate\Http\Response
     */
    public function show(Funcao $funcoes)
    {
        $funcoes = \App\Funcao::all();
        $totalFuncoes = Funcao::count();
        return view('conf.funcao', compact('funcoes', 'totalFuncoes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Funcao  $funcao
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funcoes = Funcao::findOrFail($id);
        return view('conf.funcaoedit', compact('funcoes','id'));
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Funcao  $funcao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $funcao=  \App\Funcao::find($id);
        $funcao->funcao_nome=$request->get('funcao_nome');
        $funcao->funcao_desc=$request->get('funcao_desc');
        $funcao->funcao_obs=$request->get('funcao_obs');
        $funcao->save();

        return redirect('conf/funcao')->with('sucess', 'Função atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Funcao  $funcao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcao $funcao)
    {
        //
    }

}
