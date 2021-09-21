<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use App\Colaboradores;
use App\Turma;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $totalColab = DB::table('colaboradores')->where('flag', 'Ativo')->count();
        $totalAlunos = Aluno::count();
        $totalTurma = Turma::count();
        $alunosAtivos = DB::table('alunos')->where('status', 'Ativo')->count();
        return view('home', compact('totalAlunos', 'alunosAtivos', 'totalColab', 'totalTurma'));
    }

    public function financeiro()
    {
        $totalColab = Colaboradores::count();
        $totalAlunos = Aluno::count();
        $alunosAtivos = DB::table('alunos')->where('status', 'Ativo')->count();
       
        return view ('financeiro/financeiro', compact('totalAlunos', 'alunosAtivos', 'totalColab'));
    }
}
