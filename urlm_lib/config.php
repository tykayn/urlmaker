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
$montrer_config = 1;
$montrer_debug = 1;
$debug .= '<h2> config </h2>';
//adresses pour tester URL maker en local
$localurl = 'http://localhost/urlmaker'; // http://localhost/url_maker
$localroot = 'C:\wamp\www\url_maker'; //    C:\wamp\www\url_maker  version windows avec wamp
$localroot = 'C:\wamp\www\url_maker'; //    /var/www/html/urlmaker    version ubuntu avec apache2

//  adresse ABSOLUE du dossier où se trouve cette page sur un serveur web.
//  ça ne fonctionnera pas sur un autre serveur. Regardez sur http://blog.artlemoine.com/public/i/urlmaker pour une démo
//  servira à créer les URL à copier, par exemple:
//  mettez selon le nom de votre site  $disurl='http://monsite.com/urlmaker';
$disurl = '';

//  adresse RELATIVE du dossier où se trouve cette page sur un serveur web.
//  par défaut vaut:   getcwd().'/'
$disrel = getcwd() . '/';

//  adresse de la page pour créer un nouveau billet de blog.
//  par exemple http://monsite.com/blog/admin/post.php
$blognewposturl = '';


date_default_timezone_set('Europe/Paris');

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
