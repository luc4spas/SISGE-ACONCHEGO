@extends('adminlte::page')

@section('title', 'SISGE | Beta')

@section('content_header')
    <h1>Editar Função</h1>
@stop
@section('content')
<div class="row">
</div>
<div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title"></h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="{{ route('funcao.update', $funcoes['id'] ) }}">
            {!! csrf_field() !!}
      <div class="box-body">
        <div class="form-group">
          <label for="funcao_nome" class="col-sm-2 control-label">Nome Funcação</label>

          <div class="col-sm-10">
            <input value="{{ $funcoes->funcao_nome }}" type="text" class="form-control" id="funcao_nome" name="funcao_nome" placeholder="Nome da Funcação" required>
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Descrição</label>

          <div class="col-sm-10">
            <input value="{{ $funcoes->funcao_nome }}" type="text" class="form-control" id="funcao_desc" name="funcao_desc" placeholder="Descrição" required>
          </div>
        </div>
          <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Observação</label>
      
                <div class="col-sm-10">
                  <input value="{{ $funcoes->funcao_obs }}" type="text" class="form-control" id="funcao_obs" name="funcao_obs" placeholder="Observação" required>
                </div>
        </div>
      
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-info pull-right">Salvar</button>
        <a class="btn btn-default pull-rigth" type="button" href="{{ url('conf/funcao')}}">Cancelar</a>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>

@stop