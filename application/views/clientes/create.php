<h2 class="content__title">Cadastrar Cliente</h2>

<?php if($this->session->flashdata("danger")): ?>
    <div class='alert alert-danger alert-create'>
        <?php echo validation_errors(); ?>
    </div>
<?php endif; ?>
    
<?php echo form_open("clientes/new", 'class="form form--cadastro" id="form-cadastro" name="cadastro"'); ?>

    <p class='alert-danger alert-obrigatorio'>* Campos de preenchimento obrigatório</p>

    <div class="form__title">Representante</div>

    <div class="form__group">
        <div class="form__group--checkbox">
            <label>Tipo Cliente</label></br>
            <input type="radio" name="tipo_cliente" class="input_radio" value="1" checked/><label for="tipo_cliente"> Pessoa Física</label></br>
            <input type="radio" name="tipo_cliente" class="input_radio_1" value="2"><label for="tipo_cliente">Pessoa Júridica</label>
        </div>
    </div>

    <div class="form__clientes">
        <div class="form__group">
            <div class="form__group--2">
                <label for="nome_representante" class="obrigatorio">Nome</label>
                <input name="nome_representante" class="input input-name" value="" required="required"/>
            </div>

            <div class="form__group--2">
                <label for="cpf_representante" class="obrigatorio">CPF</label>
                <input name="cpf_representante" class="input input-name" value="" id="cpf" placeholder="Ex: 999.999.999-99"  required="required" onBlur="ValidarCPF(this)"/>    
            </div>
        </div>

        <div class="form__group">
            <div class="form__group--2">
                <label for="tel_representante" class="obrigatorio">Telefone</label>
                <input name="tel_representante" class="input input-name"  id="telefone_c"   value="" placeholder="Ex: (99) 99999-9999" required="required"/>
            </div>

            <div class="form__group--2">
                <label for="email_representante" class="obrigatorio">E-mail</label>
                <input name="email_representante" class="input input-name" value="" placeholder="Ex: you@email.com" required="required"/>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group--2">
                <label for="estado_civil" class="obrigatorio">Estado Civil</label>
                <select name="estado_civil" class="input input-name" required="required">
                    <option value="" selected>Selecione...</option>
                    <option value="Solteiro">Solteiro</option>
                    <option value="Casado">Casado</option>
                    <option value="Viúvo">Viúvo</option>
                    <option value="Separado judicialmente">Separado judicialmente</option>
                    <option value="Divorciado">Divorciado</option>
                </select>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group--3">
                <label for="cep_representante" class="obrigatorio">CEP</label>
                <input name="cep_representante" class="input input-name" value="" id="cep_1" placeholder="Ex: 99.999-999" required="required"/>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group--3">
                <label for="rua_representante" class="obrigatorio">Rua</label>
                <input name="rua_representante" class="input input-name" value="" id="rua_1" required="required"/>
            </div>

            <div class="form__group--3">
                <label for="numero_representante" class="obrigatorio">Número</label>
                <input name="numero_representante" class="input input-name" value="" id="num_1" required="required"/>
            </div>

            <div class="form__group--3">
                <label for="bairro_representante" class="obrigatorio">Bairro</label>
                <input name="bairro_representante" class="input input-name" value="" id="bairro_1" required="required"/>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group--3">
                <label for="cidade_representante" class="obrigatorio">Cidade</label>
                <input name="cidade_representante" class="input input-name" value="" id="cidade_1" required="required"/>
            </div>

            <div class="form__group--3">
                <label for="estado_representante" class="obrigatorio">Estado</label>
                <input name="estado_representante" class="input input-name" value="" id="uf_1" required="required"/>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group--4">
                <label for="complemento_representante">Complemento</label>
                <input name="complemento_representante" class="input input-name" value=""/>
            </div>
        </div>
    </div>

    <div class="form__empresa">
        <div class="form__title">Empresa</div>

        <div class="form__group">
            <div class="form__group--2">
                <label for="razaosocial" class="obrigatorio">Razão Social</label>
                <input name="razaosocial" class="input input-obrigatorio" value=""/>
            </div>

            <div class="form__group--2">
                <label for="email_empresa" class="obrigatorio">Email</label>
                <input name="email_empresa" class="input input-obrigatorio" placeholder="Ex: you@email.com" value=""/>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group--2">
                <label for="telefone_empresa" class="obrigatorio">Telefone</label>
                <input name="telefone_empresa" class="input input-obrigatorio" id="telefone_e" placeholder="Ex: (99) 99999-9999" value=""/>
            </div>

            <div class="form__group--2">
                <label for="cnpj" class="obrigatorio">CNPJ</label>
                <input name="cnpj" class="input input-obrigatorio" value="" placeholder="Ex: 99.999.999/9999-99" id="cnpj"/>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group--3">
                <label for="cep_empresa">CEP</label>
                <input name="cep_empresa" class="input input-obrigatorio" placeholder="Ex: 99.999-999" value="" id="cep_2"/>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group--3">
                <label for="rua_empresa">Rua</label>
                <input name="rua_empresa" class="input input-obrigatorio" value="" id="rua_2"/>
            </div>

            <div class="form__group--3">
                <label for="numero_empresa">Número</label>
                <input name="numero_empresa" class="input input-obrigatorio" value="" id="num_2"/>
            </div>

            <div class="form__group--3">
                <label for="bairro_empresa">Bairro</label>
                <input name="bairro_empresa" class="input input-obrigatorio" value="" id="bairro_2"/>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group--3">
                <label for="cidade_empresa">Cidade</label>
                <input name="cidade_empresa" class="input input-obrigatorio" value="" id="cidade_2"/>
            </div>

            <div class="form__group--3">
                <label for="estado_empresa">Estado</label>
                <input name="estado_empresa" class="input input-obrigatorio" value="" id="uf_2"/>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group--4">
                <label for="complemento_empresa">Complemento</label>
                <input name="complemento_empresa" class="input input-name" value=""/>
            </div>
        </div>
    </div>

    <div class="form_buttons">
        <a href="<?= base_url("/clientes") ?>" alt="Listar Clientes" class="btn btn--cancel">Cancelar</a>
        <button type="submit" class="btn btn-submit">Salvar</button>
    </div>
    
<?php 
    echo form_close();
?>
<script>
//mascara de inputs
VMasker(document.querySelector('#telefone_c')).maskPattern('(99) 99999-9999');
VMasker(document.querySelector('#telefone_e')).maskPattern('(99) 99999-9999');
VMasker(document.querySelector('#cpf')).maskPattern('999.999.999-99');
VMasker(document.querySelector('#cep_1')).maskPattern('99.999-999');
VMasker(document.querySelector('#cep_2')).maskPattern('99.999-999');
VMasker(document.querySelector('#cnpj')).maskPattern('99.999.999/9999-99');

//não mostra campo de empresa para pessoa física
$(document).ready(function() {
    $(".form__empresa").hide();
    $('.input-obrigatorio').val("");
    $(".input-obrigatorio").prop('required',false);
});

$('.input_radio').click(function() {     
    $(".form__empresa").hide();
    $('.input-obrigatorio').val("");
    $(".input-obrigatorio").prop('required',false);
});

$('.input_radio_1').click(function() {     
    $(".form__empresa").show();
    $(".input-obrigatorio").prop('required',true);
});

// Função para validar o CPF
function ValidarCPF(elemento) {    
    cpf = elemento.value;
    cpf = cpf.replace(/[^\d]+/g, '');
    if (cpf == '') return alert('CPF Inválido! Preencha corretamente.');
    // Elimina CPFs invalidos conhecidos    
    if (cpf.length != 11 ||
      cpf == "00000000000" ||
      cpf == "11111111111" ||
      cpf == "22222222222" ||
      cpf == "33333333333" ||
      cpf == "44444444444" ||
      cpf == "55555555555" ||
      cpf == "66666666666" ||
      cpf == "77777777777" ||
      cpf == "88888888888" ||
      cpf == "99999999999")
      return $('#cpf').addClass('incorreto');
    // Valida 1o digito 
    add = 0;
    for (i = 0; i < 9; i++)
      add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
      rev = 0;
    if (rev != parseInt(cpf.charAt(9)))
      return $('#cpf').addClass('incorreto');
    // Valida 2o digito 
    add = 0;
    for (i = 0; i < 10; i++)
      add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
      rev = 0;
    if (rev != parseInt(cpf.charAt(10)))
     return $('#cpf').addClass('incorreto');
    return $('#cpf').removeClass('incorreto');
}

// Função para validar o CNPJ
function validarCNPJ(cnpj) {
 
 cnpj = cnpj.replace(/[^\d]+/g,'');

 if(cnpj == '') return alert('CNPJ Inválido! Preencha corretamente.');
  
 if (cnpj.length != 14)
     return alert('CNPJ Inválido! Preencha corretamente.');

 // Elimina CNPJs invalidos conhecidos
 if (cnpj == "00000000000000" || 
     cnpj == "11111111111111" || 
     cnpj == "22222222222222" || 
     cnpj == "33333333333333" || 
     cnpj == "44444444444444" || 
     cnpj == "55555555555555" || 
     cnpj == "66666666666666" || 
     cnpj == "77777777777777" || 
     cnpj == "88888888888888" || 
     cnpj == "99999999999999")
     return alert('CNPJ Inválido! Preencha corretamente.');
      
 // Valida DVs
 tamanho = cnpj.length - 2
 numeros = cnpj.substring(0,tamanho);
 digitos = cnpj.substring(tamanho);
 soma = 0;
 pos = tamanho - 7;
 for (i = tamanho; i >= 1; i--) {
   soma += numeros.charAt(tamanho - i) * pos--;
   if (pos < 2)
         pos = 9;
 }
 resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
 if (resultado != digitos.charAt(0))
     return alert('CNPJ Inválido! Preencha corretamente.');
      
 tamanho = tamanho + 1;
 numeros = cnpj.substring(0,tamanho);
 soma = 0;
 pos = tamanho - 7;
 for (i = tamanho; i >= 1; i--) {
   soma += numeros.charAt(tamanho - i) * pos--;
   if (pos < 2)
         pos = 9;
 }
 resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
 if (resultado != digitos.charAt(1))
       return alert('CNPJ Inválido! Preencha corretamente.');
        
 return true;
 
}
</script>
