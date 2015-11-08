<?php

_log( '<h2> controller </h2>');
$dossierscanned = '';
$dactuel = date( '/Y/m' ) . $amois[ date( 'm' ) ];

$path = __DIR__ . '/../../';
//si y'a pas de dossier défini ET qu'il existe un dossier actuel y aller, sinon aller à la racine
//si y'a un dossier défini aller a ce dossier

//var_dump($_POST);


if(isset($_POST[ 'path' ])){
	$postedPath = $_POST[ 'path' ];
	if ( isset( $postedPath ) && !empty( $postedPath ) ) {
		$dossierscanned = str_replace( $disrel , '' , $postedPath );
		$path = cleanpath( $postedPath );
		_log( '#1# $_POST[\'path\'] $path=' . $path);
	}
	elseif ( isset( $_GET[ 'path' ] ) && !empty( $_GET[ 'path' ] ) ) {
		$dossierscanned = str_replace( $disrel , '' , $_GET[ 'path' ] );
		$path = cleanpath( $_GET[ 'path' ] );
		_log( '#1# $_GET[\'path\'] $path=' . $path);
	}
}
elseif(isset($_GET[ 'p' ])){
	$partie = $_GET[ 'p' ];
	if ( isset( $partie ) && $partie == "year" ) {
		$path = getcwd() . date( '/Y/' );
		_log( '#2# year $path=' . $path);
	}
	elseif ( isset( $partie ) && $partie == "month" ) {
		$path = getcwd() . date( '/Y/m' ) . $amois[ date( 'm' ) ];
		_log( '#5# month $path= ' . $path);
	}
	elseif ( isset( $partie ) && $partie == "top" ) {
		$path = getcwd();
		_log( '#3# top $path=' . $path);
	}
}
else {
	$path = getcwd() . $dactuel;
	_log( '#4# getcwd().$dactuel $path=' . $path);
}


//scan des dossiers. 1erement: dossier année/mois.
//sinon dossier getcwd/
//sinon fok


$pathnormal = $path;
_log( '<br/>#6#  ' . $pathnormal . '<br/>=<br/>' . $path . ';');

if ( file_exists( $path ) ) {
	$scan = scandir( $path );
	_log( '<br/>#4# $scan = scandir(' . $path . ')');
}
elseif ( file_exists( getcwd() . date( 'Y/' ) ) ) {
	$scan = scandir( getcwd() . date( 'Y/' ) );
	_log( '<br/># fallback scan d\'année');
}
else {
	$dir_unfound = 1;
	_log( '<br/># dossier non trouvé ' . $path );
	// $scan = scandir(getcwd());
	$corps .= "<span class='info'> Dossier incorrect:<span class='chemin'> $pathnormal </span>, </span>";
}

if ( empty( $scan[ 3 ] ) ) {
	$textes .= "<span class='info'><span class='chemin'> $pathnormal </span>ne contient pas de fichiers</span>";
}
//enlever getcwd dans path
// ajouter disurl a path
//virer les espaces
$disurl = str_replace( ' ' , '' , $disurl );
$path = $disurl . '/' . $dossierscanned;

_log( '<br/><span class="success">#5# $dossierscanned = ' . $dossierscanned . '</span>' );
if ( stristr( curPageURL() , 'http://localhost' ) ) {

	$path = $localurl;
	_log( "<h2>-------LOCALHOST--------- </h2>
                            <span class='success'>
                            <h3>affiché:  $path ,</h3><h3> scanné $pathnormal </h3>
                                </span>" );
}
else {

	_log( '
				<span class="success">cwd:  ' . getcwd() . '</span>
				<h2>-------DISTANT HOTE--------- </h2>
				<span class="success"><h3>affiché:  ' . $path . '</h3>
				<h3> scanné ' . $pathnormal . ' </h3></span>' );

}
//pour éviter les double slash de fin de chemin
_log( " " . substr( $pathnormal , -1 ) . " et " . " hop<br/><br/><br/>" );
if ( substr( $pathnormal , -1 ) == '/' ) {
	$path = substr( $pathnormal , 0 , -1 );
	_log( "un / à été retiré de pathnormal" );

}
else {
	_log( "pathnormal ne se finit pas par /" );
}

_log( "$disurlinfo
<br/> path: $path
<br/> pathnormal: $pathnormal <br/>" );