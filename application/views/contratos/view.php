<h2 class="content__title">Contrato</h2>
<div class="content__view">

    <div class="form__title">Dados</div>
    <div class="form__group">
        <div class="form__group--2">
            <div class="view__label">Cliente:</div>
            <?php foreach($clientes as $cliente) : ?>
                <?php if($cliente["id"] == $contrato["id_cliente"]) { ?>
                    <div class="view__info"><?php if($cliente["tipo_cliente"] == 1) { echo $cliente["nome_representante"]; } else { echo $cliente["razaosocial"];} ?></div>
                <?php }  ?>
            <?php endforeach ?>
        </div>
        <div class="form__group--2">
            <div class="view__label">Proposta:</div>
            <?php foreach($propostas as $proposta) : ?>
                <?php if($proposta["id"] == $contrato["id_proposta"]) { ?>
                    <div class="view__info"><?php echo $proposta["titulo"]; ?></div>
                <?php }  ?>
            <?php endforeach ?>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group--2">
            <div class="view__label">Valor:</div>
            <div class="view__info"><?= $contrato["valor"] ?></div>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group--2">
            <div class="view__label">Data:</div>
            <div class="view__info"><?= $contrato["data_inicio"] ?></div>
        </div>

        <div class="form__group--2">
            <div class="view__label">Data Fim:</div>
            <div class="view__info"><?= $contrato["data_fim"] ?></div>
        </div>
    </div>

    <div class="form_buttons">
        <a href="<?= base_url("contratos") ?>" alt="Listar Clientes" class="btn btn--cancel">Voltar</a>
        <a href="<?= base_url("contratos/print/{$contrato['id']}") ?>" class="btn btn-submit">Imprimir <i class='fa fa-print' aria-hidden='true'></i></a>
    </div>
</div>
