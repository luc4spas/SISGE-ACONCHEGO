<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Aluno;
use App\Turma;
use Illuminate\Http\Request;
use File;
use Redirect;
use Image;

class AlunoController extends Controller
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
       
        return view('aluno.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
  
        $turmas = \App\Turma::all();
        return view('aluno.register', compact('turmas'));
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
            'nome' => 'required',
            'sexo' => 'required',
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        $alunos= new \App\Aluno;

        if($request->hasFile('image')){
    		$image = $request->file('image');
    		$filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
        
        $alunos->image=$filename;
        }

        if($request->hasFile('amAl')){
            $alunos->amAl=$request->file('amAl')->store('anamneseAl');
        }
        $alunos->matricula=$request->get('matricula');
        $alunos->nome=$request->get('nome');
        $alunos->dta_nasc=$request->get('dta_nasc');
        $alunos->dta_mat=$request->get('dta_mat');
        $alunos->sexo=$request->get('sexo');
        $alunos->endereco=$request->get('endereco');
        $alunos->numero=$request->get('numero');
        $alunos->bairro=$request->get('bairro');
        $alunos->cidade=$request->get('cidade');
        $alunos->uf=$request->get('uf');
        $alunos->cor=$request->get('cor');
        $alunos->cep=$request->get('cep');
        $alunos->nome_pai=$request->get('nome_pai');
        $alunos->cpf_pai=$request->get('cpf_pai');
        $alunos->nasc_pai=$request->get('nasc_pai');
        $alunos->prof_pai=$request->get('prof_pai');
        $alunos->nome_mae=$request->get('nome_mae');
        $alunos->cpf_mae=$request->get('cpf_mae');
        $alunos->nasc_mae=$request->get('nasc_mae');
        $alunos->prof_mae=$request->get('prof_mae');
        $alunos->responsavel=$request->get('responsavel');
        $alunos->fone=$request->get('fone');
        $alunos->cel=$request->get('cel');
        $alunos->email=$request->get('email');
        $alunos->nacionalidade=$request->get('nacionalidade');
        $alunos->profissao=$request->get('profissao');
        $alunos->obs=$request->get('obs');
        $alunos->obsH=$request->get('obsH');
        $alunos->status=$request->get('status');
        $alunos->turma=$request->get('turma');
        $alunos->amAl=$request->file('amAl')->store('anamneseAl');

        $alunos->save();
        

        return redirect('aluno')->with('sucess', 'Aluno cadastrada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno $aluno)
    {
        
        $alunos = Aluno::with('turmas')->orderBy('matricula', 'DESC')->paginate(20);
        return view('aluno.index', [
            'alunos' => $alunos,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $turmas = Turma::all();
        $alunos = Aluno::findOrFail($id);

        return view('aluno.edit', compact('alunos', 'id', 'turmas'));
    }

    public function fone(Request $requst, $id)
    {
        $alunos = Aluno::find($id);
        $fone = $alunos->fone;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'nome' => 'required',
            'sexo' => 'required',
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }       

        
        
        $alunos = Aluno::findOrFail($id);
        $alunos->nome=$request->get('nome');
        if($request->hasFile('image')){
    		$image = $request->file('image');
    		$filename = time() . '.' . $image->getClientOriginalExtension();
    		Image::make($image)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
        
        $alunos->image = $filename;
        }

        if($request->hasFile('amAl')){
            $alunos->amAl=$request->file('amAl')->store('anamneseAl');
        }
        $alunos->matricula=$request->get('matricula');
        $alunos->nome=$request->get('nome');
        $alunos->dta_nasc=$request->get('dta_nasc');
        $alunos->dta_mat=$request->get('dta_mat');
        $alunos->sexo=$request->get('sexo');
        $alunos->endereco=$request->get('endereco');
        $alunos->numero=$request->get('numero');
        $alunos->bairro=$request->get('bairro');
        $alunos->cidade=$request->get('cidade');
        $alunos->uf=$request->get('uf');
        $alunos->cor=$request->get('cor');
        $alunos->cep=$request->get('cep');
        $alunos->nome_pai=$request->get('nome_pai');
        $alunos->cpf_pai=$request->get('cpf_pai');
        $alunos->nasc_pai=$request->get('nasc_pai');
        $alunos->prof_pai=$request->get('prof_pai');
        $alunos->nome_mae=$request->get('nome_mae');
        $alunos->cpf_mae=$request->get('cpf_mae');
        $alunos->nasc_mae=$request->get('nasc_mae');
        $alunos->prof_mae=$request->get('prof_mae');
        $alunos->responsavel=$request->get('responsavel');
        $alunos->fone=$request->get('fone');
        $alunos->cel=$request->get('cel');
        $alunos->email=$request->get('email');
        $alunos->nacionalidade=$request->get('nacionalidade');
        $alunos->profissao=$request->get('profissao');
        $alunos->obs=$request->get('obs');
        $alunos->obsH=$request->get('obsH');
        $alunos->status=$request->get('status');
        $alunos->turma=$request->get('turma');
        

        $alunos->save();
        
        return redirect('aluno')->with('sucess', 'Aluno atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $aluno)
    {
        //
    }

   

   
    public function search(Request $request, Aluno $aluno)
    {
        $dataForm = $request->all();
        $alunos =  $aluno->searchAluno($dataForm);

        return view('aluno.index', compact('alunos'));
    }

    public function relatorio()
    {
        $alunos = DB::table('alunos')->where('status', 'Ativo')->orderBy('matricula', 'ASC')->get();
        return view('relatorio.alunos', compact('alunos'));
    }

    public function ficha($id)
    {
        $alunos = Aluno::findOrFail($id);
        return view('aluno.ficha', compact('alunos', 'id'));
    }
    public function registro($id)
    {
        $alunos = Aluno::findOrFail($id);
        return view('aluno.registro', compact('alunos', 'id'));
    }

    public function alunoTurno(Request $request)
    {
        $turno = $request->input('turno');
        $alunos = Aluno::paginate(20);
        $turmas = Turma::where('turno', $turno);

        return view ('aluno.alunoturno', [
            'alunos' => $alunos,
            'turmas' => $turmas,
        ]);
    }
}
