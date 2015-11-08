<?php
/** URL-maker
 * @name URL -maker
 * @author Baptiste Lemoine - http://artlemoine.com
 * @version 1
 * @date August 06, 2011
 * @category web application
 * @example Visit http://artlemoine.com/medias/apps/url-maker/demo
 */

require 'urlm_lib/prepend.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>URL maker Tykayn</title>
    <link rel="stylesheet" media="screen" type="text/css" title="Mon design" href="urlm_lib/design.css"/>
    <link rel="stylesheet" media="screen" type="text/css" title="Mon design"
        href="bower_components/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" media="screen" type="text/css" title="Mon design"
        href="bower_components/font-awesome/css/font-awesome.css"/>
    <link rel="shortcut icon" type="image/png" href="urlm_lib/img/favicon.png"/>

</head>
<body>

<div id='main' class="container">

    <div class="row">
        <div class="col-lg-4">
            <nav>
                <a class="btn btn-primary" href='?p=top'>
                    <img src='urlm_lib/img/favicon.png' alt='URL maker logo'/> Accueil
                </a>
                <a class="btn btn-primary" href='?p=year'>Année <?php echo date('Y'); ?></a>
                <a class="btn btn-primary" href='?p=month'> <?php echo date('m'); ?>e Mois</a>
                        <span class='help'>
                            <a href='urlm_lib/help/help.php'>
                                | Aide
                                <i class="fa fa-help"></i>
                            </a>
                        </span>
            </nav>
            <?php
            echo $noConf;
            require('urlm_lib/form.php');
            echo $leForm;
            ?>
        </div>
        <div class="col-lg-4">
            <?php
            require('urlm_lib/dossiers.php');
            //            echo $msg;
            ?>

        </div>
        <div class="col-lg-4">
            <div class="well">


                <?php

                require('urlm_lib/resultats.php');
                echo $lesResultats;
                ?>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php
            echo $corps;
            ?>
        </div>
    </div>
    <footer class="row-fluid well">
        <div id='credits'>
            Aide et application crées par
            <a href='http://artlemoine.com'>Baptiste Lemoine (artlemoine.com)</a>
            . Version 1.6
        </div>
    </footer>


</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
    $(function () {
        dimspe = $('#dim_spe');
        dimspe.hide();

        // afficher la dimension spéciale si html sélectionné
        $('#sel_lang').on('change', function () {
            if ($('#sel_lang').val() == 'html')
                dimspe.show();
            else {
                dimspe.hide();
            }
        })
    });
</script>
</body>
</html>
