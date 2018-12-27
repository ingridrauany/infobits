<h2 class="content__title">Cadastrar Usuário</h2>

<div class='alert alert-danger alert-create'>
    <?php echo $message;?>
</div>
    
<?php echo form_open("auth/create_user", 'class="form form--createuser" id="form-createuser"');?>

    <div class="form__title">Dados</div>

    <?php echo lang('create_user_subheading');?>


    <div class="form__group">
        <div class="form__group--2">
            <label for="first_name" class="obrigatorio">Nome</label>
            <input name="first_name" class="input input-name" value="" required="required"/>
        </div>
        <?php
            if($identity_column!=='email') {
                echo '<p>';
                echo lang('create_user_identity_label', 'identity');
                echo '<br />';
                echo form_error('identity');
                echo form_input($identity);
                echo '</p>';
            }
        ?>
        <div class="form__group--2">
            <label for="email" class="obrigatorio">E-mail</label>
            <input name="email" class="input input-name" value="" placeholder="Ex: you@email.com" required="required"/>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group--2">
            <label for="phone" class="obrigatorio">Telefone</label>
            <input name="phone" class="input input-name" value="" id="telefone" placeholder="Ex: (99) 99999 - 9999" required="required"/>    
        </div>
        <div class="form__group--2">
            <label for="cpf" class="obrigatorio">CPF</label>
            <input name="cpf" class="input input-name" value="" id="cpf" placeholder="Ex: 999.999.999-99" required="required"/>    
        </div>
    </div>

    <div class="form__group">
        <div class="form__group--2">
            <label for="matricula" class="obrigatorio">Matrícula</label>
            <input name="matricula" class="input input-name" value="" placeholder="Matrícula do aluno" required="required"/>    
        </div>
    </div>

    <div class="form__group">
        <div class="form__group--2">
            <label for="password" class="obrigatorio">Senha</label>
            <input name="password" type="password" id="password" class="input input-name" value="" required="required"/>
        </div>

        <div class="form__group--2">
            <label for="password_confirm" class="obrigatorio">Confirmar Senha</label>
            <input name="password_confirm" type="password" id="password_confirm" class="input input-name" value=""  required="required"/>    
        </div>
    </div>

    <div class="form_buttons">
        <a href="<?= base_url("/auth") ?>" alt="Listar Usuários" class="btn btn--cancel">Cancelar</a>
        <button type="submit" class="btn btn-submit">Salvar</button>
    </div>

<?php echo form_close();?>
<script>
//mascara de inputs
VMasker(document.querySelector('#telefone')).maskPattern('(99) 99999-9999');
VMasker(document.querySelector('#cpf')).maskPattern('999.999.999-99');
</script>
