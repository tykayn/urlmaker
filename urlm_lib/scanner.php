<?php
$debug .= '<h2> scanner </h2>';
if ( $dir_unfound != 1 ) {


	// rangement du tableau de scan

//    $scan = ranger_tableau('sort');

	if ( isset( $_POST[ $varPost ] ) ) {
		if ( $_POST[ $varPost ] == 'modif' ) {
			foreach ( $scan as $f ) {
				$tmp[ basename( $f ) ] = filemtime( $pathnormal . '/' . $f );  //ranger fichiers par date de création
			}
			asort( $tmp );
			$scan = array_keys( $tmp );
			// print_r($tmp);
		}
		elseif ( $_POST[ $varPost ] == 'crea' ) {
			foreach ( $scan as $f ) {
				$tmp[ basename( $f ) ] = filectime( $pathnormal . '/' . $f );  //ranger fichiers par date de création
			}
			asort( $tmp );
			$scan = array_keys( $tmp );
		}
		elseif ( $_POST[ $varPost ] == 'desc' ) {
			arsort( $scan );
		}
		elseif ( $_POST[ $varPost ] == 'asc' ) {
			sort( $scan );
		}

	}
	else {
		log( 'nope pour le rangement de tableau' );
	}


	$prem_img = 0;

	foreach ( $scan AS $k => $v ) {
		//	$textes .='<br/> '.$k.' ->'.$v;
		_log( "<br/> scan $k=>$v " );
		//si diff�rent de . ou ..//exclut les deux 1e lignes des dossiers
		if ( $v != '.' && $v != '..' ) {
			if ( preg_match( "#\.|\.\.]#" , $v ) ) {
				//ce sont des images

				//texte alternatif
				$alt = substr( str_replace( [ '_' , '-' , '(' , ')' ] , ' ' , $v ) , 0 , -4 );

				//selon le langage
				if ( isset( $_POST[ "langage" ] ) && $_POST[ "langage" ] != 'wiki' ) {
					$lang = $_POST[ "langage" ];
					/**
					 * HTML
					 **/
					if ( $lang == 'html' ) {
						require( 'scans/html.php' );
					}
					else {
						/**
						 * BBCODE
						 **/
						if ( $lang == 'bbcode' ) {
							require( 'scans/bbcode.php' );
						}
					}
				}
				else {
					/**
					 * WIKI
					 **/
					require( 'scans/wiki.php' );
				}
//retirer les double slash sans virer le http:// dans $add
				$add = str_replace( 'http://' , 'hypertextprefix' , $add );
				$add = str_replace( '//' , '/' , $add );
				$add = str_replace( "\\" , '/' , $add );
				$add = str_replace( 'hypertextprefix' , 'http://' , $add );

				$textes .= $add;
				$pourcopier .= $add; // $txtpropre;


			}
			else {
				$dossiers .= '<a href="?thumb=1&langage=' . $langage . '&path=' . $pathnormal . '/' . $v . '">' . $v . '</a>';
				//regroupement des textes � copier
				////sinon ce sont des dossiers
				//regroupement des liens de navigation
			}


		}


	}

	if ( $textes != '' ) {
		if ( get_user_browser() == 'ie' ) {
			$copybouton = " <a class='bouton_copier' href='#textespropres' onClick=\"window.clipboardData.setData('Text', document.getElementById('textespropres').innerHTML); this.style.backgroundColor='#BBEAD2'; \">Copier</a> ";
		}
		else {
			$copybouton = " <object height='20px' width='20px' id='copybutton' class='bouton_copier'>
        <PARAM NAME=FlashVars VALUE=' txtToCopy=$pourcopier '>
        <param name='movie' value='copyButton.swf'>
        <embed src='urlm_lib/copyButton.swf' flashvars='txtToCopy=$pourcopier ' width='200' height='200'></embed></object> ";
		}
	}
}
else {
	_log( 'pas de dossier trouvé!' );
}