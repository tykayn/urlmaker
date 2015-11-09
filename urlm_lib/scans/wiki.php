<?php
/**
 * liens en wiki
 */

if ( isset( $_POST[ "backreturn" ] ) && $_POST[ "backreturn" ] == 1 ) {
	$br = '%%%';
}

/**
 * pour lien vers petit ou grand
 */
if ( $thumb == 1 ) {
	_log( "<br/>test de $pathnormal.'/g/'.$v puis de $pathnormal.'/thumb/'.$v " );
	/**
	 * dossier "g"
	 */
	$pathImage      = '<span class="thumbimg grand">' . $path . '<span class=relFolder>' . $relativeFolderURL . '</span>/' . $v . '</span>';
	$pathSmallImage = '<span class="thumbimg">' . $path . '<span class=relFolder>' . $relativeFolderURL . '</span>/thumb/' . $v . '</span>';

	if ( file_exists( $pathnormal . '/g/' . $v ) ) {

		$prethumb = '[';
		$afterthumb = '|' . $path . '/g/' . $v . ']';
		$add = '' . $prethumb . '((' . $pathImage . '|' . $alt . '|C))<span class="grand">' . $afterthumb . '</span>' . $br . '<br/>';
	}
	/**
	 * dossier "thumb"
	 */
	elseif ( file_exists( $pathnormal . '/thumb/' . $v ) ) {
		$add = '<span class="linked">[((' . $pathSmallImage . '|' . $alt . '|C))|<span class="grand">' . $pathImage .']</span>' . $br . '<br/>';
		$txtpropre = '[((' . $pathSmallImage . '|' . $alt . '|C))|' . $pathImage . ']' . $br . '';
	}
	else {
		$add = '<span class="unfound">(('. $pathImage . '</span>|' . $alt . '|C))' . $br . '</span><br/>';
		$txtpropre = '((' . $pathImage . '|' . $alt . '|C))' . $br . '';
		$pasfound = 1;

	}

}
else {
	_log( "<br/>dossier " );
	$prethumb = '<span class="unfound">';
	$afterthumb = '</span>';
	$add = '' . $prethumb . '((<span class="thumbimg">' . $path . '/' . $v . '</span>|' . $alt . '|C))' . $afterthumb . $br . '<br/>';
	$txtpropre = '((' . $path . '/' . $dactuel . '/' . $v . '|' . $alt . '|C))' . $br . '';
	$pasfound = 1;
}
