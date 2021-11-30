<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Boletos</title>
  <link rel="stylesheet" href="{{ url('/css/app.css') }}">
  <link rel="stylesheet" href="{{ url('/css/boleto.css') }}">
</head>

<body style="color: #090909; background-color: #fff">
  @foreach ($meses as $mes)
  @foreach ($turma as $turm)
  <div class="receipt-main">
    <div id="left" class="receipt-section pull-left">
      <p class="receipt-title">INSTITUTO DE EDUCAÇÃO RESENDE RIBEIRO</p>
      <p class="receipt-title">CRECHE ESCOLA ACONCHEGO -<span style="color: #FFD700 !important"> ANO {{ $turm->ano }}</span></p>
      <span class="receipt-label">ALUNO(A):<span> {{ $aluno->nome }}</span></span> <br>
      <span class="receipt-label ">Turma: {{ $aluno->turma }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
      <br>
      <span class="receipt-label ">Nº MATRÍCULA:<span style="color: #FFD700 !important"> {{ $aluno->matricula }}</span>&nbsp;&nbsp;&nbsp;&nbsp; </span>
      <span class="receipt-label ">VENCIMENTO:<span style="color: #FFD700 !important"> {{$ven}}</span> <br>
        <span class="receipt-label ">MÊS DE REFERÊNCIA:<span style="color: #FFD700 !important"> {{$mes}}</span></span> <br>
        @if($val == 2)
        <span class="receipt-label ">VALOR DA MENSALIDADE:R$ {{ $turm->valor }}</span> <br>
        @else
        <span class="receipt-label ">VALOR DA MENSALIDADE:R$ {{ $turm->valorP }}</span> <br>
        @endif
        @if($mes == 'JANEIRO')
        <span class="receipt-label ">VALOR PAGO NA RENOVAÇÃO:</span> <br>
        @else
        {{-- <span class="receipt-label ">VALOR DA MENSALIDADE:</span> <br> --}}
        @endif
        <span class="receipt-label ">VALOR ADICIONAL: ___________________________</span> <br>
        <span class="receipt-label ">VALOR TOTAL PAGO: </span> <br>
        <span class="receipt-label ">DATA DO PAGAMENTO:____/_____/_______</span> <br>
        <span class="receipt-label "> VISTO: ______________________________________</span> <br>

        <div class="receipt-section">
          <span class="receipt-label"></span>
          <span>A segunda via deste documento terá um custo de R$ 20,00 <br>
            Em transações bancárias, enviar o carnê pela agenda p/ registro <br>
            O atraso no pagamento acarretará na aplicação de Juros e Multa <br>
            Os pagamentos até o vencimento receberão desconto de 5%
          </span>
        </div>
    </div>
    <div id=right class="receipt-section">
      <p class="receipt-title">INSTITUTO DE EDUCAÇÃO RESENDE RIBEIRO</p>
      <p class="receipt-title">CRECHE ESCOLA ACONCHEGO -<span style="color: #FFD700 !important"> ANO {{ $turm->ano }}</span></p>
      <span class="receipt-label">ALUNO(A):<span> {{ $aluno->nome }}</span></span> <br>
      <span class="receipt-label ">Turma: {{ $aluno->turma }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
      <br>
      <span class="receipt-label ">Nº MATRÍCULA:<span style="color: #FFD700 !important"> {{ $aluno->matricula }}</span>&nbsp;&nbsp;&nbsp;&nbsp; </span>
      <span class="receipt-label ">VENCIMENTO:<span style="color: #FFD700 !important"> {{$ven}}</span> <br>
        <span class="receipt-label ">MÊS DE REFERÊNCIA:<span style="color: #FFD700 !important"> {{$mes}}</span></span> <br>
        @if($val == 2)
        <span class="receipt-label ">VALOR DA MENSALIDADE:R$ {{ $turm->valor }}</span> <br>
        @else
        <span class="receipt-label ">VALOR DA MENSALIDADE:R$ {{ $turm->valorP }}</span> <br>
        @endif
        @if($mes == 'JANEIRO')
        <span class="receipt-label ">VALOR PAGO NA RENOVAÇÃO:</span> <br>
        @else
        {{-- <span class="receipt-label ">VALOR DA MENSALIDADE:</span> <br> --}}
        @endif
        <span class="receipt-label ">VALOR ADICIONAL: ___________________________</span> <br>
        <span class="receipt-label ">VALOR TOTAL PAGO: </span> <br>
        <span class="receipt-label ">DATA DO PAGAMENTO:____/_____/_______</span> <br>
        <span class="receipt-label "> VISTO: ______________________________________</span> <br>
        <div class="receipt-section">
          <span class="receipt-label"></span>
          <span>A segunda via deste documento terá um custo de R$ 20,00 <br>
            Em transações bancárias, enviar o carnê pela agenda p/ registro <br>
            O atraso no pagamento acarretará na aplicação de Juros e Multa <br>
            Os pagamentos até o vencimento receberão desconto de 5%
          </span>
        </div>
    </div>
  </div>
  @endforeach
  @endforeach
</body>