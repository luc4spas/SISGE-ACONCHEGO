@extends('adminlte::page')

@section('title', 'SISGE | Beta')

@section('content_header')
    <h1>Turmas</h1>
@stop

@section('content')
<div class="box">
  <div class="box-header">
    <form class="form-inline" method="post" action="{{ route('turma') }}">
        {!! csrf_field() !!}
      <input type="text" class="form-control" placeholder="N. Matricula" name="matricula" >
      <input type="text" class="form-control" placeholder="Nome do Colaborador" name="nome">
      <input type="text" class="form-control" placeholder="admissão" name="responsavel">
      <button type="submit" class="btn btn-primary">Pesquisar</button>
    </form>
  </div>
</div>
<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title" style="float:left">Lista de Turmas</h3>
          <div class="col-sm-4">

          <form class="form-inline" method="post" action="{{ route('turma.ano') }}">
              {!! csrf_field() !!}
              <select class="form-control" class="col-sm-2" name="ano">
                                <option>2019</option>
                                <option>2020</option>
                                <option>2021</option>
                                <option>2022</option>
                                <option>2023</option>
                                <option>2024</option>
                                <option>2025</option>
                                <option>2026</option>
                            </select>   
                            <button  type="submit" class="btn btn-primary" style="float:center">Selecionar</button>
            
            </form> 
            </div>
          <a href="{{ route('turma.create')}}" class="btn btn-primary" type="button"style="float:right"><i class="fa fa-plus"></i></a>
          <a href="{{ route('turma')}}" class="btn btn-primary" type="button"style="float:right"><i>PDF</i></a>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tbody><tr>
              <th style="width: 10px">ID</th>
              <th>Nome</th>
              <th>Turno</th>
              <th>Ano</th>
              <th>Professor</th>
              <th>Sala</th>              
              <th>Ações</th>
            </tr>
            @foreach ($turmas as $turma)
            <tr>
              <td>{{ $turma->id }}</td>
              <td>{{ $turma->nomTurma }}</td>
              <td>{{ $turma->turno }}</td>
              <td>{{ $turma->ano }}</td>
              <td>{{ $turma->nomCol }}</td>
              <td>{{ $turma->sala }}</td>
              
              <td style="width: 10px;width: 157px;">
                    <a href="{{action('TurmaController@edit', $turma->id)}}" type="button" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                    <a href="{{action('TurmaController@destroy', $turma->id)}}" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                <div style="display: inline;" class="dropdown">                        
                    <a  class="btn btn-info dropdown-toggle" href="{{route('turma.view', ['id'=> $turma->id])}}" type="button" class="btn bt-default"><i class="fa fa-eye"></i></a>                    
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">                        
                      </div>
                    </div>
                  </div>
                  
              </td>
            </tr>
            @endforeach ()
           
          </tbody></table>
          {!! $turmas->links() !!}
        </div>
      </div>
@stop