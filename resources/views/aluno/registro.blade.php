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
        <div class="col-xs-12" style="margin-bottom: 15px;">
        <div class="row" style="border: 1px solid #000;">
            <thead>
                <tr>
                    <th>
                      
                            <img style="z-index: -1;" src="{{ url('/imagens/logo.png') }}" alt="">
                  
                        <p class="text-center" style="font-size: 8px; position: absolute;
                        bottom: 0; right: 80px;"><strong>INSTITUTO DE EDUCAÇÃO RESENDE RIBEIRO LTDA-ME</strong> ,<br>
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

    <br>

    

    <div class="col-xs-12" style="margin-bottom: 15px; font-size: 20px">
            <div class="row" style="border: 1px solid #000;">
            <thead>
                <tr>
                    <th>
                        <h4 style="font-size: 20px;" class="text-center font-weight-bold">REGISTRO DE MATRÍCULA - Nº:{{ $alunos->matricula }}</h4>
                    </th>
                </tr>
            </thead>

            </div>
    </div>

    <table style="margin-bottom: 15px;" border="1px solid:#000;" class="col-xs-12">
            <thead>
                <tr>
                    <th>
                        <p style="padding-left: 10px; font-size: 20px">
                                Aluno (a):{{ $alunos->nome }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @if($alunos->sexo == 'Feminino') Sexo: F (X) M ( ) @else Sexo: F () M (X) @endif <br>
                                Endereço:{{ $alunos->endereco }}<br>
                                Bairro:{{ $alunos->bairro }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cidade: {{ $alunos->cidade }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <br>
                                Data Nascimento:{{ date( 'd/m/Y' , strtotime ($alunos->dta_nasc)) }}   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Local: São Pedro da Aldeia UF: RJ
                               <br>Filiação: Pai:{{ $alunos->nome_pai }}<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               Mãe:{{ $alunos->nome_mae }}
                               <br>Responsável pelo contrato: {{ $alunos->responsavel }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Profissão:{{ $alunos->profissao }}
                        </p>
                    </th>
                </tr>
            </thead>

        </table>

        <table style="margin-bottom: 15px;" border="1px solid:#000;" class="col-xs-12">
            <thead>
                <tr>
                    <th>
                            <p style="padding-left: 10px; font-size: 18px;">Matrícula em ___/___/___ na (&nbsp;&nbsp; ) Educação Infantil ___________ (&nbsp;&nbsp; )Ensino Fundamental _______ Ano Visto:__________</p>
                            <p style="padding-left: 10px; font-size: 18px;">Matrícula em ___/___/___ na (&nbsp;&nbsp; ) Educação Infantil ___________ (&nbsp;&nbsp; )Ensino Fundamental _______ Ano Visto:__________</p>
                            <p style="padding-left: 10px; font-size: 18px;">Matrícula em ___/___/___ na (&nbsp;&nbsp; ) Educação Infantil ___________ (&nbsp;&nbsp; )Ensino Fundamental _______ Ano Visto:__________</p>
                            <p style="padding-left: 10px; font-size: 18px;">Matrícula em ___/___/___ na (&nbsp;&nbsp; ) Educação Infantil ___________ (&nbsp;&nbsp; )Ensino Fundamental _______ Ano Visto:__________</p>
                            <p style="padding-left: 10px; font-size: 18px;">Matrícula em ___/___/___ na (&nbsp;&nbsp; ) Educação Infantil ___________ (&nbsp;&nbsp; )Ensino Fundamental _______ Ano Visto:__________</p>
                            <p style="padding-left: 10px; font-size: 18px;">Matrícula em ___/___/___ na (&nbsp;&nbsp; ) Educação Infantil ___________ (&nbsp;&nbsp; )Ensino Fundamental _______ Ano Visto:__________</p>
                            <p style="padding-left: 10px; font-size: 18px;">Matrícula em ___/___/___ na (&nbsp;&nbsp; ) Educação Infantil ___________ (&nbsp;&nbsp; )Ensino Fundamental _______ Ano Visto:__________</p>
                            <p style="padding-left: 10px; font-size: 18px;">Matrícula em ___/___/___ na (&nbsp;&nbsp; ) Educação Infantil ___________ (&nbsp;&nbsp; )Ensino Fundamental _______ Ano Visto:__________</p>

                    </th>
                </tr>
            </thead>

        </table>
        
        <table style="margin-bottom: 15px;" border="1px solid:#000;" class="col-xs-12">
                <thead>
                    <tr>
                        <th>
                                <p style="padding: 10px; font-size: 18px;">Transferido em _____/_____/_____</p>
                        </th>
                    </tr>
                </thead>
        </table>

        <table style="margin-bottom: 15px;" border="1px solid:#000;" class="col-xs-12">
                <thead>
                  <tr>
                    <th>
                        <p style="font-size: 20px; padding: 10px;">Observações: ____________________________________________________________________________<br>
                           __________________________________________________________________________________________________________<br>
                           __________________________________________________________________________________________________________<br>
                           __________________________________________________________________________________________________________<br>
                           __________________________________________________________________________________________________________<br>
                           __________________________________________________________________________________________________________<br>
                           __________________________________________________________________________________________________________<br>
                           __________________________________________________________________________________________________________<br>
                           __________________________________________________________________________________________________________<br>
                           __________________________________________________________________________________________________________<br>
                           __________________________________________________________________________________________________________<br>
                           __________________________________________________________________________________________________________<br>
                           __________________________________________________________________________________________________________<br></p>
                    </th>
                  </tr>
        </table>
              <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>  

              <div style="text-align: left; float:right; margin-top: 100px;">
                  <p style="margin-bottom: 0px; text-decoration: underline;">_________________________________________</p> <br>
                  <p class="text-center">Diretora</p>
              </div>


    </body>