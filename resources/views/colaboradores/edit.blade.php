@extends('adminlte::page')

@section('title', 'SISGE | Beta')

@section('content_header')
    <h1>Cadastro de Colaboradores</h1>
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

<div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Dados do Colaborador</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="{{ route('colab.update', $colab['id']) }}" enctype="multipart/form-data">
            {!! csrf_field() !!}
      <div class="box-body">
        
        <div class="form-group">
          <label for="nome" class="col-sm-2 control-label">Nome:</label>
          <div class="col-sm-6">
            <input value="{{ $colab->nomCol }}"  type="text" class="form-control" id="funcao_nome" name="nomCol" placeholder="Nome" required>
          </div>
          <label class="col-sm-1 control-label">Status:</label>
                      <div class="col-sm-2">
                        <select class="form-control" class="col-sm-2" name="flag">
                            <option value="{{ $colab->flag }}">{{ $colab->flag }}</option>
                            <option>Inativo</option>
                            <option>Ativo</option>
                        </select>   
                      </div>
        </div>
        <div class="form-group">
                <label class="col-sm-2 control-label">Data de nascimento:</label>
            <div class="col-sm-2">
                <input value="{{ $colab->dtaNasc }}" id="dtaNasc" name="dtaNasc" type="date" class="form-control"  maxlength="20" required>
            </div>

                <label class="col-sm-1 control-label">Sexo:</label>
                <div  class="col-sm-2">
                    <select class="form-control" class="col-sm-2" name="sexo">
                        <option>{{ $colab->sexo }}</option>
                        <option>Masculino</option>
                        <option>Feminino</option>
                    </select>
                </div>

                <label class="col-sm-1 control-label">Cor:</label>
                <div  class="col-sm-2">
                    <select class="form-control" class="col-sm-2" name="corCol">
                        <option>{{ $colab->corCol }}</option>
                        <option>Negro</option>
                        <option>Branco</option>
                        <option>Pardo</option>
                    </select>
                </div>                     
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Estado Civil:</label>
                <div class="col-sm-2">
                    <select class="col-sm-2 form-control" name="estCivil" id="">
                        <option>{{ $colab->estCivil }}</option>
                        <option>Casado(a)</option>
                        <option>Solteiro(a)</option>
                        <option>Divorciado(a)</option>
                    </select>
                </div>

                <label class="col-sm-3 control-label">Grau de Instrução:</label>
                <div class="col-sm-3">
                    <input value="{{ $colab->gInst }}" id="gInst" name="gInst" type="text" class="form-control"  maxlength="20" required>
                </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Identidade:</label>
            <div class="col-sm-2">
                <input  value="{{ $colab->rg }}" id="rg" name="rg" type="text" class="form-control"  maxlength="20" required>
            </div>

            <label class="col-sm-2 control-label">Órg. Emissor:</label>
            <div class="col-sm-2">
                <input value="{{ $colab->orgEmis }}" id="orgEmis" name="orgEmis" type="text" class="form-control"  maxlength="20" required>
            </div>

            <label class="col-sm-2 control-label">Data Emissão:</label>
            <div class="col-sm-2">
                <input value="{{ $colab->dtaEmis }}" id="dtaEmis" name="dtaEmis" type="date" class="form-control"  maxlength="20" required>
            </div>
        </div>

        <div class="form-group">
                <label class="col-sm-2 control-label">CPF:</label>
                <div class="col-sm-2">
                    <input value="{{ $colab->cpfCol }}" id="cpf" name="cpfCol" type="text" class="form-control"  maxlength="20" required>
                </div>
        </div>

        <div class="form-group">

                <label class="col-sm-2 control-label">CTPS:</label>
                <div class="col-sm-2">
                    <input value="{{ $colab->ctps }}" id="ctps" name="ctps" type="text" class="form-control"  maxlength="20" required>
                </div>

                <label class="col-sm-1 control-label">SÉRIE/UF:</label>
                <div class="col-sm-2">
                    <input value="{{ $colab->serie }}" id="serie" name="serie" type="text" class="form-control"  maxlength="20" required>
                </div>

                <label class="col-sm-2 control-label">Data Emissão:</label>
                <div class="col-sm-2">
                    <input value="{{ $colab->dtaCtps }}" id="dtaCtps" name="dtaCtps" type="date" class="form-control"  maxlength="20" required>
                </div>
        </div>

        <div class="form-group">
                <label class="col-sm-2 control-label">PIS:</label>
                <div class="col-sm-2">
                    <input value="{{ $colab->pis }}" id="pis" name="pis" type="text" class="form-control"  maxlength="20" required>
                </div>

                <label class="col-sm-1 control-label">T. Eleitor:</label>
                <div class="col-sm-2">
                    <input value="{{ $colab->tElei }}" id="tElei" name="tElei" type="text" class="form-control"  maxlength="20" required>
                </div>

                <label class="col-sm-1 control-label">ZONA:</label>
                <div class="col-sm-2">
                    <input value="{{ $colab->zona }}" id="zona" name="zona" type="text" class="form-control"  maxlength="20" required>
                </div>

                <label class="col-sm-1 control-label">Seção:</label>
                <div class="col-sm-1">
                    <input value="{{ $colab->secao }}" id="secao" name="secao" type="text" class="form-control"  maxlength="20" required>
                </div>               
        </div>
        <div class="form-group">
                <label class="col-sm-2 control-label">Data Admissão:</label>
                <div class="col-sm-2">
                    <input value="{{ $colab->dtaAdmi }}" id="dtaCtps" name="dtaAdmi" type="date" class="form-control"  maxlength="20" required>
                </div>

                <label class="col-sm-1 control-label">Cargo:</label>

        
                <div  class="col-sm-2">
                        <select class="form-control" class="col-sm-2" name="funcao_id">
                            <option value="{{ $colab->funcao->id }}">{{ $colab->funcao->funcao_nome }}</option>                              
                                
                            @foreach ($funcoes as $funcaos)                           
                            <option value="{{ $funcaos->id }}">{{ $funcaos->funcao_nome }}</option>
                            @endforeach

                            
                          
                        </select>
                    </div>       
                    
              
                
                
                <label class="col-sm-1 control-label">Salário:</label>
                <div class="col-sm-2 input-group">
                        <span class="input-group-addon" id="basic-addon1">R$</span>
                    <input value="{{ $colab->salario }}" id="rest" name="salario" type="text" class="form-control"  maxlength="20" required>
                </div>
            </div>
        

        <div class="box-header with-border">
                <h3 class="box-title">Filiação</h3>
              </div>
        </div>

      <div class="box-body">
            <div class="form-group">
              <label for="nome" class="col-sm-2 control-label">Nome do Pai</label>
    
              <div class="col-sm-10">
                <input value="{{ $colab->nomPai }}" type="text" class="form-control" id="nomPai" name="nomPai" placeholder="">
              </div>
            </div>

           
        
            <div class="form-group">
                      <label for="nome" class="col-sm-2 control-label">Nome da Mãe:</label>
            
                      <div class="col-sm-10">
                        <input value="{{ $colab->nomMae }}" type="text" class="form-control" id="nomMae" name="nomMae" placeholder="">
                      </div>
            </div>                   
        </div>

            
                    <div class="box-header with-border">
                            <h3 class="box-title">Endereço</h3>
                    </div>

                      <div class="boxy-body">
                        <div class="form-group">        
                            <label class="col-sm-2 control-label">CEP:</label>
                            <div class="col-sm-2">
                                <input value="{{ $colab->cep }}" type="text" class="form-control" name="cep" id="cep" placeholder="00.000-000" required>
                            </div>
                        </div>    
                                
                           
                       <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Endereço:</label>
                
                          <div class="col-sm-4">
                            <input value="{{ $colab->endCol }}" type="text" class="form-control" id="logradouro" name="endCol" placeholder="" required>
                          </div>
                
                          <label for="inputPassword3" class="col-sm-1 control-label">N:</label>
                
                          <div class="col-sm-1">
                            <input value="{{ $colab->numCasa }}" type="text" class="form-control" id="" name="numCasa" placeholder="" required>
                          </div>
                
                          <label for="inputPassword3" class="col-sm-2 control-label">Bairro</label>
                
                          <div class="col-sm-2">
                            <input value="{{ $colab->bairro }}" type="text" class="form-control" id="bairro" name="bairro" placeholder="" required>
                          </div>
                
                          
                
                        </div>
                          <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Complemento:</label>                      
                                <div class="col-sm-10">
                                  <input value="{{ $colab->comp }}" type="text" class="form-control" id="comp" name="comp" placeholder="Complemento">
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Local:</label>
                            <div class="col-sm-4">
                                <input value="{{ $colab->cidade }}" type="text" class="form-control" name="cidade" id="cidade" required>
                            </div>
                            <label class="col-sm-2 control-label">UF:</label>
                            <div class="col-sm-2">
                                <input value="{{ $colab->uf }}" type="text" class="form-control" name="uf" id="uf" required>
                            </div>
                        </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2">Telefone:</label>
                      <div class="col-sm-4">
                        <input value="{{ $colab->tel }}" type="tel" name="tel" id="fone" class="form-control" placeholder="(00)0000-0000">
                      </div>
                      <label class="control-label col-sm-2">Celular:</label>
                      <div class="col-sm-4">
                        <input value="{{ $colab->cel }}" type="text" name="cel" id="cel" class="form-control" placeholder="(99)9999-9999">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2">E-mail:</label>
                      <div class="col-sm-6">
                        <input value="{{ $colab->email }}" type="text" class="form-control" name="email">
                      </div>
                    </div>
                </div>

                <div class="box-header with-border">
                        <h3 class="box-title">Contrato de trabalho</h3>
                      </div>
       
                      <div class="box-body">
        
                            <div class="form-group">
                              <label for="nome" class="col-sm-3 control-label">Recebe seguro desemprego?</label>
                              <div class="col-sm-2">
                                    <select class="form-control" class="col-sm-2" name="seguro">
                                               <option selected>{{ $colab->seguro }}</option>                                                                                          
                                                <option>SIM</option>
                                                <option >NÃO</option>
                                            
                                            
                                        </select>
                                </div>
                                    
                                    
                                    <label class="col-sm-3 control-label">Contrato de experiência:</label>
                                    <div class="col-sm-1 input-group">
                                            <input value="{{ $colab->contExp }}" type="text" name="contExp" class="form-control" aria-describedby="basic-addon2" maxlength="2">
                                            <span class="input-group-addon" id="basic-addon2">dias</span>
                                    </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Regime de trabalho</label>
                                  <div class="col-sm-2">
                                        <select class="form-control" class="col-sm-2" name="regTrab">
                                                <option>{{ $colab->regTrab }}</option>
                                                <option>NORMAL - De 2a a 6a Feira </option>
                                                <option>NORMAL - De 2 a a Sábado</option>
                                                <option>OUTROS</option>
                                                
                                            </select>
                                    </div>
                              </div>
                            </div>

                            <div class="box-header with-border">
                                    <h3 class="box-title">Horário de trabalho</h3>
                                  </div>
                   
                                  <div class="box-body">

                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">Entrada:</label>
                                          <div class="col-sm-1">
                                              <input value="{{ $colab->hEnt }}" type="text"  class="form-control" name="hEnt" id="hr">
                                          </div>

                                          <label class="col-sm-2 control-label">Saida:</label>
                                          <div class="col-sm-1">
                                              <input value="{{ $colab->hSai }}" type="text" class="form-control" name="hSai" id="hrs">
                                          </div>

                                          <label class="col-sm-2 control-label">Horário de Almoço:</label>
                                          <div class="col-sm-1">
                                              <input value="{{ $colab->hAlmo }}" type="text" class="form-control" name="hAlmo" id="hra">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">Folga semenal: </label>
                                          <div class="col-sm-2">
                                              <input value="{{ $colab->folga }}" type="text" class="form-control" name="folga" id="folga">
                                          </div>
                                      </div>

                                  </div>

                                  <div class="box-header with-border">
                                    <h3 class="box-title">Ficha de Anamnese</h3>
                                  </div>
                   
                                  <div class="box-body">

                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">Anamnese:</label>
                                          <div class="col-sm-1">
                                                <input type="file" name="amCol">                                                
                                          </div>
                                    </div>
                                    <a href="/storage/{{$colab->amCol}}" class="btn btn-primary pull-left" type="button" target="_blank" style="margin-left: 250px;">Visualizar Ficha de Anamnese   <i class="fa fa-eye"></i></a>
                                    </div>
              
                    
                                                
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary pull-right">Atualizar</button>
        <a class="btn btn-default pull-rigth" type="button" href="{{ url('colaboradores/lista')}}">Cancelar</a>
      </div>
      <!-- /.box-footer -->
    </form>  


    <script src="/js/jquery.js"></script> 
    <script type="text/javascript" src="/js/jquery.mask.js"></script>
    <script type="text/javascript" src="/js/cep.js"></script>
    <script type="text/javascript">$("#fone").mask("(00) 0000-00009");</script>
    <script type="text/javascript">$("#cel").mask("(00) 0000-00009");</script>
    <script type="text/javascript">$("#cep").mask("00.000-000");</script>
    <script type="text/javascript">$("#cpf").mask("000.000.000-00");</script>
    <script type="text/javascript">$("#cpf_mae").mask("000.000.000-00");</script>
    <script type="text/javascript">$("#nasc").mask("00/00/0000");</script>
    <script type="text/javascript">$("#matricula").mask("0000");</script>
    <script type="text/javascript">$("#salario").mask('000.000.000.000.000,00', {reverse: true});</script>
    <script type="text/javascript">$("#hr").mask('00:00');</script>
    <script type="text/javascript">$("#hrs").mask('00:00');</script>
    <script type="text/javascript">$("#hra").mask('00:00');</script>
    <script type="text/javascript">$("#folga").mask('00:00');</script>

    
   



  
@stop