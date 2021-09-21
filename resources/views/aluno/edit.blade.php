@extends('adminlte::page')

@section('title', 'SISGE | Beta')

@section('content_header')
    <h1>Alunos</h1>
@stop

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Dados do Aluno</h3>
      
    </div>


    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ route('aluno.update', $alunos['id']) }}">
            {!! csrf_field() !!}
      <div class="box-body">
        <div class="form-group">
          <div class="col-sm-12">
            <img src="/uploads/avatars/{{ $alunos->image }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;"><br><br><br>
            <label>Update Profile Image</label>
            <input type="file" name="image">
        </div>
      </div>
          <div class="form-group">
              <label class="col-sm-2 control-label">Nº Matrícula:</label>
              <div class="col-sm-2">
                  <input value="{{ $alunos->matricula }}" type="text" class="form-control" name="matricula" id="matricula" required>
              </div>
            
                  <label class="col-sm-2 control-label">Status:</label>
                      <div class="col-sm-2">
                        <select class="form-control" class="col-sm-2" name="status">
                          <option value="{{ $alunos->status }}">{{ $alunos->status }}</option>
                          <option>Ativo</option>
                          <option>Inativo</option>
                      </select>
                      </div>
                      <label class="col-sm-2 control-label">Data de Matícula:</label>
                          <div class="col-sm-2">
                        <input value="{{ $alunos->dta_mat }}" id="mat" name="dta_mat" type="date" class="form-control data-mask" required>
                </div>
          </div>
        <div class="form-group">
          <label for="nome" class="col-sm-2 control-label">Nome do Aluno:</label>

          <div class="col-sm-10">
            <input value="{{ $alunos->nome }}" type="text" class="form-control" id="funcao_nome" name="nome" placeholder="Nome" required>
          </div>
        </div>
        <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Data de Nascimento:</label>
                <div class="col-sm-4">
                    
                        <input value="{{ $alunos->dta_nasc }}" name="dta_nasc" type="date" class="form-control" required>
                        
                </div>

                <label class="col-sm-1 control-label">Sexo:</label>
                <div  class="col-sm-2">
                    <select class="form-control" class="col-sm-2" name="sexo">
                        @if ($alunos->sexo == 'Masculino')                        
                        <option selected>Masculino</option>
                        <option>Feminino</option>  
                      @else
                        <option selected>Feminino</option>
                        <option>Masculino</option>
                      @endif                       
                        
                    </select>
                </div>

                <label class="col-sm-1 control-label">Cor:</label>
                <div  class="col-sm-2">
                    <select class="form-control" class="col-sm-2" name="cor">
                      @if($alunos->cor =='Negro')
                        <option selected>Negro</option>
                        <option>Branco</option>
                        <option>Pardo</option>
                        <option>Indigena</option>
                        <option>Amarelo</option>
                      @elseif($alunos->cor =='Branco')
                        <option selected>Branco</option>
                        <option>Pardo</option>
                        <option>Negro</option>
                        <option>Indigena</option>
                        <option>Amarelo</option>
                      @elseif($alunos->cor =='Pardo')
                        <option selected>Pardo</option>
                        <option>Negro</option>
                        <option>Branco</option>
                        <option>Indigena</option>
                        <option>Amarelo</option>
                      @elseif($alunos->cor =='Indigena')
                        <option selected>Indigena</option>
                        <option>Negro</option>
                        <option>Branco</option>
                        <option>Pardo</option>
                        <option>Amarelo</option>
                      @else
                        <option selected>Amarelo</option>
                        <option>Negro</option>
                        <option>Branco</option>
                        <option>Pardo</option>
                        <option>indigena</option>
                        @endif

                    </select>
                </div>
            
                
        </div>
        <div class="form-group">
            <label for="nome" class="col-sm-2 control-label">Turma:</label>
  
            <div class="col-sm-10">
              <input value="{{ $alunos->turma }}" type="text" class="form-control" name="turma" placeholder="" required>
            </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-2 control-label">Observações: </label>
        <div class="col-sm-6">
            <input value="{{ $alunos->obsH }}" type="text" class="form-control" id="" name="obsH" placeholder="Obersações">
        </div>
      </div>
              
        <div class="box-header with-border">
            <h3 class="box-title">Endereço</h3>
          </div>
          <br>

        <div class="form-group">
            <label class="col-sm-2 control-label">Local:</label>
            <div class="col-sm-4">
                <input value="{{ $alunos->cidade }}" type="text" class="form-control" name="cidade" required>
            </div>
            <label class="col-sm-2 control-label">UF:</label>
            <div class="col-sm-2">
                <input value="{{ $alunos->uf }}" type="text" class="form-control" name="uf" required>
            </div>
    </div>

    <div class="form-group">        
            <label class="col-sm-2 control-label">CEP:</label>
            <div class="col-sm-2">
                <input value="{{ $alunos->cep }}" type="text" class="form-control" name="cep" required>
            </div>
        </div>                 
           
       <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Endereço</label>

          <div class="col-sm-4">
            <input value="{{ $alunos->endereco }}" type="text" class="form-control" id="funcao_desc" name="endereco" placeholder="" required>
          </div>

          <label for="inputPassword3" class="col-sm-1 control-label">N:</label>

          <div class="col-sm-1">
            <input value="{{ $alunos->numero }}" type="text" class="form-control" id="funcao_desc" name="numero" placeholder="" required>
          </div>

          <label for="inputPassword3" class="col-sm-2 control-label">Bairro</label>

          <div class="col-sm-2">
            <input value="{{ $alunos->bairro }}" type="text" class="form-control" id="funcao_desc" name="bairro" placeholder="" required>
          </div>

        </div>    
          
      <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Complemento: </label>
      
                <div class="col-sm-10">
                  <input value="{{ $alunos->obs }}" type="text" class="form-control" id="funcao_obs" name="obs" placeholder="Complemento">
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
          <input value="{{ $alunos->nome_pai }}"  type="text" class="form-control" id="funcao_nome" name="nome_pai" placeholder="">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Data de Nascimento Pai:</label>
        <div class="col-sm-2">
            <input value="{{ $alunos->nasc_pai }}" type="date" class="form-control" name="nasc_pai" id="nasc">
        </div>
        <label class="col-sm-2 control-label">CPF Pai:</label>
        <div class="col-sm-2">
            <input  value="{{ $alunos->cpf_pai }}" type="text" class="form-control" name="cpf_pai" id="cpf">
        </div>
        <label class="col-sm-2 control-label">Profissão:</label>
                <div class="col-sm-2">
                    <input value="{{ $alunos->prof_pai }}" type="text" class="form-control" name="prof_pai" id="">
                </div>
      </div>
  
      <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome da Mãe:</label>
      
                <div class="col-sm-10">
                  <input value="{{ $alunos->nome_mae }}" type="text" class="form-control" id="funcao_nome" name="nome_mae" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Data de Nascimento Mãe:</label>
                <div class="col-sm-2">
                    <input value="{{ $alunos->nasc_mae }}" type="date" class="form-control" name="nasc_mae" id="nasc">
                </div>
                <label class="col-sm-2 control-label">CPF Mãe:</label>
                <div class="col-sm-2">
                    <input value="{{ $alunos->cpf_mae }}" type="text" class="form-control" name="cpf_mae" id="cpf_mae">
                </div>
                <label class="col-sm-2 control-label">Profissão:</label>
                <div class="col-sm-2">
                    <input value="{{ $alunos->prof_mae }}" type="text" class="form-control" name="prof_mae" id="">
                </div>
              </div>

              <hr>

              <div class="form-group">
                      <label for="nome" class="col-sm-2 control-label">Responsável Financeiro:</label>
            
                      <div class="col-sm-10">
                        <input value="{{ $alunos->responsavel }}" type="text" class="form-control" name="responsavel" placeholder="" required>
                      </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2">Telefone:</label>
                <div class="col-sm-4">
                  <input value="{{ $alunos->fone }}" type="tel" name="fone" id="fone" class="form-control" placeholder="(00)0000-0000">
                </div>
                <label class="control-label col-sm-2">Celular:</label>
                <div class="col-sm-4">
                  <input value="{{ $alunos->cel }}" type="text" name="cel" id="cel" class="form-control" placeholder="(99)9999-9999">
                </div>
                
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2">E-mail:</label>
                <div class="col-sm-6">
                  <input value="{{ $alunos->email }}" type="text" class="form-control" name="email">
                </div>
              </div>

              
              
              <div class="form-group">
                      <label for="nome" class="col-sm-2 control-label">Profissão</label>
            
                      <div class="col-sm-4">
                        <input value="{{ $alunos->profissao }}" type="text" class="form-control" id="funcao_nome" name="profissao" placeholder="" required>
                      </div>

                      <label for="nome" class="col-sm-2 control-label">Nacionalidade</label>
            
                      <div class="col-sm-4">
                        <input value="{{ $alunos->nacionalidade }}" type="text" class="form-control" id="funcao_nome" name="nacionalidade" placeholder="" required>
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
                                    <a href="/storage/{{$alunos->amAl}}" class="btn btn-primary pull-left" type="button" target="_blank" style="margin-left: 250px;">Visualizar Ficha de Anamnese   <i class="fa fa-eye"></i></a>
                                    </div>

                          

      <div class="box-footer">
        <button type="submit" class="btn btn-primary pull-right">Atualizar</button>
        <a class="btn btn-default pull-rigth" type="button" href="{{ url('aluno')}}">Cancelar</a>
      </div>
     
    </form>

  </div>
@stop
