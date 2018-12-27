<h2 class="content__title">Propostas</h2>

<?php if($this->session->flashdata("success")): ?>
    <p class='alert alert-success'><?= $this->session->flashdata("success"); ?></p>
<?php endif; ?>

<?php if($this->session->flashdata("danger")): ?>
    <p class='alert alert-danger'><?= $this->session->flashdata("danger"); ?></p>
<?php endif; ?>

<a href="<?= base_url("index.php/propostas/create") ?>" class="btn btn--new">Cadastrar Proposta</a>
<div class="table__container">
<?php echo form_open("propostas/pesquisa", 'class="table__header" id="form-pesquisa" name="pesquisa"'); ?>
        <div class="table__download">
            <a href="<?= base_url("propostas/exportCSV") ?>" class=""><i class="fa fa-cloud-download" aria-hidden="true"></i> Download Lista de Propostas</a>
        </div>
        <div class="table__search">
            Buscar por:
            <select name="pesquisa" class="input" id="pesquisa" required>
                <option value="data">Data</option>
                <option value="cliente">Cliente</option>
            </select>
            <input type="text" name="pesquisa_content" class="input input-search" id="input_pesquisa" required/>
            <button type="submit" class="btn btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>        
    <?php 
        echo form_close();
?>
<?php 
    if(empty($propostas)) { ?>
        <div class="warning">Não há nenhuma proposta cadastrada.</div>
    <? } else { ?>
    <table class="table table_clientes">
        <thead> 
            <tr>
                <th class="tab__title">Cliente</th>
                <th class="tab__title">Status</th>
                <th class="tab__title">Progresso</th>
                <th class="tab__title">Data</th>
                <th class="tab__title">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($propostas as $proposta) : ?>
            <tr>
                <?php foreach($clientes as $cliente) : ?>
                    <?php if($cliente['id'] == $proposta->id_cliente) { ?>
                        <td class="tab__content"><a href="<?= base_url("propostas/{$proposta->id_cliente}") ?>"><?php if($cliente['tipo_cliente'] == 1) { echo $cliente['nome_representante']; } else { echo $cliente['razaosocial'];} ?></a></td>
                    <?php }  ?>
                <?php endforeach ?>
                <td class="tab__content"><?php echo $proposta->envio_proposta; ?></td>
                <?php $progresso = $proposta->status;
                if ($progresso == 'Em progresso') { $label_status = 'icon-progresso'; }
                if ($progresso == 'Aceita') { $label_status = 'icon-aceita'; }
                if ($progresso == 'Recusada') { $label_status = 'icon-recusada'; } ?>
                <td class="tab__content"><i class="fa fa-circle <?php echo $label_status; ?>" aria-hidden="true"></i><?= $proposta->status; ?></td>
                <td class="tab__content"><?php echo $proposta->data; ?></td>
                <td class="tab__actions">
                    <?= anchor("propostas/{$proposta->id}", "<i class='fa fa-eye' aria-hidden='true'></i>") ?>
                    <?= anchor("propostas/edit/{$proposta->id}", "<i class='fa fa-pencil-square-o' aria-hidden='true'></i>") ?>
                    <a href="<?= base_url("/propostas/delete/{$proposta->id}") ?>" onclick="return confirm('Confirma exclusão do registro?')" alt="Excluir Proposta"><i class='fa fa-trash' aria-hidden='true'></i></a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <div class="paginacao">
        <?php echo $pagination; ?>
    </div>
<?php } ?>
</div>