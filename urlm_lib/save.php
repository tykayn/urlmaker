<?php 
require'securite.php';
require'config.php';
$corps ='';
$file = 'config_abs.conf';
		if(!file_exists( $file )){
		$corps .= "$file n'existe pas, il faut le créer  ";
		}
		else{
		$corps .= "édition du fichier de config.";
		}
file_put_contents($file, $_POST['disurl']) OR die('Ho noez! impossible d\'écrire le fichier. Vérifiez que vous avez donné des droits suffisants en écriture aux fichiers d\'URL maker ');
$corps .= "<span class='success'>$_POST[disurl] <br/>est la nouvelle adresse absolue pour lier les images. Cette donnée est stockée dans $file </span>";
?>




<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>URL maker Tykayn</title>
		<link rel="stylesheet" media="screen" type="text/css" title="Mon design" href="design.css" /> 
		<link rel="shortcut icon" type="image/png" href="urlm_lib/img/favicon.png" />
		<script language="javascript">
		window.setTimeout( function(){document.location.href="../";}, 3000)
		 
		</script> 
    </head>
    <body>
		
		<div id='main'>
		<fieldset class="setup">
		<?php echo $corps; ?>
		<a href="<?php echo $_POST['disurl']; ?>">Trop bien! Retour à l'accueil</a>
		</fieldset>
		</div>
		
	</body>
</html>