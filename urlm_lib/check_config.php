<?php
/**
 * vérifier les éléments de configuration
 */

/**
 * prendre l'url courante de la page
 * @return string
 */
function curPageURL()
{
    $pageURL = 'http';
    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
        $pageURL .= "s";
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}


/**
 * trouver le browser courant
 * @return string
 */
function get_user_browser()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $ub = '';
    if (preg_match('/MSIE/i', $u_agent)) {
        $ub = "ie";
    } elseif (preg_match('/Firefox/i', $u_agent)) {
        $ub = "firefox";
    } elseif (preg_match('/Safari/i', $u_agent)) {
        $ub = "safari";
    } elseif (preg_match('/Chrome/i', $u_agent)) {
        $ub = "chrome";
    } elseif (preg_match('/Flock/i', $u_agent)) {
        $ub = "flock";
    } elseif (preg_match('/Opera/i', $u_agent)) {
        $ub = "opera";
    }

    return $ub;
}

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

$file = 'urlm_lib/config_abs.conf';
if (!file_exists($file) && $index == 1) {

    //teste si l'appli a été configuré avec $disurl
    header("Location: urlm_lib/setup.php");/* Redirection du navigateur */
    //	exit;

} else {
    // Lit un fichier, et le place dans une chaîne
    $handle = fopen($file, "r");

    $disurl = fread($handle, filesize($file));
    fclose($handle);

    $disurlinfo .= "<span class='success'>disurl: $disurl</span>";
}
