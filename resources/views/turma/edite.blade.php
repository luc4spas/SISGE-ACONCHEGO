@extends('adminlte::page')

@section('title', 'SISGE | Beta')

@section('content_header')
    <h1>Cadastro de Turmas</h1>
@stop

@section('content')


<div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title"></h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="{{ route('turma.update', $turmas['id']) }}">
            {!! csrf_field() !!}
      <div class="box-body">
        <div class="form-group">
          <label for="funcao_nome" class="col-sm-2 control-label">Nome da Turma</label>

          <div class="col-sm-10">
            <input value="{{ $turmas->nomTurma }}" type="text" class="form-control" id="funcao_nome" name="nomTurma" placeholder="Nome da Turma" required>
          </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Turno</label>
            <div class="col-sm-2">
                <select name="turno" class="form-control">
                    <option value="{{ $turmas->turno }}">{{ $turmas->turno }} </option>
                    <option>Manhã</option>
                    <option>Tarde</option>
                    <option>Integral</option>
                </select>
            </div>

          <label for="inputPassword3" class="col-sm-2 control-label">Ano:</label>

          <div class="col-sm-2">
            <input value="{{ $turmas->ano }}" type="text" class="form-control" id="funcao_desc" name="ano" placeholder="Ano Letivo" required>
          </div>
          
        
                <label class="col-sm-1 control-label">Sala:</label>
      
                <div class="col-sm-2">
                  <input value="{{ $turmas->sala }}" type="text" class="form-control" id="funcao_obs" name="sala" placeholder="" required>
                </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Professor</label>
            <div  class="col-sm-4">
                    <select class="form-control" class="col-sm-2" name="colaborador_id">
                        <option value="{{ $turmas->colaborador_id }}">{{ $turmas->colaboradores->nomCol }}</option>
                        @foreach ($colabs as $colab)                           
                        <option value="{{ $colab->id }}">{{ $colab->nomCol }}</option>
                        @endforeach
                      
                    </select>
                </div> 
                
                <label class="col-sm-1 control-label">Auxiliar</label>
                    <div class="col-sm-4">
                    <textarea class="form-control" name="aux">
                      {{ $turmas->auxiliar }}
                    </textarea>
                    </div>
          </div>

              <div class="form-group" style="padding-left: 100px;">
                    <label class="col-sm-1 control-label">Auxiliar Atualizar:</label>
                  <div class="col-sm-4">
                    <select class="js-example-basic-multiple form-control" name="auxiliar[]" multiple="multiple">
                    <option selected  value="{{ $turmas->auxiliar }}">{{ $turmas->auxiliar }}</option> 
                            @foreach ($colabs as $colab)                          
                            <option value="{{ $colab->nomCol }}">{{ $colab->nomCol }}</option>
                            @endforeach

                      </select>
                </div> 
                </div>      
     
      <div class="form-group">
        <label class="col-sm-2 control-label">Quantidade de Vagas</label>
          <div class="col-sm-2">
            <input value="{{ $turmas->qtdVaga }}" type="number" class="form-control" name="qtdVaga">
          </div>
          <label class="col-sm-2 control-label">Valor Mensalidade</label>
          <div class="col-sm-2">
            <input value="{{ $turmas->valor }}" type="text" class="form-control" name="money" id="money">
          </div>
          <label class="col-sm-2 control-label">Valor Mensalidade Parcial</label>
          <div class="col-sm-2">
            <input value="{{ $turmas->valorP }}" type="text" class="form-control" name="valorP" id="valorP">
          </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
          <button type="submit" class="btn btn-info pull-right">Atualizar</button>
          <a href="{{action('TurmaController@destroy', $turmas->id)}}" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>
        <a class="btn btn-default pull-rigth" type="button" href="{{ url('turma')}}">Cancelar</a>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>

  <script src="/js/jquery.js"></script> 
    <script type="text/javascript" src="/js/jquery.mask.js"></script>
    <script src="/select2/dist/js/select2.min.js"></script>
    <script type="text/javascript">
          $(document).ready(function() {
              $('.js-example-basic-multiple').select2();
          });
    </script> 
    <script type="text/javascript">$("#money").mask("0.000,00", {reverse: true});</script>
    <script type="text/javascript">$("#valorP").mask("0.000,00", {reverse: true});</script>

@stop