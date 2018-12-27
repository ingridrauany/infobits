<h2 class="content__title">Editar Contrato</h2>
<?= validation_errors("<p class='alert alert-danger'>", "</p>") ?>

<?php echo form_open("contratos/update/".$contrato['id'], 'class="form form--cadastro" id="form-cadastro"'); ?>

    <p class='alert-danger alert-obrigatorio'>* Campos de preenchimento obrigatório</p>

    <div class="form__title">Dados do Contrato</div>

    <div class="form__group">
        <div class="form__group--2">
            <label for="id_cliente" class="obrigatorio">Cliente</label>
            <select name="id_cliente" id="first-choice" class="input input-name" required="required">
                <option value="" selected>Selecione...</option>
                <?php foreach($clientes as $cliente) : ?>
                    <option value="<?= $cliente["id"] ?>" <?php if ($cliente["id"] == $contrato['id_cliente']) { ?> selected <?php } ?> ><?php if($cliente["tipo_cliente"] == 1) { echo $cliente["nome_representante"]; } else { echo $cliente["razaosocial"];} ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="form__group--2">
            <label for="id_proposta" class="obrigatorio">Proposta</label>
            <select name="id_proposta" id="second-choice" class="input input-name" required="required">
                <option value="" selected>Selecione...</option>
                <?php foreach($propostas as $proposta) : ?>
                    <option value="<?= $proposta["id"] ?>" <?php if ($proposta["id"] == $contrato['id_proposta']) { ?> selected <?php } ?> ><?php echo $proposta["titulo"]; ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group--2">
            <label for="data_inicio" class="obrigatorio">Data Início</label>
            <input name="data_inicio" id="datainicio" class="input input-name" value="<?php echo set_value('data_inicio', $contrato['data_inicio']); ?>" required="required"/>
        </div>

        <div class="form__group--2">
            <label for="data_fim" class="obrigatorio">Data Fim</label>
            <input name="data_fim" id="datafim" class="input input-name" value="<?php echo set_value('data_fim', $contrato['data_fim']); ?>" required="required"/>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group--2">
            <label for="valor" class="obrigatorio">Valor</label>
            <input name="valor" class="input input-name" value="<?php echo set_value('valor', $contrato['valor']); ?>" required="required"/>
        </div>
    </div>

    <div class="form-group">
        <div class="form__group--2">
            <label for="envio_contrato" class="obrigatorio">Status</label>
            <select name="envio_contrato" class="input input-name" required="required">
                <option value="" <?php if ($contrato['envio_contrato'] == "") { ?> selected <?php } ?>>Selecione...</option>
                <option value="Enviada" <?php if ($contrato['envio_contrato'] == "Enviada") { ?> selected <?php } ?>>Enviada</option>
                <option value="Não enviada" <?php if ($contrato['envio_contrato'] == "Não enviada") { ?> selected <?php } ?>>Não enviada</option>
            </select>
        </div>
        <div class="form__group--2">
            <label for="status" class="obrigatorio">Progresso</label>
            <select name="status" class="input input-name" required="required">
                <option value="" <?php if ($contrato['status'] == "") { ?> selected <?php } ?>>Selecione...</option>
                <option value="Em progresso" <?php if ($contrato['status'] == "Em progresso") { ?> selected <?php } ?>>Em progresso</option>
                <option value="Aceita" <?php if ($contrato['status'] == "Aceita") { ?> selected <?php } ?>>Aceita</option>
                <option value="Recusada" <?php if ($contrato['status'] == "Recusada") { ?> selected <?php } ?>>Recusada</option>
            </select>
        </div>
    </div>

    <div class="form__title obrigatorio">Contrato</div>

    <textarea id="field" name="arquivo" required><?php echo set_value('arquivo', $contrato['arquivo']); ?>
    </textarea>
   
    <div class="form_buttons obrigatorio">
        <a href="<?= base_url("contratos") ?>" alt="Listar Clientes" class="btn btn--cancel">Cancelar</a>
        <button type="submit" id="submit" class="btn btn-submit">Salvar</button>
    </div>

<script>
VMasker(document.querySelector('#datainicio')).maskPattern('99/99/9999');
VMasker(document.querySelector('#datafim')).maskPattern('99/99/9999');

// baseURL variable
var baseURL= "<?php echo base_url();?>";
//seleciona propostas de acordo com o cliente
$(document).ready(function() {
    $('#first-choice').on('change', function() {
        var id_cliente = $(this).val();
        if(id_cliente) {
            $.ajax({
                url: '<?=base_url()?>index.php/contratos/myformAjax/'+id_cliente,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('#second-choice').empty();
                    $('#second-choice').append('<option value="" selected>Selecione...</option>');
                    $.each(data, function(key, value) {
                        $('#second-choice').append('<option value="'+ value.id +'">'+ value.titulo +'</option>');
                    });
                }
            });
        }else{
            $('select[name="city"]').empty();
        }
    });
});
</script>