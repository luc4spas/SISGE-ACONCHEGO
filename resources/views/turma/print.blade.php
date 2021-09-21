<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Relatório de turma</title>
        <link rel="stylesheet" href="{{ url('/css/app.css') }}">
    </head>

    <body style="color: #090909; background-color: #fff; font-size: 15px">
        
    
            <div class="container">
                    <div class="row">
                        <div class="col-sm">                                
                        </div>
            
                    </div>
                    <div class="col-xs-12" style="margin-bottom: 15px;">
                    <div class="row">
                        <thead>
                            <tr>
                                <th>
                                  
                                        <img style="z-index: -2; width: 150px; position: static; margin-left: 300px;" src="{{ url('/img/aco.png') }}" alt="">
                                        <p style="margin-left: 300px; font-size:20px"> {{ $turma->nomTurma }} - {{ $turma->turno }} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{ $turma->ano }}</p>
                              
                                </th>
                            </tr>
                        </thead>
            
                    </div>
                    </div>
              
                
            
                <br>
        <!-- /.box-header -->
        <div class="box">
            <div class="box-header with-border">
              <h4>Professor: {{ $turma->colaboradores->nomCol }}</h4>
              <h4>Auxiliar: {{ $turma->auxiliar }}</h4>
              <h4>Total de Alunos: {{ $tt }}</h4>          
             
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">Mat</th>
                  <th>Nome</th>
                  <th>Nascimento</th>
                  <th>Filiação</th>           
                  <th>Turno</th>           
                </tr>
                @foreach ($alunos as $aluno)
       
            <tr>     


                
              @if (empty($aluno->obsH))
                  <td>{{ $aluno->matricula }}</td>
                  <td>{{ $aluno->nome }} <br> {{ $aluno->obsH }}</td>
                  <td>{{date( 'd/m/Y' , strtotime  ($aluno->dta_nasc)) }}</td>
                  <td>{{ $aluno->nome_pai }}<br> {{$aluno->nome_mae}}</td>                  
                  <td>{{ $turma->turno }}</td>
               @else
              <td style="background-color: red !important">{{ $aluno->matricula }}</td>
              <td style="background-color: red !important">{{ $aluno->nome }} <br> {{ $aluno->obsH }}</td>
              <td style="background-color: red !important">{{date( 'd/m/Y' , strtotime  ($aluno->dta_nasc)) }}</td>
              <td style="background-color: red !important ">{{ $aluno->nome_pai }}<br> {{$aluno->nome_mae}}</td>
              <td style="background-color: red !important">{{  $turma->turno }}</td>
              
  
                
                @endif()
            @endforeach ()
                 </td>
                </tr>
               
              </tbody></table>
            </div>
          <br>
          
          <div class="col-sm-3">
              <p style="background-color: red !important">ALUNOS COM RESTRIÇÃO ALIMENTAR</p>
          </div>
          </div>
</div>


</body>
  </html>