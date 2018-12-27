<h2 class="content__title">Contratos</h2>

<?php if($this->session->flashdata("success")): ?>
    <p class='alert alert-success'><?= $this->session->flashdata("success"); ?></p>
<?php endif; ?>

<?php if($this->session->flashdata("danger")): ?>
    <p class='alert alert-danger'><?= $this->session->flashdata("danger"); ?></p>
<?php endif; ?>

<a href="<?= base_url("contratos/create") ?>" class="btn btn--new">Cadastrar Contrato</a>
<div class="table__container">
<?php echo form_open("contratos/pesquisa", 'class="table__header" id="form-pesquisa" name="pesquisa"'); ?>
        <div class="table__download">
            <a href="<?= base_url("contratos/exportCSV") ?>" class=""><i class="fa fa-cloud-download" aria-hidden="true"></i> Download Lista de Contratos</a>
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
    if(empty($contratos)) { ?>
        <div class="warning">Não há nenhum contrato cadastrado.</div>
    <? } else { ?>
    <table class="table table_clientes">
        <thead> 
            <tr>
                <th class="tab__title">Cliente</th>
                <th class="tab__title">Proposta</th>
                <th class="tab__title">Status</th>
                <th class="tab__title">Progresso</th>
                <th class="tab__title">Data Início</th>
                <th class="tab__title">Data Fim</th>
                <th class="tab__title">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($contratos as $contrato) : ?>
            <tr>
                <?php foreach($clientes as $cliente) : ?>
                    <?php if($cliente['id'] == $contrato->id_cliente) { ?>
                        <td class="tab__content"><a href="<?= base_url("clientes/{$contrato->id_cliente}") ?>"><?php if($cliente['tipo_cliente'] == 1) { echo $cliente['nome_representante']; } else { echo $cliente['razaosocial'];} ?></a></td>
                    <?php }  ?>
                <?php endforeach ?>
                <?php foreach($propostas as $proposta) : ?>
                    <?php if($proposta['id'] == $contrato->id_proposta) { ?>
                        <td class="tab__content"><a href="<?= base_url("propostas/{$contrato->id_proposta}") ?>"><?php echo $proposta['titulo'] ?></a></td>
                    <?php }  ?>
                <?php endforeach ?>
                <td class="tab__content"><?php echo $contrato->envio_contrato; ?></td>
                <?php $progresso = $contrato->status;
                    if ($progresso == 'Em progresso') { $label_status = 'icon-progresso'; }
                    if ($progresso == 'Aceita') { $label_status = 'icon-aceita'; }
                    if ($progresso == 'Recusada') { $label_status = 'icon-recusada'; } ?>
                <td class="tab__content"><i class="fa fa-circle <?php echo $label_status; ?>" aria-hidden="true"></i><?= $contrato->status; ?></td>
                <td class="tab__content"><?php echo $contrato->data_inicio ?></td>
                <td class="tab__content"><?php echo $contrato->data_fim ?></td>
                <td class="tab__actions">
                    <?= anchor("contratos/{$contrato->id}", "<i class='fa fa-eye' aria-hidden='true'></i>") ?>
                    <?= anchor("contratos/edit/{$contrato->id}", "<i class='fa fa-pencil-square-o' aria-hidden='true'></i>") ?>
                    <a href="<?= base_url("/contratos/delete/{$contrato->id}") ?>" onclick="return confirm('Confirma exclusão do registro?')" alt="Excluir Contrato"><i class='fa fa-trash' aria-hidden='true'></i></a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php } ?>
</div>
