</div>
    <footer>
        <div class="footer">
            <div class="footer__content">
                Copyright © 2018 INFOBITS
            </div>
        </div>
    </footer>
</body>
<script>
//load cep
$(document).ready(function() {
    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua_1").val("");
        $("#bairro_1").val("");
        $("#cidade_1").val("");
        $("#uf_1").val("");
    }

    function limpa_formulário_cep_1() {
        // Limpa valores do formulário de cep.
        $("#rua_2").val("");
        $("#bairro_2").val("");
        $("#cidade_2").val("");
        $("#uf_2").val("");
    }

    //Quando o campo cep perde o foco.
    $("#cep_1").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#rua_1").val("...");
                $("#bairro_1").val("...");
                $("#cidade_1").val("...");
                $("#uf_1").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua_1").val(dados.logradouro);
                        $("#bairro_1").val(dados.bairro);
                        $("#cidade_1").val(dados.localidade);
                        $("#uf_1").val(dados.uf);
                        $("#num_1").focus();
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });

    //Quando o campo cep perde o foco.
    $("#cep_2").blur(function() {
        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#rua_2").val("...");
                $("#bairro_2").val("...");
                $("#cidade_2").val("...");
                $("#uf_2").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua_2").val(dados.logradouro);
                        $("#bairro_2").val(dados.bairro);
                        $("#cidade_2").val(dados.localidade);
                        $("#uf_2").val(dados.uf);
                        $("#num_2").focus();
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep_1();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep_1();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep_1();
        }
    });
});

</script>
</html>