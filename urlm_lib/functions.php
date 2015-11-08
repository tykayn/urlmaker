<?php

$GLOBALS['debug'] = '<h2> index </h2>';
/**
 * fonctions à utiliser partout
 */

function _log( $msg ) {
	$GLOBALS['debug'] .= '<br> <i class="fa fa-circle"></i> ' . $msg;
}

/**
 * prendre l'url courante de la page
 * @return string
 */
function curPageURL() {
	$pageURL = 'http';
	if ( isset( $_SERVER[ "HTTPS" ] ) && $_SERVER[ "HTTPS" ] == "on" ) {
		$pageURL .= "s";
	}
	$pageURL .= "://";
	if ( $_SERVER[ "SERVER_PORT" ] != "80" ) {
		$pageURL .= $_SERVER[ "SERVER_NAME" ] . ":" . $_SERVER[ "SERVER_PORT" ] . $_SERVER[ "REQUEST_URI" ];
	}
	else {
		$pageURL .= $_SERVER[ "SERVER_NAME" ] . $_SERVER[ "REQUEST_URI" ];
	}
	return $pageURL;
}


/**
 * trouver le browser courant
 * @return string
 */
function get_user_browser() {
	$u_agent = $_SERVER[ 'HTTP_USER_AGENT' ];
	$ub = '';
	if ( preg_match( '/MSIE/i' , $u_agent ) ) {
		$ub = "ie";
	}
	elseif ( preg_match( '/Firefox/i' , $u_agent ) ) {
		$ub = "firefox";
	}
	elseif ( preg_match( '/Safari/i' , $u_agent ) ) {
		$ub = "safari";
	}
	elseif ( preg_match( '/Chrome/i' , $u_agent ) ) {
		$ub = "chrome";
	}
	elseif ( preg_match( '/Flock/i' , $u_agent ) ) {
		$ub = "flock";
	}
	elseif ( preg_match( '/Opera/i' , $u_agent ) ) {
		$ub = "opera";
	}

	return $ub;
}

/**
 *
 * @param type $url
 */
function cleanpath( $url ) {
	$pathboot = str_replace( 'http://' , 'hypertextprefix' , $url );
	$path = str_replace( '//' , '/' , $pathboot );
	$path = str_replace( "\\" , '/' , $path );
	$path = str_replace( 'hypertextprefix' , 'http://' , $path );
	return $path;
}

/**
 * @param $varPost
 * @return array
 */
//function ranger_tableau($varPost)
//{
//    $tmp = [];
//    $scan = [];
//
//    if (isset($_POST[$varPost])) {
//        if ($_POST[$varPost] == 'modif') {
//            foreach ($scan as $f) {
//                $tmp[basename($f)] = filemtime($pathnormal . '/' . $f);  //ranger fichiers par date de création
//            }
//            asort($tmp);
//            $scan = array_keys($tmp);
//            // print_r($tmp);
//        } elseif ($_POST[$varPost] == 'crea') {
//            foreach ($scan as $f) {
//                $tmp[basename($f)] = filectime($pathnormal . '/' . $f);  //ranger fichiers par date de création
//            }
//            asort($tmp);
//            $scan = array_keys($tmp);
//        } elseif ($_POST[$varPost] == 'desc') {
//            arsort($scan);
//        } elseif ($_POST[$varPost] == 'asc') {
//            sort($scan);
//        }
//
//    }
//    else{
//        log('nope pour le rangement de tableau');
//    }
//    return $scan;
//}


/**
 * fonctions pour le template
 */

/**
 * détection du langage d'URL choisi pour la présélectionner dans le template
 * @param string $key
 * @param $val
 * @param string $retour
 */
function selected( $key = 'langage' , $val , $retour = 'selected' ) {
	if ( isset( $_POST[ $key ] ) && $_POST[ $key ] == $val ) {
		echo $retour;
	}
}
