@extends('adminlte::page')

@section('title', 'SISGE | Beta')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="col-lg-4 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>R$ 8.752,99</h3>
        <p>Contas a receber</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="{{ route('aluno')}}" class="small-box-footer">Mais<i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-4 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>R$ 5.333,87</h3>

        <p>Contas a pagar</p>
      </div>
      <div class="icon">
        <i class="fa fa-user"></i>
      </div>
      <a href="#" class="small-box-footer">
        Mais <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

  <div class="col-lg-4 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow ">
      <div class="inner">
        <h3>R$ 3.152,20</h3>

        <p>Em atraso</p>
      </div>
      <div class="icon">
        <i class="fa fa-sitemap"></i>
      </div>
      <a href="#" class="small-box-footer">
        Mais <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

  
 
  </div>
  </div>

  </div>
  
  
      
  
@stop