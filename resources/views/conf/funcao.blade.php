@extends('adminlte::page')

@section('title', 'SISGE | Beta')

@section('content_header')
    <h1>Funções</h1>
    <p>{{ $totalFuncoes }}</p>
@stop

@section('content')

<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Lista de Funções</h3>
          <a href="{{ route('funcao.creat')}}" class="btn btn-primary" type="button"style="float:right"><i class="fa fa-plus"></i></a>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tbody><tr>
              <th>ID</th>
              <th>Nome Função</th>
              <th>Descrição</th>
              <th>Observações</th>
              <th>Ações</th>
            </tr>
            @foreach ($funcoes as $funcao)
            <tr>
              <td>{{ $funcao->id }}</td>
              <td>{{ $funcao->funcao_nome }}</td>              
              <td>{{ $funcao->funcao_desc }}</td>
              <td>{{ $funcao->funcao_obs }}</td>
              <td style="width 10px;width: 100px;">
                <a class="btn btn-info" type="button"><i class="fa fa-eye"></i></a>
                <a href="{{action('FuncaoController@edit', $funcao['id'])}}"  class="btn btn-warning" type="button"><i class="fa fa-edit"></i></a>
            </td>
            </tr>
            @endforeach ()
          </tbody></table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
@stop