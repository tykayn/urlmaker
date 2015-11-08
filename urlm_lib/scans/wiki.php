<?php
if ( isset( $_POST[ "backreturn" ] ) && $_POST[ "backreturn" ] == 1 ) {
	$br = '%%%';
}
//pour lien vers petit ou grand. test du dossier G, puis du dossier THUMB
if ( $thumb == 1 ) {
	_log( "<br/>test de $pathnormal.'/g/'.$v puis de $pathnormal.'/thumb/'.$v " );
	if ( file_exists( $pathnormal . '/g/' . $v ) ) {
		$prethumb = '[';
		$afterthumb = '|' . $path . '/g/' . $v . ']';
		$add = '' . $prethumb . '((<span class="thumbimg">' . $path . '/' . $v . '</span>|' . $alt . '|C))<span class="grand">' . $afterthumb . '</span>' . $br . '<br/>';


	}
	elseif ( file_exists( $pathnormal . '/thumb/' . $v ) ) {
		$add = '[((<span class="thumbimg">' . $path . htmlspecialchars( $_POST[ 'path' ] ) . '/thumb/' . $v . '</span>|' . $alt . '|C))|<span class="grand">' . $path . '/' . $v . '</span>]' . $br . '<br/>';
		$txtpropre = '[((' . $path . '/' . $dactuel . '/thumb/' . $v . '|' . $alt . '|C))|' . $path . '/' . $dactuel . '/' . $v . ']' . $br . '';
	}
	else {
		$add = '<span class="unfound">((<span class="thumbimg">' . $path . '/' . $dactuel . '/' . $v . '</span>|' . $alt . '|C))' . $br . '</span><br/>';
		$txtpropre = '((' . $path . '/' . $dactuel . '/' . $v . '|' . $alt . '|C))' . $br . '';
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
