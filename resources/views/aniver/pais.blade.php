<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Aniversariantes do Mês</title>
        <link rel="stylesheet" href="{{ url('/css/app.css') }}">
    </head>

    <body style="color: #090909; background-color: #fff; font-size: 10px">
        
    
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
                                  
                                        <img style="z-index: -2; width: 150px; position: static; margin-left: 300px;" src="{{ url('/imagens/logo.png') }}" alt="">
                                        <p style="margin-left: 200px; font-size:20px">Pais aniversariantes de {{ date('M/Y') }}</p>
                              
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
                <th>Nome</th>
                <th>Data Nascimetno</th>
                <th>Contato</th>
                <th>Aluno(a)</th>
            </tr>
            @foreach ($paiA as $pai)
            <tr>
                <td>{{ $pai->nome_pai }}</td>
                <td>{{ date( 'd/m/Y' , strtotime ($pai->nasc_pai)) }}</td>
                <td>{{ $pai->cel }}</td>
                <td>{{ $pai->nome }} | {{$pai->turma}}</td>
                @endforeach ()
      </tbody></table>
    </div>
  </div>
</div>
</body>
  </html>