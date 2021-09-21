<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Lista de Alunos</title>
        <link rel="stylesheet" href="{{ url('/css/app.css') }}">
    </head>

    <body style="color: #090909; background-color: #fff">
        
    
            <div class="container">
                    <div class="row">
                        <div class="col-sm">                                
                        </div>
            
                    </div>
                    <div class="col-xs-12" style="margin-bottom: 15px;">
                    <div class="row" style="border: 1px solid #ddd;">
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
              
                
            
                <br>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tbody><tr>
              <th>Mat</th>
              <th>Nome</th>
              <th>Turma</th>
              <th>Nascimento</th>
              <th>Pai</th>
              <th>Mãe</th>
            </tr>
            @foreach ($alunos as $aluno)
            <tr>
              <td>{{ $aluno->matricula }}</td>
              <td>{{ $aluno->nome }}</td>
              <td>{{ $aluno->turma }}</td>
              <td>{{ date( 'd/m/Y' , strtotime ($aluno->dta_nasc)) }}</td>
              <td>{{ $aluno->nome_pai }}</td>
              <td>{{ $aluno->nome_mae }}</td>
            </tr>
            @endforeach ()
      </tbody></table>
    </div>
  </div>
</div>
</body>
  </html>