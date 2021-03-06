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
    <form class="form-horizontal" method="post" action="{{ route('turma.store') }}">
            {!! csrf_field() !!}
      <div class="box-body">
        <div class="form-group">
          <label for="funcao_nome" class="col-sm-2 control-label">Nome da Turma</label>

          <div class="col-sm-10">
            <input  type="text" class="form-control" id="funcao_nome" name="nomTurma" placeholder="Nome da Turma" required>
          </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Turno</label>
            <div class="col-sm-2">
                <select name="turno" class="form-control">
                    <option></option>
                    <option>Manhã</option>
                    <option>Tarde</option>
                    <option>Integral</option>
                </select>
            </div>

          <label for="inputPassword3" class="col-sm-2 control-label">Ano:</label>

          <div class="col-sm-2">
            <input type="text" class="form-control" id="funcao_desc" name="ano" placeholder="Ano Letivo" required>
          </div>
          
        
                <label class="col-sm-1 control-label">Sala:</label>
      
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="funcao_obs" name="sala" placeholder="" required>
                </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Professor</label>
            <div  class="col-sm-4">
                    <select class="form-control" class="col-sm-2" name="colaborador_id">
                        <option></option>
                        @foreach ($colabs as $colab)                           
                        <option value="{{ $colab->id }}">{{ $colab->nomCol }}</option>
                        @endforeach
                      
                    </select>
                </div>

                    <label class="col-sm-1 control-label">Auxiliar</label>
                    <div class="col-sm-4">
                    <select class="js-example-basic-multiple form-control" name="auxiliar[]" multiple="multiple">
                            @foreach ($colabs as $colab)                           
                            <option value="{{ $colab->nomCol }}">{{ $colab->nomCol }}</option>
                            @endforeach

                      </select>
                    </div>
                       
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Quantidade de Vagas</label>
          <div class="col-sm-2">
            <input type="number" class="form-control" name="qtdVaga" required>
          </div>
          <label class="col-sm-2 control-label">Valor Mensalidade</label>
          <div class="col-sm-2">
            <input type="text" class="form-control" name="money" id="money" required>
          </div>
          <label class="col-sm-2 control-label">Valor Mensalidade Parcial</label>
          <div class="col-sm-2">
            <input type="text" class="form-control" name="valorP" id="valorP" required>
          </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-info pull-right">Salvar</button>
        <a class="btn btn-default pull-rigth" type="button" href="{{ url('turma')}}">Cancelar</a>
      </div>
      <!-- /.box-footer -->
    </form>
    <script src="/js/jquery.js"></script> 
    <script type="text/javascript" src="/js/jquery.mask.js"></script>
    <script src="/select2/dist/js/select2.min.js"></script>
    <script type="text/javascript">
          $(document).ready(function() {
              $('.js-example-basic-multiple').select2();
          });
    </script> 
    <script type="text/javascript">$("#money").mask("#.##0,00", {reverse: true});</script>
    <script type="text/javascript">$("#valorP").mask("#.##0,00", {reverse: true});</script>

  </div>

  
@stop