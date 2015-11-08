<?php

$debug .= '<h2> controller </h2>';
$dossierscanned = '';
$dactuel = date('/Y/m') . $amois[date('m')];

$path = __DIR__ .'/../../';
//si y'a pas de dossier défini ET qu'il existe un dossier actuel y aller, sinon aller à la racine
//si y'a un dossier défini aller a ce dossier
if (isset($_POST['path']) && !empty($_POST['path'])) {
    $dossierscanned = str_replace($disrel, '', $_POST['path']);
    $path = cleanpath($_POST['path']);
    $debug .= '#1# $_POST[\'path\'] $path=' . $path;
} elseif (isset($_GET['path']) && !empty($_GET['path'])) {
    $dossierscanned = str_replace($disrel, '', $_GET['path']);
    $path = cleanpath($_GET['path']);
    $debug .= '#1# $_GET[\'path\'] $path=' . $path;
} elseif (isset($_GET['p']) && $_GET['p'] == "year") {
    $path = getcwd() . date('/Y/');
    $debug .= '#2# year $path=' . $path;
} elseif (isset($_GET['p']) && $_GET['p'] == "month") {
    $path = getcwd() . date('/Y/m') . $amois[date('m')];
    $debug .= '#5# month $path= ' . $path;
} elseif (isset($_GET['p']) && $_GET['p'] == "top") {
    $path = getcwd();
    $debug .= '#3# top $path=' . $path;
} else {
    $path = getcwd() . $dactuel;
    $debug .= '#4# getcwd().$dactuel $path=' . $path;
}


//scan des dossiers. 1erement: dossier année/mois.
//sinon dossier getcwd/
//sinon fok


$pathnormal = $path;
$debug .= '<br/>#6#  ' . $pathnormal . '<br/>=<br/>' . $path . ';';

if (file_exists($path)) {
    $scan = scandir($path);
    $debug .= '<br/>#4# $scan = scandir(' . $path . ')';
} elseif (file_exists(getcwd() . date('Y/'))) {
    $scan = scandir(getcwd() . date('Y/'));
    $debug .= '<br/># fallback scan d\'année';
} else {
    $dir_unfound = 1;
    $debug .= '<br/># dossier non trouvé ' . $path;
    // $scan = scandir(getcwd());
    $corps .= "<span class='info'> Dossier incorrect:<span class='chemin'> $pathnormal </span>, </span>";
    // $path = getcwd();
    // $pathnormal = getcwd();
}

//	print_r($_POST);
if (empty($scan[3])) {
    $textes .= "<span class='info'><span class='chemin'> $pathnormal </span>ne contient pas de fichiers</span>";
}
//enlever getcwd dans path
// ajouter disurl a path

//virer les espaces
$disurl = str_replace(' ', '', $disurl);
$path = $disurl . '/' . $dossierscanned;

$debug .= '<br/><span class="success">#5# $dossierscanned = ' . $dossierscanned . '</span>';
if (stristr(curPageURL(), 'http://localhost')) {

    $path = $localurl;
    $debug .= "<h2>-------LOCALHOST--------- </h2>
                            <span class='success'>
                            <h3>affiché:  $path ,</h3><h3> scanné $pathnormal </h3>
                                </span>";

} else {


    $debug .= '
				<span class="success">cwd:  ' . getcwd() . '</span>
				<h2>-------DISTANT HOTE--------- </h2>
				<span class="success"><h3>affiché:  ' . $path . '</h3><h3> scanné ' . $pathnormal . ' </h3></span>';

}
//pour éviter les double slash de fin de chemin
$debug .= " " . substr($pathnormal, -1) . " et " . " hop<br/><br/><br/>";
if (substr($pathnormal, -1) == '/') {
    $path = substr($pathnormal, 0, -1);
    $debug .= "un / à été retiré de pathnormal";

} else {
    $debug .= "pathnormal ne se finit pas par /";;
}

$debug .= "$disurlinfo <br/> path: $path <br/> pathnormal: $pathnormal <br/>";