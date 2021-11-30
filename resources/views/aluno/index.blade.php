@extends('adminlte::page')

@section('title', 'SISGE | Beta')

@section('content_header')
<h1>Alunos</h1>
@stop

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="box">
  <div class="box-header">
    <form class="form-inline" method="post" action="{{ route('aluno.search') }}">
      {!! csrf_field() !!}
      <input type="text" class="form-control" placeholder="N. Matricula" name="matricula">
      <input type="text" class="form-control" placeholder="Nome do Aluno" name="nome">
      <input type="text" class="form-control" placeholder="Responsável" name="responsavel">
      <input id="nasc" name="dta_mat" type="date" class="form-control data-mask" data-mask="00/00/0000" maxlength="10" autocomplete="off">
      <button type="submit" class="btn btn-primary">Pesquisar</button>
    </form>
  </div>
</div>

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Lista de Alunos</h3>
    <a href="{{ route('aluno.create')}}" class="btn btn-primary" type="button" style="float:right"><i class="fa fa-plus"></i></a>
    <a href="{{ route('alunos')}}" class="btn btn-primary" target="_blank" type="button" style="float:right"><i>PDF</i></a>

    <form class="form-inline" method="post" action="{{ route('turma.turno') }}">
      {!! csrf_field() !!}
      <select class="form-control" class="col-sm-2" name="turno">
        <option>Manhã</option>
        <option>Tarde</option>
        <option>Integral</option>
      </select>
      <button type="submit" class="btn btn-primary" style="float:center">Selecionar</button>

    </form>
    <form class="form-inline" method="post" action="{{ route('turma.printA') }}">
      {!! csrf_field() !!}

      <select class="form-control" class="col-sm-2" name="turno">
        <option>Manhã</option>
        <option>Tarde</option>
        <option>Integral</option>
      </select>
      <button type="submit" class="btn btn-primary" style="float:center" target="_blank"><i class="fa fa-print"></i></button>
    </form>
  </div>

  <!-- /.box-header -->
  <div class="box-body">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <th style="width: 10px">Matricula</th>
          <th>Nome</th>
          <th>Turma</th>
          <th>Responsável</th>
          <th>Data de Nascimento</th>
          <th>Celular</th>
          <th>Data de Matricula</th>
          <th>Ações</th>
        </tr>
        @foreach ($alunos as $aluno)
        <tr>
          <td>{{ $aluno->matricula }}</td>
          <td>{{ $aluno->nome }}</td>
          <td>{{ $aluno->turma }}</td>
          <td>{{ $aluno->responsavel }}</td>
          <td>{{ date( 'd/m/Y' , strtotime ($aluno->dta_nasc)) }}</td>
          <td>{{ $aluno->cel }}</td>
          <td>{{ date( 'd/m/Y' , strtotime ($aluno->dta_mat)) }}</td>

          <td style="width: 10px;width: 157px;">
            <div style="display: inline;" class="dropdown">
              <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-print"></i></a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="{{action('AlunoController@ficha', $aluno['id'])}}" target="_blank" type="button">Ficha de requerimento</a>
                <a class="dropdown-item" href="{{action('AlunoController@registro', $aluno['id'])}}" target="_blank" type="button">Ficha de registro</a><br>
                <a class="dropdown-item" href="{{action('AlunoController@showBoleto', $aluno['id'])}}" target="_blank" type="button">Boleto</a><br>
                <a class="dropdown-item" href="/storage/{{$aluno->amAl}}" target="_blank" type="button">Ficha de Anamnese</a>
              </div>
            </div>
  </div>
  <a href="{{action('AlunoController@edit', $aluno['id'])}}" type="button" class="btn btn-warning"><i class="fa fa-edit"></i></a>
  <a href="{{action('AlunoController@edit', $aluno['id'])}}" type="button" class="btn btn-success"><i class="fa fa-phone  "></i></a>
  </td>
  </tr>
  @endforeach ()
  </tbody>
  </table>


  {!! $alunos->links() !!}
</div>
</div>


@inclue(aluno.modalBoleto)


@stop