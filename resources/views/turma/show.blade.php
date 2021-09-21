@extends('adminlte::page')

@section('title', 'SISGE | Beta')

@section('content_header')
    <h1>Turmas</h1>
@stop

@section('content')
<div class="box">
  <div class="box-header">
    <form class="form-inline" method="post" action="{{ route('turma') }}">
        {!! csrf_field() !!}
      <input type="text" class="form-control" placeholder="N. Matricula" name="matricula" >
      <input type="text" class="form-control" placeholder="Nome do Colaborador" name="nome">
      <input type="text" class="form-control" placeholder="admissão" name="responsavel">
      <button type="submit" class="btn btn-primary">Pesquisar</button>
    </form>
  </div>
</div>
<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Lista de Turmas</h3>
          <a href="{{ route('turma.create')}}" class="btn btn-primary" type="button"style="float:right"><i class="fa fa-plus"></i></a>
          <a href="{{ route('turma')}}" class="btn btn-primary" type="button"style="float:right"><i>PDF</i></a>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tbody><tr>
              <th style="width: 10px">ID</th>
              <th>Nome</th>
              <th>Turno</th>
              <th>Ano</th>
              <th>Professor</th>
              <th>Sala</th>              
              <th>Ações</th>
            </tr>
            @foreach ($alunos as $aluno)
            <tr>
              <td>{{ $aluno->id }}</td>
              <td>{{ $aluno->turma }}</td>
              <td>{{ $aluno->nome }}</td>
                  
              </td>
            </tr>
            @endforeach ()
           
          </tbody></table>
          {!! $alunos->links() !!}
        </div>
      </div>
@stop