<h2 class="content__title">Cadastrar Proposta</h2>

<div class='alert alert-danger alert-create'>
    <?php echo validation_errors(); ?>
</div>

<?php echo form_open("propostas/new", 'class="form form--cadastro" id="form-cadastro"'); ?>
    <p class='alert-danger alert-obrigatorio'>* Campos de preenchimento obrigatório</p>

    <div class="form__title">Dados da Proposta</div>


    <div class="form__group">
        <div class="form__group--2">
            <label for="nome_representante" class="obrigatorio">Cliente</label>
            <select name="id_cliente" class="input input-name" required="required">
                <option value="" selected>Selecione...</option>
                <?php foreach($clientes as $cliente) : ?>
                    <option value="<?= $cliente["id"] ?>"><?php if($cliente["tipo_cliente"] == 1) { echo $cliente["nome_representante"]; } else { echo $cliente["razaosocial"];} ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="form__group--2">
            <label for="valor" class="obrigatorio">Valor</label>
            <input name="valor" class="input input-name" id="valor" value="" placeholder="Ex: R$ XX,XX" required="required"/>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group--2">
            <label for="data" class="obrigatorio">Data</label>
            <input name="data" class="input input-name" id="data" value="" placeholder="Ex: 99/99/9999" required="required"/>
        </div>

        <div class="form__group--2">
            <label for="titulo">Título</label>
            <input name="titulo" class="input input-descricao" value=""/>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group--2">
            <label for="forma_pagamento" class="obrigatorio">Forma de pagamento</label>
            <select name="forma_pagamento" class="input input-name" required="required">
                <option value="" selected>Selecione...</option>
                <option value="Cartao">Cartão de Crédito</option>
                <option value="Boleto">Boleto Bancário</option>
                <option value="Transferencia">Tranferência Bancária</option>
                <option value="Dinheiro">Dinheiro</option>
                <option value="Cheque">Cheque</option>
                <option value="Debito">Débito Automático</option>
            </select>
        </div>

        <div class="form__group--2">
            <label for="servicos">Serviço</label>
            <input name="servicos" class="input input-descricao" value=""/>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group--2">
            <label for="envio_proposta" class="obrigatorio">Status</label>
            <select name="envio_proposta" class="input input-name" required="required">
                <option value="" selected>Selecione...</option>
                <option value="Enviada">Enviada</option>
                <option value="Não Enviada">Não enviada</option>
            </select>
        </div>
        <div class="form__group--2">
            <label for="status" class="obrigatorio">Progresso</label>
            <select name="status" class="input input-name" required="required">
                <option value="" selected>Selecione...</option>
                <option value="Em progresso">Em progresso</option>
                <option value="Recusada">Recusada</option>
                <option value="Aceita">Aceita</option>
            </select>
        </div>
    </div>

    <div class="form__title obrigatorio">Proposta - Conteúdo</div>

    <textarea id="field" name="proposta_conteudo" class="tinymce arquivo__projeto" required="required">
    </textarea>

    <div class="form_buttons">
        <a href="<?= base_url("propostas") ?>" alt="Listar Clientes" class="btn btn--cancel">Cancelar</a>
        <button type="submit" class="btn btn-submit">Salvar</button>
    </div>
    
<?php 
    echo form_close();
?>
<script>
VMasker(document.querySelector('#data')).maskPattern('99/99/9999');
</script>

