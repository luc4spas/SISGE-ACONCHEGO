<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>

<!-- Font Awesome JS -->
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"> </script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"> </script>

<link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>

<style>
    .footer {
        position: fixed;
        align-items: center;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #9C27B0;
        color: white;
        text-align: center;
    }

    .div-select {
        width: 250px;
        /* Tamanho final do select */
        overflow: hidden;
        /* Esconde o conteúdo que passar do tamanho especificado */
    }


    body {
        background-color: #EDF7EF
    }
</style>
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="demoModalLabel{{ $aluno->id }}">IMPRESSÃO DE CARNÊ</h5>
            <button type="button" href="" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="modal" action="{{ route('aluno.boleto', $aluno->id) }}" method="post">
                {!! csrf_field() !!}

                <input hidden name="id" value="{{ $aluno->id }}">{{ $aluno->nome }}</input> <br>
                <span>Seleciona a data de vencimento:</span>

                <div class="div-select">
                    <select class="form-control form-control-lg" class="col-sm-2" name="venc" required>
                        <option></option>
                        <option>5</option>
                        <option>10</option>
                        <option>15</option>
                    </select> <br>
                </div>
                <span>Valor INTEGRAL ou PARCIAL?</span>
                <div class="div-select">
                    <select class="form-control form-control-lg" class="col-sm-2" name="valor" required>
                        <option></option>
                        <option value="1">PARCIAL</option>
                        <option value="2">INTEGRAL</option>
                    </select> <br>
                </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Gerar Boleto</button>

        </div>
    </div>
</div>