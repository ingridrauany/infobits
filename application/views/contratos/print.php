<!DOCTYPE html> 
<html> 
    <head>
        <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/print.css") ?>"/>
    </head> 
    <body onload="window.print(); window.history.back();">
        <div class="content__view">
            <div class="arquivo__group"><?= $contrato["arquivo"] ?></div>
        </div>
    </body>
</html>