@extends('adminlte::page')

@section('title', 'SISGE | Beta')

@section('content_header')
    <h1>Colaboradores</h1>
@stop

@section('content')
<div class="box">
  <div class="box-header">
    <form class="form-inline" method="post" action="{{ route('colab.search') }}">
        {!! csrf_field() !!}
      <input type="text" class="form-control" placeholder="N. Matricula" name="matricula" >
      <input type="text" class="form-control" placeholder="Nome do Colaborador" name="nome">
      <input type="text" class="form-control" placeholder="admissão" name="responsavel">
      <select class="form-control" class="col-sm-2" name="flag">
                              <option></option>
                            <option>Inativo</option>
                            <option>Ativo</option>
                        </select>   
      <button type="submit" class="btn btn-primary">Pesquisar</button>
    </form>
  </div>
</div>
<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Lista de Colaboradores</h3>
          <a href="{{ route('colab.create')}}" class="btn btn-primary" type="button"style="float:right"><i class="fa fa-plus"></i></a>
          <a href="{{ route('alunos')}}" class="btn btn-primary" type="button"style="float:right"><i>PDF</i></a>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tbody><tr>
              <th style="width: 10px">ID</th>
              <th>Status</th>
              <th>Nome</th>
              <th>Função</th>
              <th>Admissão</th>
              <th>Data de Nascimento</th>
              <th>Celular</th>
              <th>Ações</th>
            </tr>
            @foreach ($colab as $col)
            <tr>
              <td>{{ $col->id }}</td>
              <td>{{ $col->flag }}</td>
              <td>{{ $col->nomCol }}</td>
              <td>{{ $col->funcao_nome }}</td>
              <td>{{ date( 'd/m/Y' , strtotime ($col->dtaAdmi)) }}</td>
              <td>{{ date( 'd/m/Y' , strtotime ($col->dtaNasc)) }}</td>
              <td>{{ $col->cel }}</td>
              
              <td style="width 10px;width: 100px;">
                  <a href="{{action('ColaboradoresController@edit', $col->id)}}" type="button" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                  <a href="/storage/{{$col->amCol}}" target="_blank" type="button" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                  
              </td>
            </tr>
            @endforeach ()
           
          </tbody></table>
          {!! $colab->links() !!}
        </div>
      </div>
@stop