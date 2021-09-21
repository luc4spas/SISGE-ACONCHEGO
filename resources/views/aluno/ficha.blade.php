<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Requerimento de Matrícula</title>
        <link rel="stylesheet" href="{{ url('/css/app.css') }}">
    </head>
    <body style="color: #090909; background-color: #fff">


    <div class="container">
        <div class="row">
            <div class="col-sm">
                
            </div>

        </div>
        <div class="col-xs-9" style="margin-bottom: 15px;">
        <div class="row" style="border: 1px solid #000;">
            <thead>
                <tr>
                    <th>
                      
                            <img style="z-index: -1;" src="{{ url('/img/aco2.png') }}" alt="">
                  
                        <p class="text-center" style="font-size: 8px; position: absolute;
                        bottom: 0; right: 80px;">INSTITUTO DE EDUCAÇÃO RESENDE RIBEIRO LTDA-ME ,<br>
                                CNPJ Nº 23.841.834/0001-25 <br>
                                Rua Waldir Lobo, nº 07, Bela Vista. <br>
                                São Pedro D’Aldeia – RJ, CEP: 28.941-334 <br>
                                Autorizado pela Resolução SEEDUC nº 3976 de 04/06/2008 <br>
                                E-mail: creche_aconchego@hotmail.com <br>
                                www.facebook.com/Creche Aconchego <br>  
                                Telefones: 22 2621-6037/ 22 98800-6037
                            </p>

                    </th>
                </tr>
            </thead>

        </div>
        </div>
        <div class="row">
                <div class="col-md-2 col-md-offset-2">
                    <img src="/uploads/avatars/{{ $alunos->image }}" style="width:130; height:130px; float:left; border-radius:50%; margin-left:24px;">
                </div>
  
        </div>

    <br>

    

    <div class="col-xs-12" style="margin-bottom: 15px;">
            <div class="row" style="border: 1px solid #000;">
            <thead>
                <tr>
                    <th>
                        <h4 class="text-center font-weight-bold">REQUERIMENTO DE MATRÍCULA - Nº:{{ $alunos->matricula }}</h4>
                    </th>
                </tr>
            </thead>

            </div>
    </div>

    <table style="margin-bottom: 15px;" border="1px solid:#000;" class="col-xs-12">
            <thead>
                <tr>
                    <th>
                        <p style="padding-left: 10px">
                                Aluno (a):{{ $alunos->nome }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @if($alunos->sexo == 'Feminino') Sexo: F (X) M ( ) @else Sexo: F () M (X) @endif <br>
                                Data Nascimento:&nbsp;{{ date( 'd/m/Y' , strtotime ($alunos->dta_nasc)) }}   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cidade:&nbsp;&nbsp;{{ $alunos->cidade }}
                               <br> Pai:&nbsp;&nbsp;{{ $alunos->nome_pai }} <br>
                                Mãe:&nbsp;&nbsp;{{ $alunos->nome_mae }}
                        </p>
                    </th>
                </tr>
            </thead>

        </table>

        <table style="margin-bottom: 15px;" border="1px solid:#000;" class="col-xs-12">
            <thead>
                <tr>
                    <th>
                        <p style="padding-left: 10px;">Endereço:&nbsp;{{ $alunos->endereco }}<br>
                                Bairro:&nbsp;{{ $alunos->bairro }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Cidade:&nbsp; {{ $alunos->cidade }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                    CEP: {{ $alunos->cep }} <br>
                                Telefones: {{ $alunos->fone }}&nbsp;&nbsp;/ {{ $alunos->cel }} <br>
                                @if ($alunos->cor =='Branco')
                                Cor: (X) Branca &nbsp; ( ) Pardo &nbsp; ( ) Negro &nbsp; ( ) Indígena &nbsp; ( ) Amarela <br>
                                @elseif ($alunos->cor =='Pardo')
                                Cor: () Branca &nbsp; (X) Pardo &nbsp; ( ) Negro &nbsp; ( ) Indígena &nbsp; ( ) Amarela <br>
                                @elseif ($alunos->cor =='Negro')
                                Cor: () Branca &nbsp; ( ) Pardo &nbsp; (X) Negro &nbsp; ( ) Indígena &nbsp; ( ) Amarela <br>
                                @elseif ($alunos->cor =='Indigena')
                                Cor: () Branca &nbsp; ( ) Pardo &nbsp; () Negro &nbsp; (X) Indígena &nbsp; ( ) Amarela <br>
                                @elseif ($alunos->cor =='Amarelo')
                                Cor: () Branca &nbsp; ( ) Pardo &nbsp; () Preta &nbsp; ( ) Indígena &nbsp; (X) Amarela <br>
                                @endif
                                Responsável pelo contrato:&nbsp; {{ $alunos->responsavel }}<br>
                                Profissão:&nbsp;{{ $alunos->profissao }}
                            </p>

                    </th>
                </tr>
            </thead>

        </table>

        <div class="col-sm-10" style="margin-bottom: 15px;">
                <div class="row">
                <p class="font-weight-bold">Eu abaixo assino, responsável pelo aluno (a) acima qualificado, solicito a sua
                        matrícula neste estabelecimento de ensino, conforme abaixo especificado.</p>
            </div>
        </div>

        <table class="table table-bordered border=#000;">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">ANO LETIVO</th>
                    <th scope="col" class="text-center">TURMA</th>
                    <th scope="col" class="text-center">TURNO</th>
                    <th scope="col" class="text-center">ASSINATURA DO RESPONÁVEL</th>
                    <th scope="col" class="text-center">DATA</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr><tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr><tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr><tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr><tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      </tr><tr>
                                            <th scope="row"></th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                          </tr><tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                              </tr>
                                              <tr>
                                                    <th scope="row"></th>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                </tbody>
              </table>
              <br><br><br><br><br><br>

              <div style="text-align: left; float:right">
                  <p style="margin-bottom: 0px; text-decoration: underline;">_________________________________________</p> <br>
                  <p class="text-center">Diretora</p>
              </div>

    </div>
    </body>