<?php
$index = 1;
$lesFichiers =$leForm= $lesDossiers = $path = $disurlinfo = $corps = $msg = $path = $pathnormal = $copybouton = $debug = '';
$dossiers = '';
$textes = '';
$br = $dir_unfound = '';
$lien_grand = 0;
$langage = 'wiki';
$spe_dim = 0;
$largeur = '';
$hauteur = '';
$pourcopier = '';

$prethumb = '';
$afterthumb = '';
$postlien = $prelien = $prehtml = $posthtml = $add = '';
$debug = '';
$pasfound = 0;
$amois = array(
    "01" => "janvier", "02" => "fevrier", "03" => "mars", "04" => "avril",
    "05" => "mai", "06" => "juin", "07" => "juillet", "08" => "aout", "09" => "septembre",
    "10" => "octobre", "11" => "novembre", "12" => "decembre");


require 'urlm_lib/securite.php';
require 'urlm_lib/config.php';
$debug .= '<h2> index </h2>';

function selected($key = 'langage', $val, $retour = 'selected')
{ // détection du langage d'URL choisi pour la présélectionner
    if (isset($_POST[$key]) && $_POST[$key] == $val) {
        echo $retour;
    }
}

$noConf = '';
if (!file_exists($file)) {
    $noConf += "<div class='warning noconf alert alert-warning'>Il n'y a pas de configuration de l'url absolue.
Cliquez sur <a href='urlm_lib/setup.php'>Config</a> pour régler cela.</div>";
} elseif (filesize($file) < 10) {
    $noConf += "<div class='warning noconf alert alert-warning'>l'url absolue est trop courte.
Cliquez sur <a href='urlm_lib/setup.php'>Config</a> pour régler cela.</div>";
}

$thumb = 1;
if (isset($_POST['thumb']) && $_POST['thumb'] == 0) {
    $thumb = 0;
}
//si l'url choppée contient index.php, on retire tout ça
$urlsansindex = explode('index.php', $disurl);

