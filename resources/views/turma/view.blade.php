@extends('adminlte::page')

@section('title', 'SISGE | Beta')

@section('content_header')
  
@stop

@section('content')


<div class="box"><br>
          <div class="col-md-4" style="float: right; font-size: 19px">
                  <div class="progress-group">
                    <span class="progress-text">Vagas diponível:  {{$por}} de {{$turma->qtdVaga}}</span>
                    <span class="progress-number"><b></span>
                    
                  </div>
                </div>
        <div class="box-header with-border">
        
          <h3 class="box-title">Turma: {{ $turma->nomTurma }} - {{ $turma->turno }}</h3>
          <h4>Professor: {{ $turma->colaboradores->nomCol }}</h4>
          <h4>Auxiliar: {{ $turma->auxiliar }}</h4>          
          <h4>Total de alunos: {{ $tt }}</h4>          
          <a class="btn btn-primary pull-right" type="button" href="{{ route('turma.print', ['nomTurma'=> $turma->nomTurma, 'id'=> $turma->id, 'nomCol'=> $turma->nomCol])}}" target="_blank"><i class="fa fa-print"></i></a>
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Matricular Aluno
              </button>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tbody><tr>
              <th style="width: 10px">Mat</th>
              <th>Nome</th>
              <th>Resposavel</th>
              <th>Celular</th>           
              <th>Turno</th>
              <th>Ações</th>
            </tr>
            @foreach ($alunos as $aluno)
       
            <tr>     


                
                  @if (empty($aluno->obsH))
                  <td>{{ $aluno->matricula }}</td>
                  <td>{{ $aluno->nome }} <br> {{ $aluno->obsH }}</td>
                  <td>{{ $aluno->responsavel }}</td>
                  <td>{{ $aluno->fone }}</td>
                  <td>{{ $turma->turno }}</td>
                
                <td style="width 10px;width: 157px;">
                    <div style="display: inline;" class="dropdown">
                        <a  class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-print"></i></a>
                        
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{action('AlunoController@ficha', [$aluno->id])}}" type="button">Ficha de requerimento</a>
                            <a class="dropdown-item" href="{{action('AlunoController@registro', [$aluno->id])}}" type="button">Ficha de registro</a>
                          </div>
                        </div>
                      </div>
                      <a href="{{action('AlunoController@edit', [$aluno->id])}}" type="button" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                      <a href="{{action('TurmaController@destroyAluno', [$turma->id, $aluno->id])}}" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                  </td>

                  @else
              <td style="background-color: red !important">{{ $aluno->matricula }}</td>
              <td style="background-color: red !important">{{ $aluno->nome }} <br> {{ $aluno->obsH }}</td>
              <td style="background-color: red !important">{{ $aluno->responsavel }}</td>
              <td style="background-color: red !important ">{{ $aluno->fone }}</td>
              <td style="background-color: red !important">{{  $turma->turno }}</td>
              
              <td style="width 8px;width: 90px;">
                  <div style="display: inline;" class="dropdown">
                      <a  class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-print"></i></a>
                      
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="{{action('AlunoController@ficha', [$aluno->id])}}" type="button">Ficha de requerimento</a>
                          <a class="dropdown-item" href="{{action('AlunoController@registro', [$aluno->id])}}" type="button">Ficha de registro</a>
                        </div>
                      </div>
                    </div>
                    <a href="{{action('AlunoController@edit', [$aluno->id])}}" type="button" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                    <a href="{{action('TurmaController@destroyAluno', [$turma->id, $aluno->id])}}" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>               
                
                @endif()
            @endforeach ()
             </td>
            </tr>
           
          </tbody></table>

          <div class="modal fade" id="modal-default" style="display: none;">
          <form class="form-inline" method="post" action="{{ route('addAluno', $turma->id) }}">
                  {!! csrf_field() !!}
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
          <h3 class="box-title">Turma: {{ $turma->nomTurma }} - {{ $turma->turno }} - {{ $turma->id }}</h3>
                <h4 class="modal-title">Matricular Aluno</h4>
              </div>
              <div class="modal-body">
              <div class="form-group">
            <label class="col-sm-4 control-label">Alunos</label>
            <div  class="col-sm-8">
                    <select style="width: 250px;" class="js-example-basic-multiple form-control" name="aluno_id">
                        <option></option>
                        @foreach ($todos as $aluno)                           
                        <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                        @endforeach
                      
                    </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      
        </div>
      </div>

      <script src="/js/jquery.js"></script>
  <script src="/select2/dist/js/select2.min.js"></script>
  <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
</script>
<script>
  $( function() {
    $( "#progressbar" ).progressbar({
      value: {{$turma->qtdVaga}}
    });
  } );
  </script>
@stop