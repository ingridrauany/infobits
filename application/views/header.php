<html lang="pt-br">
<head>
    <title>Infobits</title>
    <link rel="stylesheet" href="<?= base_url("assets/css/styles.css") ?>">
    <link href="<?= base_url("assets/css/Poppins.css") ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url("assets/css/font-awesome.min.css") ?>">
    <script src="<?= base_url("assets/js/jquery-3.2.1.min.js") ?>"></script>
    <script src="<?= base_url("assets/js/vanilla-masker.min.js") ?>"></script>
    <link rel="icon" type="image/png" href="<?= base_url("assets/images/favicon.png") ?>">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <!-- <script src="<?= base_url("assets/js/tinymce/tinymce.min.js") ?>"></script>
    <script src="<?= base_url("assets/js/tinymce/jquery.tinymce.min.js") ?>"></script> -->
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    
    <script type="text/javascript">
    $(document).ready(function () {
        tinymce.init({
            init_instance_callback : "onInstanceInit",
            selector: '#field, #field1, #field2, #field3',
            height: 200,
            plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
            image_advtab: true,
            pagebreak_split_block: true,
            pagebreak_separator : '<div style=\"page-break-before: always; clear:both\"/></div>',
            language_url: '<?= base_url("assets/js/tinymce/langs/pt_BR.js") ?>',
            required: true,
            setup: function (editor) {
                editor.on('change', function (e) {
                    editor.save();
                });
            }
        });
    });
    </script>
</head>
<body>
    <header class="header">
        <div class="header__content">
            <h1 class="header__logo"><a href="<?= base_url("") ?>" alt="Infobits - Início"><img src="<?= base_url("assets/images/logo-branca.png") ?>"></a></h1>

            <!-- Code for responsive menu -->
            <input type="checkbox" id="control-nav" />
            <label for="control-nav" class="control-nav"></label>
            <label for="control-nav" class="control-nav-close"></label>

            <nav class="navbar">
                <ul class="nav" role="navigation">
                    <?php $active = $this->uri->segment(1); ?>
                    <li class="nav__item <?php if ($active == 'clientes') { ?>active<?php } ?>"><a href="<?= base_url("clientes") ?>">Clientes</a></li>
                    <li class="nav__item <?php if ($active == 'propostas') { ?>active<?php } ?>"><a href="<?= base_url("propostas") ?>">Propostas</a></li>
                    <li class="nav__item <?php if ($active == 'contratos') { ?>active<?php } ?>"><a href="<?= base_url("contratos") ?>">Contratos</a></li>
                    <?php $group_id = $this->ion_auth->get_users_groups()->row()->id;
                    if ($group_id == 1) { ?>
                        <li class="nav__item <?php if ($active == 'auth') { ?>active<?php } ?>"><a href="<?= base_url("auth") ?>">Usuários</a></li>
                    <?php } ?>
                </ul>
            </nav>

            <div class="header__user">
                <div class="user__links">
                    <div class="user__name">Olá, <?php echo $this->ion_auth->user()->row()->first_name; ?></div>
                    <a href="<?= base_url("auth/logout") ?>">Sair <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                </div>
                <div class="user__action"><img src="<?= base_url("assets/images/user.png") ?>" /></div>
            </div>
        </div>
    </header>
    <div class="container clientes">