<!DOCTYPE html> 
<html> 
    <head>
        <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/print.css") ?>"/>
    </head> 
    <body onload="window.print(); window.history.back();">
        <div class="arquivo__capa">
            <h1 class="arquivo__logo"><img src="<?= base_url("assets/images/logo_preta.png") ?>"></h1>
            <h2 class="arquivo__title">
                PROPOSTA COMERCIAL </br>
                <?php foreach($clientes as $cliente) : ?>
                    <?php if($cliente["id"] == $proposta["id_cliente"]) { ?>
                        <?php if($cliente["tipo_cliente"] == 1) { echo $cliente["nome_representante"]; } else { echo $cliente["razaosocial"];} ?>
                    <?php }  ?>
                <?php endforeach ?>
            </h2>
            <div class="arquivo__title">INFOBITS CONSULTORIA</div>
            <div class="arquivo__data">Montes Claros</br><?= $proposta["data"] ?></div>
        </div>
        <div class="content__view">
            <?= $proposta["proposta_conteudo"] ?>
        </div>
    </body>
</html>