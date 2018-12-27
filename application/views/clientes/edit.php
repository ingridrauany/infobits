<h2 class="content__title">Editar Cliente</h2>
<?php if($this->session->flashdata("danger")): ?>
    <div class='alert alert-danger alert-create'>
        <?php echo validation_errors(); ?>
    </div>
<?php endif; ?>
<?php echo form_open("clientes/update/".$cliente['id'], 'class="form form--cadastro" id="form-cadastro"'); ?>

<div class="form__title">Representante</div>


    <div class="form__group">
        <div class="form__group--checkbox">
            <div>Tipo Cliente</div></br>
            <input type="radio" name="tipo_cliente" class="input_radio" id="pessoa_fisica" value="1" <?php if($cliente["tipo_cliente"] == 1) { ?>checked<?php } ?>/> <label for="pessoa_fisica">Pessoa Física</label></br>
            <input type="radio" name="tipo_cliente" class="input_radio_1" id="pessoa_juridica"  value="2" <?php if($cliente["tipo_cliente"] == 2) { ?>checked<?php } ?> /><label for="pessoas_juridica">Pessoa Júridica</label>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group--2">
            <label for="nome_representante">Nome</label>
            <input name="nome_representante" class="input input-name" value="<?php echo set_value('nome_representante', $cliente['nome_representante']); ?>" required="required"/>
        </div>

        <div class="form__group--2">
            <label for="cpf_representante">CPF</label>
            <input name="cpf_representante" class="input input-name" id="cpf" value="<?php echo set_value('cpf_representante', $cliente['cpf_representante']); ?>" required="required"/>    
        </div>
    </div>

    <div class="form__group">
        <div class="form__group--2">
            <label for="tel_representante">Telefone</label>
            <input name="tel_representante" class="input input-name" id="telefone_c" value="<?php echo set_value('tel_representante', $cliente['tel_representante']); ?>" required="required"/>
        </div>

        <div class="form__group--2">
            <label for="estado_civil">Estado Civil</label>
            <input name="estado_civil" class="input input-name" value="<?php echo set_value('estado_civil', $cliente['estado_civil']); ?>" required="required"/>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group--2">
            <label for="email_representante">E-mail</label>
            <input name="email_representante" class="input input-name" value="<?php echo set_value('email_representante', $cliente['email_representante']); ?>" required="required"/>
        </div>
    </div>


    <div class="form__group">
        <div class="form__group--3">
            <label for="cep_representante">CEP</label>
            <input name="cep_representante" class="input input-name" id="cep_1" value="<?php echo set_value('cep_representante', $cliente['cep_representante']); ?>" required="required"/>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group--3">
            <label for="rua_representante">Rua</label>
            <input name="rua_representante" class="input input-name" id="rua_1" value="<?php echo set_value('rua_representante', $cliente['rua_representante']); ?>" required="required"/>
        </div>

        <div class="form__group--3">
            <label for="numero_representante">Número</label>
            <input name="numero_representante" class="input input-name" id="num_1" value="<?php echo set_value('name', $cliente['numero_representante']); ?>" required="required"/>
        </div>

        <div class="form__group--3">
            <label for="bairro_representante">Bairro</label>
            <input name="bairro_representante" class="input input-name" id="bairro_1" value="<?php echo set_value('name', $cliente['bairro_representante']); ?>" required="required"/>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group--3">
            <label for="cidade_representante">Cidade</label>
            <input name="cidade_representante" class="input input-name" id="cidade_1" value="<?php echo set_value('name', $cliente['cidade_representante']); ?>" required="required"/>
        </div>

        <div class="form__group--3">
            <label for="estado_representante">Estado</label>
            <input name="estado_representante" class="input input-name" id="estado_1" value="<?php echo set_value('name', $cliente['estado_representante']); ?>" required="required"/>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group--4">
            <label for="complemento_representante">Complemento</label>
            <input name="complemento_representante" class="input input-name" value="<?php echo set_value('name', $cliente['complemento_representante']); ?>" />
        </div>
    </div>

    <div class="form__empresa">
        <div class="form__title">Empresa</div>

        <div class="form__group">
            <div class="form__group--2">
                <label for="razaosocial">Razão Social</label>
                <input name="razaosocial" class="input input-name" value="<?php echo set_value('razaosocial', $cliente['razaosocial']); ?>"/>
            </div>

            <div class="form__group--2">
                <label for="email_empresa">E-mail</label>
                <input name="email_empresa" class="input input-name" value="<?php echo set_value('email_empresa', $cliente['email_empresa']); ?>"/>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group--2">
                <label for="telefone_empresa">Telefone</label>
                <input name="telefone_empresa" class="input input-name" id="telefone_e" value="<?php echo set_value('telefone_empresa', $cliente['telefone_empresa']); ?>"/>
            </div>

            <div class="form__group--2">
                <label for="cnpj">CNPJ</label>
                <input name="cnpj" class="input input-name" id="cnpj" value="<?php echo set_value('cnpj', $cliente['cnpj']); ?>"/>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group--3">
                <label for="cep_empresa">CEP</label>
                <input name="cep_empresa" class="input input-name" id="cep_2" value="<?php echo set_value('cep_empresa', $cliente['cep_empresa']); ?>"/>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group--3">
                <label for="rua_empresa">Rua</label>
                <input name="rua_empresa" class="input input-name" id="rua_2" value="<?php echo set_value('rua_empresa', $cliente['rua_empresa']); ?>"/>
            </div>

            <div class="form__group--3">
                <label for="numero_empresa">Número</label>
                <input name="numero_empresa" class="input input-name" id="num_2" value="<?php echo set_value('numero_empresa', $cliente['numero_empresa']); ?>"/>
            </div>

            <div class="form__group--3">
                <label for="bairro_empresa">Bairro</label>
                <input name="bairro_empresa" class="input input-name" id="bairro_2" value="<?php echo set_value('bairro_empresa', $cliente['bairro_empresa']); ?>"/>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group--3">
                <label for="cidade_empresa">Cidade</label>
                <input name="cidade_empresa" class="input input-name" id="cidade_2" value="<?php echo set_value('cidade_empresa', $cliente['cidade_empresa']); ?>"/>
            </div>

            <div class="form__group--3">
                <label for="estado_empresa">Estado</label>
                <input name="estado_empresa" class="input input-name" id="estado_2" value="<?php echo set_value('estado_empresa', $cliente['estado_empresa']); ?>"/>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group--4">
                <label for="complemento_empresa">Complemento</label>
                <input name="complemento_empresa" class="input input-name" value="<?php echo set_value('complemento_empresa', $cliente['complemento_empresa']); ?>" />
            </div>
        </div>
    </div>
    
    <div class="form_buttons">
        <a href="<?= base_url("clientes") ?>" alt="Listar Clientes" class="btn btn--cancel">Cancelar</a>
        <button type="submit" class="btn btn-submit">Salvar</button>
    </div>

<script>
//mask for inputs
VMasker(document.querySelector('#telefone_c')).maskPattern('(99) 99999-9999');
VMasker(document.querySelector('#telefone_e')).maskPattern('(99) 99999-9999');
VMasker(document.querySelector('#cpf')).maskPattern('999.999.999-99');
VMasker(document.querySelector('#cep_1')).maskPattern('99.999-999');
VMasker(document.querySelector('#cep_2')).maskPattern('99.999-999');
VMasker(document.querySelector('#cnpj')).maskPattern('99.999.999/9999-99');

//não mostra campo de empresa para pessoa física
$(document).ready(function() {
    if($('.input_radio').is(':checked')) {
        $(".form__empresa").hide();
        $(".input-obrigatorio").prop('required',false);
    } else {
        $(".form__empresa").show();
        $(".input-obrigatorio").prop('required',true);
    }
});

$('.input_radio').click(function() {     
    $(".form__empresa").hide();
    $(".input-obrigatorio").prop('required',false);
});

$('.input_radio_1').click(function() {     
    $(".form__empresa").show();
    $(".input-obrigatorio").prop('required',true);
});
</script>
