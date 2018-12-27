<h2 class="content__title">Clientes</h2>

<?php if($this->session->flashdata("success")): ?>
    <p class='alert alert-success'><?= $this->session->flashdata("success"); ?></p>
<?php endif; ?>

<?php if($this->session->flashdata("danger")): ?>
    <p class='alert alert-danger'><?= $this->session->flashdata("danger"); ?></p>
<?php endif; ?>

<a href="<?= base_url("clientes/create") ?>" class="btn btn--new">Cadastrar Cliente</a>


<div class="table__container">
<?php echo form_open("clientes/pesquisa", 'class="table__header" id="form-pesquisa" name="pesquisa"'); ?>
        <div class="table__download">
            <a href="<?= base_url("clientes/exportCSV") ?>" class=""><i class="fa fa-cloud-download" aria-hidden="true"></i> Download Lista de Clientes</a>
        </div>
        <div class="table__search">
            Buscar por:
            <select name="pesquisa" class="input" id="pesquisa" required>
                <option value="nome">Nome</option>
                <option value="email">E-mail</option>
                <option value="cpf">CPF</option>
                <option value="cnpj">CNPJ</option>
            </select>
            <input type="text" name="pesquisa_content" class="input input-search" id="input_pesquisa" required/>
            <button type="submit" class="btn btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>        
    <?php 
        echo form_close();
?>
<?php 
    if(empty($clientes)) { ?>
        <div class="warning">Não há nenhum cliente cadastrado.</div>
    <? } else { ?>
    <table class="table table_clientes">
        <thead> 
            <tr>
                <th class="tab__title">Nome</th>
                <th class="tab__title">E-mail</th>
                <th class="tab__title">Telefone</th>
                <th class="tab__title">CPF/CNPJ</th>
                <th class="tab__title">Ações</th>
            </tr>
        </thead>
        <tbody> 
            <?php foreach($clientes as $cliente) : ?>
            <tr>
                <td class="tab__content"><?php if($cliente->tipo_cliente == 1) { echo $cliente->nome_representante; } else { echo $cliente->razaosocial;} ?></td>
                <td class="tab__content"><?php if($cliente->tipo_cliente == 1) { echo $cliente->email_representante; } else { echo $cliente->email_empresa;} ?></td>
                <td class="tab__content"><?php if($cliente->tipo_cliente == 1) { echo $cliente->tel_representante; } else { echo $cliente->telefone_empresa;} ?></td>
                <td class="tab__content"><?php if($cliente->tipo_cliente == 1) { echo $cliente->cpf_representante; } else { echo $cliente->cnpj; } ?></td>
                <td class="tab__actions">
                    <?= anchor("clientes/{$cliente->id}", "<i class='fa fa-eye' aria-hidden='true'></i>") ?>
                    <?= anchor("clientes/edit/{$cliente->id }", "<i class='fa fa-pencil-square-o' aria-hidden='true'></i>") ?>
                    <a href="<?= base_url("/clientes/delete/{$cliente->id}") ?>" onclick="return confirm('Confirma exclusão do registro?')" alt="Excluir Cliente"><i class='fa fa-trash' aria-hidden='true'></i></a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <div class="paginacao">
        <?php if($pagination != null) { echo $pagination; } ?>
    </div>
    <?php } ?>
</div>
<script>
$(document).ready(function() {
    $('#pesquisa').on('change', function() {
        var valor = $(this).val();
        if(valor == 'cpf') {
            VMasker(document.querySelector('#input_pesquisa')).maskPattern('999.999.999-99');
        } else if(valor == 'cnpj') {
            VMasker(document.querySelector('#input_pesquisa')).maskPattern('99.999.999/9999-99');
        } else {
            VMasker(document.querySelector('#input_pesquisa')).maskPattern('');
        }
    });
});
</script>
