<h2 class="content__title">Cadastrar Contrato</h2>

<div class='alert alert-danger alert-create'>
    <?php echo validation_errors(); ?>
</div>

<?php echo form_open("contratos/new", 'class="form form--cadastro" id="form-cadastro"'); ?>
    <p class='alert-danger alert-obrigatorio'>* Campos de preenchimento obrigatório</p>

    <div class="form__title">Dados do Contrato</div>

    <div class="form__group">
        <div class="form__group--2">
            <label for="nome_representante" class="obrigatorio">Cliente</label>
            <select name="id_cliente" id="first-choice" class="input input-name" required="required">
                <option value="" selected>Selecione...</option>
                <?php foreach($clientes as $cliente) : ?>
                    <option value="<?= $cliente["id"] ?>"><?php if($cliente["tipo_cliente"] == 1) { echo $cliente["nome_representante"]; } else { echo $cliente["razaosocial"];} ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="form__group--2">
            <label for="status" class="obrigatorio">Proposta</label>
            <select name="id_proposta" id="second-choice" class="input input-name" required="required">
                <option value="" selected>Selecione...</option>
            </select>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group--2">
            <label for="data_inicio" class="obrigatorio">Data Início</label>
            <input name="data_inicio" id="datainicio" class="input input-investimento" value="" placeholder="Ex: 99/99/9999" required="required"/>
        </div>

        <div class="form__group--2">
            <label for="data_fim" class="obrigatorio">Data Fim</label>
            <input name="data_fim" id="datafim" class="input input-investimento" value="" placeholder="Ex: 99/99/9999" required="required"/>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group--2">
            <label for="valor" class="obrigatorio">Valor</label>
            <input name="valor" id="datainicio" class="input input-investimento" value="" placeholder="Ex: R$ xx,xx" required="required"/>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group--2">
            <label for="envio_contrato" class="obrigatorio">Status</label>
            <select name="envio_contrato" class="input input-name" required="required">
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

    <div class="form__title">Contrato</div>

    <textarea id="field" name="arquivo" class="arquivo__contrato">
    </textarea>

    <div class="form_buttons">
        <a href="<?= base_url("contratos") ?>" alt="Listar Contratos" class="btn btn--cancel">Cancelar</a>
        <button type="submit" class="btn btn-submit">Salvar</button>
    </div>
    
<?php 
    echo form_close();
?>
<script>
VMasker(document.querySelector('#datainicio')).maskPattern('99/99/9999');
VMasker(document.querySelector('#datafim')).maskPattern('99/99/9999');

// baseURL variable
var baseURL= "<?php echo base_url();?>";

//seleciona propostas de acordo com o cliente através de AJAX
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
