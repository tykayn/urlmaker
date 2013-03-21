<?php 
require'urlm_lib/securite.php';
require'urlm_lib/config.php';

$file ='urlm_lib/config_abs.conf';
if(!file_exists( $file )){
 //teste si l'appli a été configuré avec $disurl
	header("Location: urlm_lib/setup.php") ;/* Redirection du navigateur */
			exit;
		
		}
		else{
		// Lit un fichier, et le place dans une chaîne
		$handle = fopen($file, "r");
		$disurl = fread($handle, filesize($file));
		fclose($handle);
		
		$disurlinfo .= "<span class='success'>disurl: $disurl</span>";
		}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>URL maker Tykayn</title>
		<link rel="stylesheet" media="screen" type="text/css" title="Mon design" href="urlm_lib/design.css" /> 
		<link rel="shortcut icon" type="image/png" href="urlm_lib/favicon.png" />
    </head>
    <body>
		
		<div id='main'>
	
				<span class='help'>
					<a href='urlm_lib/help/help.php'>
						<img src='urlm_lib/help/url_help.jpg' alt='URL maker aide'/>
						Aide
					</a>
				</span>
			
		<nav><a href='?p=top'><img src='urlm_lib/favicon.png' alt='URL maker logo'/> Accueil</a>|<a href='?p=year'>Année <?php echo date(Y); ?></a>><a href='?'> <?php echo date(m); ?>e Mois</a>. <a href="http://www.ailesse.info/~tykayn/bazar/kotlife/urlm_lib/setup.php">Config</a></nav>
		<form method='GET' cible='index.php'>
				<fieldset id='options'>
				
				<h2 >Options</h2>
				<span class="choix"><input type='checkbox' name='backreturn' value='1' checked='checked'/> Retour à la ligne?</span>
				<span class="choix"><input type='checkbox' name='thumb' value='0' /> sans /thumb ou /g.</span>
				<span class="choix"><input type='radio' name='langage' value='wiki' checked='checked'/> WIKI </span>
				<span class="choix"><input type='radio' name='langage' value='bbcode' /> BBCODE</span>
				<span class="choix"><input type='radio' name='langage' value='html' /> HTML<br/></span>
				
				<span class="choix"><input type='checkbox' name='activer' value='1' /> Activer Dimensions spéciales:</span>
				<br/>
				<span class="choix">Largeur: <input type='text' name='largeur' value='500' size='4'/></span>
				<span class="choix">hauteur:<input type='text' name='hauteur' value='500' size='4'/> </span>

<?php 
/** URL-maker
 * @name URL-maker
 * @author Baptiste Lemoine - http://artlemoine.com
 * @version 1
 * @date August 06, 2011
 * @category web application
 * @example Visit http://artlemoine.com/medias/apps/url-maker/demo
 */



  

//$disurl= curPageURL();

//si l'url choppée contient index.php, on retire tout ça
$urlsansindex = explode('index.php',$disurl);
//echo"$urlsansindex[0] url avant index";
  
		
		 
				$dossiers='';
				$textes='';
				$br = $dir_unfound ='';
				$lien_grand=0;
				$langage='wiki';
				$spe_dim=0;
				$largeur='';
				$hauteur='';
				$pourcopier='';
				$thumb=1;
				if (isset($_GET['thumb']) && $_GET['thumb']==0){ $thumb = 0;}
				$prethumb='';
				$afterthumb='';
				 $postlien = $prelien=$prehtml = $posthtml = $add = '';
				$debug ='';
				$pasfound=0;
				
			
			
			$debug.= "$disurlinfo <br/>
		path: $path <br/>
		pathnormal: $pathnormal <br/>";
			
			$amois =array(
				"01"=>"janvier",
				"02"=>"fevrier",
				"03"=>"mars",
				"04"=>"avril",
				"05"=>"mai",
				"06"=>"juin",
				"07"=>"juillet",
				"08"=>"aout",
				"09"=>"septembre",
				"10"=>"octobre",
				"11"=>"novembre",
				"12"=>"decembre"
				);
			//localisation du dossier
			
		require'urlm_lib/controller.php';
		require'urlm_lib/scanner.php';
				
	if($pasfound==1){		$textes .="<span class='info'>Certains fichiers n'ont pas de deuxième version </span>";}				
if($montrer_config==0){
	$config_infos='';
}				
if($montrer_debug==0){
	$debug='';
}							
//template ici
$pourtextarea = $pathnormal ;

				$corps .="
					<textarea name='path' rows='4' cols='30'>$pourtextarea</textarea>
				<input type='submit' value='envoyer' />
				</form>
				</fieldset>
				<div class='results'>
				
				
							<div class='folders'>
							
								<h2>Dossiers</h2>
								$dossiers
							</div>
		
		<div class='textes' id='textes'>
								<h2>
								$langage : URL des fichiers à copier.  
								</h2>
				$prehtml	$textes	$posthtml
				</div>
				<div class='textes' id='textespropres'>
				$pourcopier
				</div>
				$config_infos			
				</div>
				

	<div id='credits'>
				Aide et application crées par <a href='http://artlemoine.com'>Baptiste Lemoine (artlemoine.com)</a>.
				Version 1.5
				</div>
		$copybouton
		
		<p> $debug </p>
				";

				if($dir_unfound==1){$msg ="<span class='info'>harrrrrrr le dossier est fucké. URL maker vous propose le dossier suivant</span>";}

					echo $msg.$corps;
				
		
?>
</div>

    </body>
</html>
