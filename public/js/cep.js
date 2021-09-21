$(document).ready(function() {
    $("#cep").focusout(function(){

        var cep = $("#cep").val();

        cep = cep.replace(".", "");
        cep = cep.replace("-", "");
        //var urlStr = "https://viacep.com.br/ws/"+ cep +"/json/?callback=?";
        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(data) {

                console.log(data);

                $("#cidade").val(data.localidade);
                $("#uf").val(data.uf);
                $("#bairro").val(data.bairro);
                $("#logradouro").val(data.logradouro);
                $("#obs").val(data.complemento);
        

        });

    });
});

    