<?php
$langage = 'html';
$prehtml = '<quote>';
$posthtml = '</quote>';

if ( isset( $_POST[ "backreturn" ] ) && $_POST[ "backreturn" ] == 1 ) {
	$br = '<br/>';
}
if ( isset( $_POST[ "activer" ] ) && $_POST[ "activer" ] == '1' ) {
	$spe_dim = 1;
	$largeur = 'width="' . $_POST[ "largeur" ] . '"';
	$hauteur = 'height="' . $_POST[ "hauteur" ] . '"';
}
if ( file_exists( $pathnormal . '/g/' . $v ) ) {
	$prelien = '<a href="' . $path . '/g/' . $v . '">';
	$postlien = '</a>';
}
$add = '<span class="grand">' . htmlspecialchars( $prelien ) . '</span><span class="thumbing">' . htmlspecialchars( '<img src="' . $path . '/' . $v . '" alt="' . $alt . '" title="' . $alt . '"' . $largeur . ' ' . $hauteur . ' />' . $postlien . $br ) . '</span><br/>';
$txtpropre = htmlspecialchars( $prelien ) . htmlspecialchars( '<img src="' . $path . '/' . $v . '" alt="' . $alt . '" title="' . $alt . '"' . $largeur . ' ' . $hauteur . ' />' . $postlien . $br ) . ' ';