<?php
/**
 * URL-maker
 * @name URL -maker
 * @author Baptiste Lemoine - http://artlemoine.com
 * @version 1
 * @date August 06, 2011
 * @category web application
 * @example Visit http://artlemoine.com/medias/apps/url-maker/demo
 */

//en cas d'envie d'afficher les données de débug et de config, mettre à 1 au lieu de 0.
$montrer_config = 0;
$montrer_debug = 0;
$debug .= '<h2> config </h2>';
//adresses pour tester URL maker en local
$localurl = 'http://localhost:8080/urlmaker'; //http://localhost/url_maker
$localroot = 'C:\wamp\www\url_maker'; //C:\wamp\www\url_maker

//adresse ABSOLUE du dossier où se trouve cette page sur un serveur web.  ça ne fonctionnera pas sur un autre serveur. Regardez sur http://www.ailesse.info/~tykayn/bazar/kotlife pour une démo
//servira à créer les URL à copier, par exemple:
//mettez selon le nom de votre site  $disurl='http://monsite.com/urlmaker';   
$disurl = '';

//adresse RELATIVE du dossier où se trouve cette page sur un serveur web. par défaut vaut:   getcwd().'/'
$disrel = getcwd() . '/';

//adresse de la page pour créer un nouveau billet de blog. par exemple http://monsite.com/blog/admin/post.php
$blognewposturl = '';


date_default_timezone_set('Europe/Paris');

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
/**
 *
 * @param type $url
 */
function cleanpath($url)
{
    $pathboot = str_replace('http://', 'hypertextprefix', $url);
    $path = str_replace('//', '/', $pathboot);
    $path = str_replace("\\", '/', $path);
    $path = str_replace('hypertextprefix', 'http://', $path);
    return $path;
}
