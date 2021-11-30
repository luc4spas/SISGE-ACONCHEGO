@extends('adminlte::page')

@section('title', 'SISGE | Beta')

@section('content_header')
    <h1>Cadastro Aluno</h1>
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
      <h3 class="box-title">Dados do Aluno</h3>
    </div>
  
    <form class="form-horizontal" method="post" action="{{ route('aluno.store') }}" enctype="multipart/form-data">
            {!! csrf_field() !!}
      <div class="box-body">
          <div class="col-sm-12">
              <img src="/uploads/avatars/default.png" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;"><br><br><br>
              <label>Update imagem</label>
              <input type="file" name="image">
          </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Nº Matrícula:</label>
            <div class="col-sm-2">
            
                <input type="text" class="form-control" name="matricula" id="matricula" required>
              
            </div>
            <label class="col-sm-2 control-label">Status:</label>
                      <div class="col-sm-2">
                        <select class="form-control" class="col-sm-2" name="status">
                          <option></option>
                          <option>Ativo</option>
                          <option>Inativo</option>
                      </select>
                      </div>
                      <label class="col-sm-2 control-label">Data de Matícula:</label>
                          <div class="col-sm-2">
                        <input id="nasc" name="dta_mat" type="date" class="form-control data-mask" data-mask="00/00/0000" maxlength="10" autocomplete="off" required>
                </div>
        </div>
        <div class="form-group">
          <label for="nome" class="col-sm-2 control-label">Nome do Aluno:</label>

          <div class="col-sm-10">
            <input  type="text" class="form-control" id="funcao_nome" name="nome" placeholder="Nome" required>
          </div>
        </div>
        <div class="form-group">
                <label class="col-sm-2 control-label">Data de Nascimento:</label>
                <div class="col-sm-4">
                        <input id="nasc" name="dta_nasc" type="date" class="form-control data-mask" data-mask="00/00/0000" maxlength="10" autocomplete="off" required>
                </div>

                <label class="col-sm-1 control-label">Sexo:</label>
                <div  class="col-sm-2">
                    <select class="form-control" class="col-sm-2" name="sexo">
                        <option></option>
                        <option>Masculino</option>
                        <option>Feminino</option>
                    </select>
                </div>

                <label class="col-sm-1 control-label">Cor:</label>
                <div  class="col-sm-2">
                    <select class="form-control" class="col-sm-2" name="cor">
                        <option></option>
                        <option>Negro</option>
                        <option>Branco</option>
                        <option>Pardo</option>
                    </select>
                </div>          
                
        </div>
        <div class="form-group">
            <label for="nome" class="col-sm-2 control-label">Turma:</label>      
            <div class="col-sm-6">
              <select class="form-control" class="col-sm-2" name="turma">
                  <option></option>
                @foreach ($turmas as $item)                  
                  <option value="{{ $item->id }}">{{ $item->nomTurma }} - {{ $item->turno }}</option>
                @endforeach
            </select>
            </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Observações: </label>
      <div class="col-sm-6">
          <input  type="text" class="form-control" id="funcao_nome" name="obsH" placeholder="Obersações">
      </div>
    </div>
    

        
        <div class="box-header with-border">
            <h3 class="box-title">Endereço</h3>
          </div>
          <br>
        <div class="form-group">        
            <label class="col-sm-2 control-label">CEP:</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="cep" id="cep" placeholder="00.000-000" required>
            </div>
        </div>    
                
           
       <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Endereço:</label>

          <div class="col-sm-4">
            <input type="text" class="form-control" id="logradouro" name="endereco" placeholder="" required>
          </div>

          <label for="inputPassword3" class="col-sm-1 control-label">N:</label>

          <div class="col-sm-1">
            <input type="text" class="form-control" id="" name="numero" placeholder="" required>
          </div>

          <label for="inputPassword3" class="col-sm-2 control-label">Bairro</label>

          <div class="col-sm-2">
            <input type="text" class="form-control" id="bairro" name="bairro" placeholder="" required>
          </div>

        </div>
          <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Complemento:</label>
      
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="obs" name="obs" placeholder="Complemento">
                </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Local:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="cidade" id="cidade" required>
            </div>
            <label class="col-sm-2 control-label">UF:</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="uf" id="uf" required>
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
                <input  type="text" class="form-control" id="funcao_nome" name="nome_pai" placeholder="">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Data de Nascimento Pai:</label>
              <div class="col-sm-2">
                  <input type="date" class="form-control" name="nasc_pai" id="nasc">
              </div>
              <label class="col-sm-2 control-label">CPF Pai:</label>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="cpf_pai" id="cpf">
              </div>
              <label class="col-sm-2 control-label">Profissão:</label>
                      <div class="col-sm-2">
                          <input type="text" class="form-control" name="prof_pai" id="">
                      </div>
            </div>
        
            <div class="form-group">
                      <label for="nome" class="col-sm-2 control-label">Nome da Mãe:</label>
            
                      <div class="col-sm-10">
                        <input  type="text" class="form-control" id="funcao_nome" name="nome_mae" placeholder="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Data de Nascimento Mãe:</label>
                      <div class="col-sm-2">
                          <input type="date" class="form-control" name="nasc_mae" id="nasc">
                      </div>
                      <label class="col-sm-2 control-label">CPF Mãe:</label>
                      <div class="col-sm-2">
                          <input type="text" class="form-control" name="cpf_mae" id="cpf_mae">
                      </div>
                      <label class="col-sm-2 control-label">Profissão:</label>
                      <div class="col-sm-2">
                          <input type="text" class="form-control" name="prof_mae" id="">
                      </div>
                    </div>

                    <hr>

                    <div class="form-group">
                            <label for="nome" class="col-sm-2 control-label">Responsável Financeiro:</label>
                  
                            <div class="col-sm-10">
                              <input  type="text" class="form-control" name="responsavel" placeholder="" required>
                            </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2">Telefone:</label>
                      <div class="col-sm-4">
                        <input type="tel" name="fone" id="fone" class="form-control" placeholder="(00)0000-0000">
                      </div>
                      <label class="control-label col-sm-2">Celular:</label>
                      <div class="col-sm-4">
                        <input type="text" name="cel" id="cel" class="form-control" placeholder="(99)9999-9999">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2">E-mail:</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="email">
                      </div>
                    </div>

                    
                    
                    <div class="form-group">
                            <label for="nome" class="col-sm-2 control-label">Profissão</label>
                  
                            <div class="col-sm-4">
                              <input  type="text" class="form-control" id="funcao_nome" name="profissao" placeholder="" required>
                            </div>

                            <label for="nome" class="col-sm-2 control-label">Nacionalidade</label>
                  
                            <div class="col-sm-4">
                              <input  type="text" class="form-control" id="funcao_nome" name="nacionalidade" placeholder="" required>
                            </div>
                      </div>

                      <div class="box-header with-border">
                                    <h3 class="box-title">Ficha de Anamnese</h3>
                                  </div>
                   
                                  <div class="box-body">

                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">Anamnese:</label>
                                          <div class="col-sm-1">
                                                <input type="file" name="amAl">                                                
                                          </div>
                                    </div>
                                    </div>
                                                

      <div class="box-footer">
        <button type="submit" class="btn btn-primary pull-right">Salvar</button>
        <a class="btn btn-default pull-rigth" type="button" href="{{ url('aluno')}}">Cancelar</a>
      </div>
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

  </div>



  
@stop