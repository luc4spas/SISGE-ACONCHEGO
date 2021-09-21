<?php

namespace App\Http\Controllers;

use App\Turma;
use App\Colaboradores;
use App\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $turmas = DB::table('turmas')->where('ano', '=', '2020')
        ->join('colaboradores', 'turmas.colaborador_id', '=', 'colaboradores.id')
        ->select('turmas.*', 'colaboradores.nomCol')->orderBy('ano', 'DESC')->paginate(20);
        
        $tTurmas = Turma::count();
        return view('turma.index', compact('turmas', 'tTurmas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colabs = DB::table('colaboradores')->where('funcao_id', '=', 1)->orwhere('funcao_id', '=', 2)->orwhere('funcao_id', '=', 3)->orwhere('funcao_id', '=', 10)->orwhere('funcao_id', '=', 11)->orwhere('funcao_id', '=', 6)->orwhere('funcao_id', '=', 7)->get();
        return view('turma.create', compact('colabs'));
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
            'nomTurma' => 'required',
            'colaborador_id' => 'required',
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $turma= new \App\Turma;
        $turma->nomTurma=$request->get('nomTurma');
        $turma->colaborador_id=$request->get('colaborador_id');
        $turma->ano=$request->get('ano');
        $turma->sala=$request->get('sala');
        $turma->turno=$request->get('turno');
        $turma->qtdVaga=$request->get('qtdVaga');
        $turma->auxiliar=implode(',', $request->get('auxiliar'));

        $turma->save();

        return redirect('turma')->with('sucess', 'Turma cadastrada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $turmas = DB::table('turmas')
                        ->join('colaboradores', 'turmas.colaborador_id', '=', 'colaboradores.id')
                        ->select('turmas.*', 'colaboradores.nomCol')->orderBy('ano', 'DESC')->paginate(20);
       
        return view('turma.show', ['turmas' => $turmas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $turmas = Turma::findOrFail($id); 
        $col = $turmas->colaboradores;  
        $colabs = \App\Colaboradores::all();     
        return view('turma.edite', compact('turmas','id', 'colabs', 'col'));
    }

    public function turmaAluno($id)
    {
        $turma = Turma::find($id);
        $todos = Aluno::all();
        $alunos = $turma->alunos()->orderBy('nome','ASC')->get();
        $tt = $turma->alunos->count();

        $por = ($turma->qtdVaga - $tt);
        
        $col = $turma->colaboradores;

        return view ('turma.view', [
            'turma' => $turma,
            'todos' => $todos,
            'alunos'=> $alunos,
            'col' => $col,
            'tt' => $tt,
            'por' => $por,
        ]); 
        
    }

    public function printTurma($id){
        $turma = Turma::find($id);
        $todos = Aluno::all();
        $alunos = $turma->alunos;
        $tt = $turma->alunos->count();

        $por = ($turma->qtdVaga - $tt);
        
        $col = $turma->colaboradores;

        return view ('turma.print', [
            'turma' => $turma,
            'todos' => $todos,
            'alunos'=> $alunos,
            'col' => $col,
            'tt' => $tt,
            'por' => $por,
        ]); 
               

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
        $turma = \App\Turma::find($id);
        $turma->nomTurma=$request->get('nomTurma');
        $turma->colaborador_id=$request->get('colaborador_id');
        $turma->ano=$request->get('ano');
        $turma->sala=$request->get('sala');
        $turma->turno=$request->get('turno');
        $turma->qtdVaga=$request->get('qtdVaga');
        $turma->auxiliar=implode(',', $request->get('auxiliar'));

        

        $turma->save();

        return redirect('turma')->with('sucess', 'Turma atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turma = Turma::find($id);
        $turma->delete();

        return redirect('turma')->with('sucess', 'Turma removida com sucesso');
    }

    public function addAluno()
    {
        $turmas = DB::table('turmas')->where('turno','Tarde')->get();
        $t = Turma::with('alunos')->where('turno','Integral')->get();
        $turma = Turma::find(21);
        $alunos = $turma->alunos;
        $col = $turma->colaboradores;

        echo '<h3>'.$turma->nomTurma.'</h3>';
        echo '<h3>'.$turma->colaboradores->nomCol.'</h3>';
        echo '<h3>'.$turma->colaboradores->orgEmis.'</h3>';
        echo '<ul>';
        foreach ($alunos as $a) {
            echo '<li>'.$a->nome.'<li>';

        echo '</ul>';
        }
        echo '<ul>';
        foreach ($t as $tt)
        {
            echo '<li>'.$tt->nomTurma.'<li>'; 
            foreach($tt->alunos as $al)
            {
                echo '<li>'.$al->nome.'<li>';            
                echo '<li>'.$al->nome_pai.'<li>';            
                echo '<li>'.$al->nomTurma.'<li>';            
            }
        }
        echo '</ul>';
    }

    public function alunoturma(Request $request, $id)
    {
        $turma = Turma::find($id);
        $turma->alunos()->attach($request->aluno_id);
        
        return redirect()->route('turma.view', [$id, 'id']);
    }

    public function destroyAluno($id, $aluno_id)
    {
            $turma = Turma::find($id);
            $turma->alunos()->detach($aluno_id);

            return redirect()->route('turma.view', [$id, 'id']);
    }

    public function turmaAno(Request $request)
    {
        $ano = $request->input('ano');
        $turmas = DB::table('turmas')->where('ano', '=', $ano)
        ->join('colaboradores', 'turmas.colaborador_id', '=', 'colaboradores.id')
        ->select('turmas.*', 'colaboradores.nomCol')->orderBy('ano', 'DESC')->paginate(20);
        
        $tTurmas = Turma::count();

        return view('turma.ano', ['turmas'=> $turmas,
                                  'tTurmas' => $tTurmas]);
    }

    public function alunoTurno(Request $request)
    {
        $turno = $request->input('turno');
        $turmas = Turma::with('alunos')->where('turno', $turno)->paginate(20);

        return view ('aluno.alunoturno', [
            'turmas' => $turmas,            
        ]);
    }

    public function alunoPrint(Request $request)
    {
        $turno = $request->input('turno');
        $turmas = Turma::with('alunos')->where('turno', $turno)->get();

        return view ('aluno.print', [
            'turmas' => $turmas,            
        ]);
    }

    
}
