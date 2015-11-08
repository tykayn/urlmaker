<?php

$index = 1;
$lien_grand = 0;
$langage = 'wiki'; // par défaut
$spe_dim = 0;


/**
 * init de variables
 */
$postlien = $prelien = $prehtml = $posthtml = $add = $lesFichiers = $leForm = $lesDossiers = $path = $disurlinfo = $corps = $msg = $path = $pathnormal = $copybouton = $debug = '';
$dossiers = '';
$textes = '';
$br = $dir_unfound = '';
$largeur = '';
$hauteur = '';
$pourcopier = '';
$prethumb = '';
$lesResultats = '';
$afterthumb = '';
$debug = '';
$pasfound = 0;
$debug .= '<h2> index </h2>';

$amois = array(
    "01" => "janvier", "02" => "fevrier", "03" => "mars", "04" => "avril",
    "05" => "mai", "06" => "juin", "07" => "juillet", "08" => "aout", "09" => "septembre",
    "10" => "octobre", "11" => "novembre", "12" => "decembre");


require 'urlm_lib/securite.php';
require 'urlm_lib/config.php';

require('functions.php');
require('check_config.php');

//localisation du dossier

require 'urlm_lib/controller.php';
require 'urlm_lib/scanner.php';


