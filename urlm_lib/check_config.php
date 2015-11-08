<?php
/**
 * vérifier les éléments de configuration
 */


if (!file_exists($file)) {
    $noConf += "<div class='warning noconf alert alert-warning'>Il n'y a pas de configuration de l'url absolue.
Cliquez sur <a href='urlm_lib/setup.php'>Config</a> pour régler cela.</div>";
} elseif (filesize($file) < 10) {
    $noConf += "<div class='warning noconf alert alert-warning'>l'url absolue est trop courte.
Cliquez sur <a href='urlm_lib/setup.php'>Config</a> pour régler cela.</div>";
}


$browserrr = "Votre browser: " . get_user_browser();

$config_infos = nl2br("
Getcwd: " . getcwd() . "
Adresse absolue: $disurl
Adresse relative: $disrel
Adresse de blog nouveau post: $blognewposturl
$browserrr
");


//teste si l'appli a été configuré avec $disurl
if (!file_exists($file) && $index == 1) {


    header("Location: urlm_lib/setup.php");/* Redirection du navigateur */
    //	exit;

} else {
    // Lit un fichier, et le place dans une chaîne
    $handle = fopen($file, "r");

    $disurl = fread($handle, filesize($file));
    fclose($handle);

    $disurlinfo .= "<span class='success'>disurl: $disurl</span>";
}



if (isset($_POST['thumb']) && $_POST['thumb'] == 0) {
    $thumb = 0;
}
//si l'url choppée contient index.php, on retire tout ça
$boom = explode('index.php', $disurl);
$urlsansindex = $boom[0];