<?php

echo curPageURL();

$mask = "index.php";
$urlmodif = explode( $mask , curPageURL() );
$skeujeveux = $urlmodif[ 0 ];
$url2 = $_SERVER[ "SERVER_NAME" ] . '_________' . $_SERVER[ "REQUEST_URI" ];
echo ' adresse root urlmaker' . $skeujeveux;
?>