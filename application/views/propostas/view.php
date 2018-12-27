<h2 class="content__title">Proposta</h2>
<div class="content__view">

    <div class="form__title">Dados</div>
    <div class="form__group">
        <div class="form__group--2">
            <div class="view__label">Cliente:</div>
            <?php foreach($clientes as $cliente) : ?>
                <?php if($cliente["id"] == $proposta["id_cliente"]) { ?>
                    <div class="view__info"><?php if($cliente["tipo_cliente"] == 1) { echo $cliente["nome_representante"]; } else { echo $cliente["razaosocial"];} ?></div>
                <?php }  ?>
            <?php endforeach ?>
        </div>
        <div class="form__group--2">
            <div class="view__label">Valor:</div>
            <div class="view__info"><?= $proposta["valor"] ?></div>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group--2">
            <div class="view__label">Data:</div>
            <div class="view__info"><?= $proposta["data"] ?></div>
        </div>

        <div class="form__group--2">
            <div class="view__label">Título:</div>
            <div class="view__info"><?= $proposta["titulo"] ?></div>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group--2">
            <div class="view__label">Forma de pagamento:</div>
            <div class="view__info"><?= $proposta["forma_pagamento"] ?></div>
        </div>

        <div class="form__group--2">
            <div class="view__label">Serviços:</div>
            <div class="view__info"><?= $proposta["servicos"] ?></div>
        </div>
    </div>

    <div>
        <div class="form__group--2">
            <div class="view__label">Status:</div>
            <div class="view__info"><?= $proposta["envio_proposta"] ?></div>
        </div>
        <div class="form__group--2">
            <div class="view__label">Progresso:</div>
            <div class="view__info"><?= $proposta["status"] ?></div>
        </div>
    </div>

    <div class="form_buttons">
        <a href="<?= base_url("propostas") ?>" alt="Listar Clientes" class="btn btn--cancel">Voltar</a>
        <a href="<?= base_url("propostas/print/{$proposta['id']}") ?>" class="btn btn-submit">Imprimir <i class='fa fa-print' aria-hidden='true'></i></a>
    </div>
</div>
