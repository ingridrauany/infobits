<h2 class="content__title">Editar Proposta</h2>
<?= validation_errors("<p class='alert alert-danger'>", "</p>") ?>

<?php echo form_open("propostas/update/".$proposta['id'], 'class="form form--cadastro" id="form-cadastro"'); ?>

    <p class='alert-danger alert-obrigatorio'>* Campos de preenchimento obrigatório</p>

    <div class="form__title">Dados</div>

    <div class="form__group">
        <div class="form__group--2">
            <label for="id_cliente" class="obrigatorio">Cliente</label>
            <select name="id_cliente" class="input input-name" required="required">
                <option value="" selected>Selecione...</option>
                <?php foreach($clientes as $cliente) : ?>
                    <option value="<?= $cliente["id"] ?>" <?php if ($cliente["id"] == $proposta['id_cliente']) { ?> selected <?php } ?> ><?php if($cliente["tipo_cliente"] == 1) { echo $cliente["nome_representante"]; } else { echo $cliente["razaosocial"];} ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="form__group--2">
            <label for="valor" class="obrigatorio">Valor</label>
            <input name="valor" class="input input-name" value="<?php echo set_value('valor', $proposta['valor']); ?>" required="required"/>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group--2">
            <label for="data" class="obrigatorio">Data</label>
            <input name="data" class="input input-name" value="<?php echo set_value('data', $proposta['data']); ?>" required="required"/>
        </div>

        <div class="form__group--2">
            <label for="titulo">Título</label>
            <input name="titulo" class="input input-name" value="<?php echo set_value('titulo', $proposta['titulo']); ?>"/>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group--2">
            <label for="forma_pagamento" class="obrigatorio">Forma de pagamento</label>
            <select name="forma_pagamento" class="input input-name" required="required">
                <option value="" selected>Selecione...</option>
                <option value="Cartao" <?php if ($proposta['forma_pagamento'] == "Cartao") { ?> selected <?php } ?>>Cartão de Crédito</option>
                <option value="Boleto" <?php if ($proposta['forma_pagamento'] == "Boleto") { ?> selected <?php } ?>>Boleto Bancário</option>
                <option value="Transferencia" <?php if ($proposta['forma_pagamento'] == "Transferencia") { ?> selected <?php } ?>>Tranferência Bancária</option>
                <option value="Dinheiro" <?php if ($proposta['forma_pagamento'] == "Dinheiro") { ?> selected <?php } ?>>Dinheiro</option>
                <option value="Cheque" <?php if ($proposta['forma_pagamento'] == "Cheque") { ?> selected <?php } ?>>Cheque</option>
                <option value="Debito" <?php if ($proposta['forma_pagamento'] == "Debito") { ?> selected <?php } ?>>Débito Automático</option>
            </select>
        </div>

        <div class="form__group--2">
            <label for="servicos">Serviço</label>
            <input name="servicos" class="input input-descricao" value="<?php echo set_value('titulo', $proposta['servicos']); ?>"/>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group--2">
            <label for="status" class="obrigatorio">Status</label>
            <select name="envio_proposta" class="input input-name" required="required">
                <option value="" <?php if ($proposta['envio_proposta'] == "") { ?> selected <?php } ?>>Selecione...</option>
                <option value="Enviada" <?php if ($proposta['envio_proposta'] == "Enviada") { ?> selected <?php } ?>>Enviada</option>
                <option value="Não enviada" <?php if ($proposta['envio_proposta'] == "Não enviada") { ?> selected <?php } ?>>Não enviada</option>
            </select>
        </div>
        <div class="form__group--2">
            <label for="status" class="obrigatorio">Progresso</label>
            <select name="status" class="input input-name" required="required">
                <option value="" <?php if ($proposta['status'] == "") { ?> selected <?php } ?>>Selecione...</option>
                <option value="Em progresso" <?php if ($proposta['status'] == "Em progresso") { ?> selected <?php } ?>>Em progresso</option>
                <option value="Aceita" <?php if ($proposta['status'] == "Aceita") { ?> selected <?php } ?>>Aceita</option>
                <option value="Recusada" <?php if ($proposta['status'] == "Recusada") { ?> selected <?php } ?>>Recusada</option>
            </select>
        </div>
    </div>

    <div class="form__title obrigatorio">Proposta - INFOBITS</div>

    <textarea id="field" name="proposta_conteudo" required><?php echo set_value('proposta_conteudo', $proposta['proposta_conteudo']); ?>
    </textarea>
   
    <div class="form_buttons obrigatorio">
        <a href="<?= base_url("propostas") ?>" alt="Listar Clientes" class="btn btn--cancel">Cancelar</a>
        <button type="submit" id="submit" class="btn btn-submit">Salvar</button>
    </div>