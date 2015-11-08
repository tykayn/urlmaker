<?php
$debug .= '<h2> securite </h2>';
foreach ( $_GET AS $key => $value ) {
	$_GET[ $key ] = htmlspecialchars( $value );
}
foreach ( $_POST AS $key => $value ) {
	$_POST[ $key ] = htmlspecialchars( $value );
}
