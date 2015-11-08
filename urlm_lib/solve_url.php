<?php

function curPageURL()
{
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {
        $pageURL .= "s";
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

echo curPageURL();

$mask = "index.php";
$urlmodif = explode($mask, curPageURL());
$skeujeveux = $urlmodif[0];
$url2 = $_SERVER["SERVER_NAME"] . '_________' . $_SERVER["REQUEST_URI"];
echo ' adresse root urlmaker' . $skeujeveux;
?>