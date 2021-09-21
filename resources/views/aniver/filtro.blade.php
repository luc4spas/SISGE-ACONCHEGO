@extends('adminlte::page')

@section('title', 'SISGE | Beta')

@section('content_header')
    <h1>Aniversariantes</h1>

    <form class="form-inline" method="post" action="{{ route('aniv.filtro')}}">
        {!! csrf_field() !!}
      <select type="text" class="form-control" placeholder="N. Matricula" name="mes" >                        
                        <option>{{date('M')}}</option>
                        <option value= 1>Janeiro</option>
                        <option value="2">Fevereiro</option>
                        <option value="3">Março</option>
                        <option value="4">Abril</option>
                        <option value="5">Maio</option>
                        <option value="6">Junho</option>
                        <option value="7">Julho</option>
                        <option value="8">Agosto</option>
                        <option value="9">Setembro</option>
                        <option value="10">Outubro</option>
                        <option value="11">Novembro</option>
                        <option value="12">Dezembro</option>
      </select>
      <button type="submit" class="btn btn-primary">Pesquisar</button>
    </form>

@stop

@section('content')
<div class="row">
    <div class="col-lg-8 col-xs-6">
        <div class="box box-info collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Alunos - Aniversariantes</h3>
  
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Data Nascimetno</th>
                    <th>Contato</th>
                    <th>Turma</th>
                  </tr>
                  </thead>
                 
                  <tbody>
                      @foreach ($alunoB as $item)
                    <tr>
                        <td>{{ $item->nome }}</td>
                        <td>{{ date( 'd/m/Y' , strtotime ($item->dta_nasc)) }}</td>
                        <td>{{ $item->cel }}</td>
                        <td>{{ $item->turma }}</td>
                        @endforeach ()
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                
                        
                   
                  
           
          
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a class="btn btn-primary pull-right" type="button" href="{{ action('AniverController@printAluno')}}" target="_blank"><i class="fa fa-print"></i></a>
            </div>
            <!-- /.box-footer -->
          </div>
    </div>
</div>

          <div class="row">
            <div class="col-lg-8 col-xs-6">
                <div class="box box-info collapsed-box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Pais - Aniversariantes</h3>
          
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="table-responsive">
                        <table class="table no-margin">
                          <thead>
                          <tr>
                            <th>Nome</th>
                            <th>Data Nascimetno</th>
                            <th>Contato</th>
                            <th>Aluno(a)</th>
                          </tr>
                          </thead>
                         
                          <tbody>
                              @foreach ($paiB as $pai)
                            <tr>
                                <td>{{ $pai->nome_pai }}</td>
                                <td>{{ date( 'd/m/Y' , strtotime ($pai->nasc_pai)) }}</td>
                                <td>{{ $pai->cel }}</td>
                                <td>{{ $pai->nome }}</td>
                                @endforeach ()
                              </tr>
                              </tbody>
                            </table>
                          </div>
                          <!-- /.table-responsive -->
                        
                                
                           
                          
                   
                  
                      <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                      <a class="btn btn-primary pull-right" type="button" href="{{ action('AniverController@printPais')}}" target="_blank"><i class="fa fa-print"></i></a>
                    </div>
                    <!-- /.box-footer -->
                  </div>
            </div>
          </div>

                  <div class="row">
                    <div class="col-lg-8 col-xs-6">
                        <div class="box box-info collapsed-box">
                            <div class="box-header with-border">
                              <h3 class="box-title">Mães - Aniversariantes</h3>
                  
                              <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                              </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                              <div class="table-responsive">
                                <table class="table no-margin">
                                  <thead>
                                  <tr>
                                    <th>Nome</th>
                                    <th>Data Nascimetno</th>
                                    <th>Contato</th>
                                    <th>Aluno(a)</th>
                                  </tr>
                                  </thead>
                                 
                                  <tbody>
                                      @foreach ($maeB as $mae)
                                    <tr>
                                        <td>{{ $mae->nome_mae }}</td>
                                        <td>{{ date( 'd/m/Y' , strtotime ($mae->nasc_mae)) }}</td>
                                        <td>{{ $mae->cel }}</td>
                                        <td>{{ $mae->nome }}</td>
                                        @endforeach ()
                                      </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                  <!-- /.table-responsive -->
                                
                                        
                                   
                                  
                           
                          
                              <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix">
                              <a class="btn btn-primary pull-right" type="button" href="{{ action('AniverController@printMae')}}" target="_blank"><i class="fa fa-print"></i></a>
                            </div>
                            <!-- /.box-footer -->
                          </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-8 col-xs-6">
                        <div class="box box-info collapsed-box">
                            <div class="box-header with-border">
                              <h3 class="box-title">Colaboradores - Aniversariantes</h3>
                  
                              <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                              </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                              <div class="table-responsive">
                                <table class="table no-margin">
                                  <thead>
                                  <tr>
                                    <th>Nome</th>
                                    <th>Data Nascimetno</th>
                                    <th>Contato</th>
                                    <th>Admissão</th>
                                  </tr>
                                  </thead>
                                 
                                  <tbody>
                                      @foreach ($colB as $colab)
                                    <tr>
                                        <td>{{ $colab->nomCol }}</td>
                                        <td>{{ date( 'd/m/Y' , strtotime ($colab->dtaNasc)) }}</td>
                                        <td>{{ $colab->cel }}</td>
                                        <td>{{ date( 'd/m/Y' , strtotime ($colab->dtaAdmi)) }}</td>
                                        @endforeach ()
                                      </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                  <!-- /.table-responsive -->
                                
                                        
                                   
                                  
                           
                          
                              <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix">
                              <a class="btn btn-primary pull-right" type="button" href="{{ action('AniverController@printColab')}}" target="_blank"><i class="fa fa-print"></i></a>
                            </div>
                            <!-- /.box-footer -->
                          </div>
                    </div>
                  </div>

@stop