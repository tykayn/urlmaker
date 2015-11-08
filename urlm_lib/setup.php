<?php
//require'securite.php';
$disurl = '';
require 'config.php';
$corps = '';
$url = curPageURL();
$url = str_replace('urlm_lib/setup.php', '', $url);
$file = 'config_abs.conf';
if (!file_exists($file)) {
    $corps .= "<span class='info'>Le fichier de configuration d'URL absolue $file doit être créé pour faire fonctionner URL maker </span> ";
} else {
    $corps .= "<span class='success'>Le fichier de configuration d'URL absolue $file est déjà créé. Pas besoin de le redéfinir <br/>
		$disurl
		</span>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>URL maker Tykayn</title>
    <link rel="stylesheet" media="screen" type="text/css" title="Mon design" href="design.css"/>
    <link rel="shortcut icon" type="image/png" href="urlm_lib/img/favicon.png"/>
</head>
<body>

<div id='main'>
    <a href='../'>
        <img src='img/favicon.png' alt='URL maker logo'/> Accueil
    </a>
    <fieldset class="setup">
        <h1>Installation</h1>
        <?php echo $corps; ?>
        <form method="post" action="save.php">
            Veuillez entrer l'adresse absolue du répertoire où se trouve l'index.php de URL maker.<br/>

            <input type="text" name="disurl" value="<?php echo $url; ?> " size="100"/>
            <br/>

            <input type="submit" value="enregistrer"/>
    </fieldset>

</div>

</body>
</html>