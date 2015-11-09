<?php

$langage = 'bbcode';
if ( isset( $_POST[ "backreturn" ] ) && $_POST[ "backreturn" ] == 1 ) {
	$br = '<br/>';
}
//pour lien vers petit ou grand. test du dossier G, puis du dossier THUMB
if ( $thumb == 1 ) {
	_log( "<br/>test de $pathnormal.'/g/'.$v puis de $pathnormal.'/g/'.$v " );
	if ( file_exists( $pathnormal . '/g/' . $v ) ) {
		$prethumb = '[';
		$afterthumb = '|' . $path . '/g/' . $v . ']';
		$add = '[url=<span class="grand">' . $path . '/g/' . $v . '</span>][img]<span class="thumbimg">' . $path . '/' . $v . '</span>[/img][/url]' . $br;
		$txtpropre = '[url=' . $pathnormal . '/g/' . $v . '][img]' . $path . '/' . $v . '[/img][/url]' . $br;

	}
	elseif ( file_exists( $pathnormal . '/thumb/' . $v ) ) {
		$add = '[url=<span class="grand">' . $pathnormal . '/' . $v . '</span>][img]<span class="thumbimg">' . $path . '/thumb/' . $v . '</span>[/img][/url]' . $br;
		$txtpropre = '[url=' . $pathnormal . '/' . $v . '][img]' . $path . '/thumb/' . $v . '[/img][/url]' . $br;
	}
	else {
		$add = '[img]<span class="unfound">' . $path . '/' . $v . '</span>[/img]' . $br;
		$txtpropre = '[img]' . $path . '/' . $v . '[/img]' . $br;
		$pasfound = 1;
	}

}
else {
	_log( "<br/>dossier " );
	$prethumb = '<span class="unfound">';
	$afterthumb = '</span>';
	$add = '' . $prethumb . '((<span class="thumbimg">' . $path . '/' . $v . '</span>|' . $alt . '|C))' . $afterthumb . $br . '<br/>';
	$txtpropre = '((' . $path . '/' . $v . '|' . $alt . '|C))' . $br;

	$pasfound = 1;
}
