<!DOCTYPE html> 
<html> 
    <head>
        <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/print.css") ?>"/>
    </head> 
    <body onload="window.print(); window.history.back();">
        <h1 class="header__logo"><img src="<?= base_url("assets/images/logo-azul.png") ?>"></h1>
        <h2 class="content__title">Ficha do Cliente</h2>
        <div class="content__view">
            <div class="form__title">Representante</div>
            <div class="form__group">
                <div class="form__group--2">
                    <div class="view__label">Nome:</div>
                    <div class="view__info"><?= $cliente["nome_representante"] ?></div>
                </div>
                <div class="form__group--2">
                    <div class="view__label">CPF:</div>
                    <div class="view__info"><?= $cliente["cpf_representante"] ?></div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group--2">
                    <div class="view__label">Telefone:</div>
                    <div class="view__info"><?= $cliente["tel_representante"] ?></div>
                </div>
                <div class="form__group--2">
                    <div class="view__label">Estado Civil:</div>
                    <div class="view__info"><?= $cliente["estado_civil"] ?></div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group--3">
                    <div class="view__label">CEP:</div>
                    <div class="view__info"><?= $cliente["cep_representante"] ?></div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group--3">
                    <div class="view__label">Rua:</div>
                    <div class="view__info"><?= $cliente["rua_representante"] ?></div>
                </div>

                <div class="form__group--3">
                    <div class="view__label">Número:</div>
                    <div class="view__info"><?= $cliente["numero_representante"] ?></div>
                </div>

                <div class="form__group--3">
                    <div class="view__label">Bairro:</div>
                    <div class="view__info"><?= $cliente["bairro_representante"] ?></div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group--3">
                    <div class="view__label">Cidade:</div>
                    <div class="view__info"><?= $cliente["cidade_representante"] ?></div>
                </div>

                <div class="form__group--3">
                    <div class="view__label">Estado:</div>
                    <div class="view__info"><?= $cliente["estado_representante"] ?></div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group--4">
                    <div class="view__label">Complemento:</div>
                    <div class="view__info"><?= $cliente["complemento_representante"] ?></div>
                </div>
            </div>
        <?php if($cliente["tipo_cliente"] != 1) { ?>
            <div class="form__title">Empresa</div>
            <div class="form__group">
                <div class="form__group--2">
                    <div class="view__label">Razão Social:</div>
                    <div class="view__info"><?= $cliente["razaosocial"] ?></div>
                </div>
                <div class="form__group--2">
                    <div class="view__label">E-mail:</div>
                    <div class="view__info"><?= $cliente["email_empresa"] ?></div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group--2">
                    <div class="view__label">Telefone:</div>
                    <div class="view__info"><?= $cliente["telefone_empresa"] ?></div>
                </div>
                <div class="form__group--2">
                    <div class="view__label">CNPJ:</div>
                    <div class="view__info"><?= $cliente["cnpj"] ?></div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group--3">
                    <div class="view__label">CEP:</div>
                    <div class="view__info"><?= $cliente["cep_empresa"] ?></div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group--3">
                    <div class="view__label">Rua:</div>
                    <div class="view__info"><?= $cliente["rua_empresa"] ?></div>
                </div>

                <div class="form__group--3">
                    <div class="view__label">Número:</div>
                    <div class="view__info"><?= $cliente["numero_empresa"] ?></div>
                </div>

                <div class="form__group--3">
                    <div class="view__label">Bairro:</div>
                    <div class="view__info"><?= $cliente["bairro_empresa"] ?></div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group--3">
                    <div class="view__label">Cidade:</div>
                    <div class="view__info"><?= $cliente["cidade_empresa"] ?></div>
                </div>

                <div class="form__group--3">
                    <div class="view__label">Estado:</div>
                    <div class="view__info"><?= $cliente["estado_empresa"] ?></div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group--4">
                    <div class="view__label">Complemento:</div>
                    <div class="view__info"><?= $cliente["complemento_empresa"] ?></div>
                </div>
            </div>
        <?php } ?>
        </div>
    </body>
</html>