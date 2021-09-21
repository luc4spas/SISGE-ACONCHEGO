@extends('adminlte::page')

@section('title', 'SISGE | Beta')

@section('content_header')
    <h1>Anamnese</h1>
@stop

@section('content')
<link href="{{ asset('/js/iCheck/square/blue.css') }}" rel="stylesheet">

<div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Identificação</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="{{ route('anamnese') }}">
            {!! csrf_field() !!}
            <div class="box-body">
                <div class="form-group">
                  <label for="nome" class="col-sm-2 control-label">Nome do Aluno:</label>
        
                  <div class="col-sm-4">
                    <input  type="text" class="form-control" id="funcao_nome" name="nome" placeholder="Nome" required>
                  </div>

                  <label for="sexo" class="col-sm-1 control-label">Sexo:</label>
                  <div class="col-sm-2">
                      <input type="text" class="form-control" name="sexo">
                  </div>
                </div>

                <div class="form-group">
                    <label for="dta_nasc" class="col-sm-2 control-label">Data de nascimento:</label>

                    <div class="col-sm-4">
                        <input type="text" name="dta_nasc" class="form-control">
                    </div>

                    <label for="cidade" class="col-sm-1 contol-label">Cidade/UF:</label>

                    <div class="col-sm-4">
                        <input type="text" name="cidade" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label">Nome do Pai:</label>
          
                    <div class="col-sm-4">
                      <input  type="text" class="form-control" id="funcao_nome" name="nome" placeholder="Nome" required>
                    </div>
                  </div>
  
                  <div class="form-group">
                      <label for="dta_nasc" class="col-sm-2 control-label">Data de nascimento:</label>
  
                      <div class="col-sm-4">
                          <input type="text" name="dta_pai" class="form-control">
                      </div>
  
                      <label for="cidade" class="col-sm-1 contol-label">Profissão:</label>
  
                      <div class="col-sm-4">
                          <input type="text" name="prof_pai" class="form-control">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label">Nome da Mãe:</label>
          
                    <div class="col-sm-4">
                      <input  type="text" class="form-control" id="funcao_nome" name="nome" placeholder="Nome da Mãe" required>
                    </div>
                  </div>
  
                  <div class="form-group">
                      <label for="dta_nasc" class="col-sm-2 control-label">Data de nascimento:</label>
  
                      <div class="col-sm-4">
                          <input type="text" name="dta_mae" class="form-control">
                      </div>
  
                      <label for="cidade" class="col-sm-1 contol-label">Profissão:</label>
  
                      <div class="col-sm-4">
                          <input type="text" name="prof_mae" class="form-control">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Quantidades de irmãos?</label>

                      <div class="col-sm-2">
                          <input type="text" name="qtd_irmao" class="font-control">
                      </div>
                  </div>

                  <div class="box-header with-border">
                    <h3 class="box-title">1- Dados Iniciais da vida do Aluno</h3>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-4 control-label">1.1 - A gravidez do seu (sua) filho (a) foi planejada?</label>
                     
                        <div class="radio">
                          <label class="col-sm-1 control-label">
                            <input type="radio" name="optionsRadios" id="" value="SIM">
                           SIM
                          </label>
                       
                      
                            <label class="col-sm-1 control-label">
                            <input type="radio" name="optionsRadios" id="" value="NÃO">
                           NÃO
                          </label>
                        </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">1.2 - Algum problema emocional ou físico durante a gravidez?</label>
                   
                      <div class="radio">
                        <label class="col-sm-1 control-label">
                          <input type="radio" name="1.2" id="" value="SIM" >
                         SIM
                        </label>
                     
                    
                          <label class="col-sm-1 control-label">
                          <input type="radio" name="1.2" id="" value="NÃO">
                         NÃO
                        </label>
                      </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">1.3 - Algum problema incomum no parto?</label>
                   
                      <div class="radio">
                        <label class="col-sm-1 control-label">
                          <input type="radio" name="1.3" id="" value="SIM" >
                         SIM
                        </label>
                     
                    
                          <label class="col-sm-1 control-label">
                          <input type="radio" name="1.3" id="" value="NÃO">
                         NÃO
                        </label>
                      </div>
                </div>

                <div class="box-header with-border">
                    <h3 class="box-title">2- Sono:</h3>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">2.1 - Seu (sua) filho (a) tem sono tranquilo?</label>
                   
                      <div class="radio">
                        <label class="col-sm-1 control-label">
                          <input type="radio" name="2.1" id="" value="SIM" >
                         SIM
                        </label>
                     
                    
                          <label class="col-sm-1 control-label">
                          <input type="radio" name="2.1" id="" value="NÃO">
                         NÃO
                        </label>
                      </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">2.2 - Quantas horas dorme por noite?</label>
                    <div class="col-sm-2">
                        <input type="text" name="horas_dorme" class="font-control">
                    </div>
                </div>

                <div class="box-header with-border">
                    <h3 class="box-title">3 - Desenvolvimento psicomotor:</h3>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">3.1 - Seu (Sua) filho (a) engatinhou?</label>
                   
                      <div class="radio">
                        <label class="col-sm-1 control-label">
                          <input type="radio" name="3.1" id="" value="SIM" >
                         SIM
                        </label>
                     
                    
                          <label class="col-sm-1 control-label">
                          <input type="radio" name="3.1" id="" value="NÃO">
                         NÃO
                        </label>
                      </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">3.1.1 - Ficou em “cercadinho”?</label>
                   
                      <div class="radio">
                        <label class="col-sm-1 control-label">
                          <input type="radio" name="3.1.1" id="" value="SIM" >
                         SIM
                        </label>
                     
                    
                          <label class="col-sm-1 control-label">
                          <input type="radio" name="3.1.1" id="" value="NÃO">
                         NÃO
                        </label>
                      </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">3.1.2 - Fez uso de andador?</label>
                   
                      <div class="radio">
                        <label class="col-sm-1 control-label">
                          <input type="radio" name="3.1.2" id="" value="SIM" >
                         SIM
                        </label>
                     
                    
                          <label class="col-sm-1 control-label">
                          <input type="radio" name="3.1.2" id="" value="NÃO">
                         NÃO
                        </label>
                      </div>
                </div>

                <div class="Form-group">
                    <label class="col-sm-4 control-label">3.3 - Que mão utiliza com mais freqüência?</label>
                    <label class="col-sm-2 control-label">
                        <input type="radio" name="3.1.2" id="" value="ESQUERDA" >
                       ESQUERDA
                      </label>
                   
                  
                        <label class="col-sm-1 control-label">
                        <input type="radio" name="3.1.2" id="" value="DIREITA">
                       DIREITA
                      </label>
                    </div>
                  </div>
              
                <div class="Form-group">
                  <label class="col-sm-4 control-label">3.2 Andou com que idade?</label>
                  <div class="col-sm-2">
                      <input type="text" name="idade_andou" class="font-control">
                  </div>

                  <label class="col-sm-2 control-label">Caía muito?</label>
                  <div class="col-sm-2">
                      <input type="text" name="caia" class="font-control">
                  </div>               
                </div>

                
               
    
                

                


              </div>
             

  
    </form>

</div>
    
    <script src="/js/iCheck/icheck.js"></script> 

@stop