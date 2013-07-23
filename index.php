<?php 
/** URL-maker
 * @name URL-maker
 * @author Baptiste Lemoine - http://artlemoine.com
 * @version 1
 * @date August 06, 2011
 * @category web application
 * @example Visit http://artlemoine.com/medias/apps/url-maker/demo
 */
 $index= 1;
$path = $disurlinfo = $corps = $msg = $path = $pathnormal = $copybouton = $debug ='';

require'urlm_lib/securite.php';
require'urlm_lib/config.php';
$debug .='<h2> index </h2>';

		function selected($key='langage',$val , $retour='selected' ){ // détection du langage d'URL choisi pour la présélectionner
			if( isset($_POST[$key]) && $_POST[$key] == $val ){
				echo $retour;
			}
		}
		if(!file_exists( $file )){
echo"<span class='warning noconf'>Il n'y a pas de configuration de l'url absolue. Cliquez sur <a href='urlm_lib/setup.php'>Config</a> pour régler cela.</span>";
		
		}
		elseif( filesize($file) < 10){
		echo"<span class='warning noconf'>l'url absolue est trop courte. Cliquez sur <a href='urlm_lib/setup.php'>Config</a> pour régler cela.</span>";
		
		}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>URL maker Tykayn</title>
		<link rel="stylesheet" media="screen" type="text/css" title="Mon design" href="urlm_lib/design.css" /> 
		<link rel="shortcut icon" type="image/png" href="urlm_lib/img/favicon.png" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script>
		$(function() {
			dimspe = $('#dim_spe');
			dimspe.hide();
			
			// afficher la dimension spéciale si html sélectionné
			$('#sel_lang').on('change', function(){
			if( $('#sel_lang').val() == 'html' )
				dimspe.show();
			else{
				dimspe.hide();
			}
			})
    });
	
		
		</script>
    </head>
    <body>
		
		<div id='main'>
	
				<span class='help'>
					<a href='urlm_lib/help/help.php'>
						<img src='urlm_lib/help/url_help.jpg' alt='URL maker aide'/>
						Aide
					</a>
				</span>
			
		<nav>
		
		<a href='?p=top'>
		<img src='urlm_lib/img/favicon.png' alt='URL maker logo'/> Accueil</a>
		|<a href='?p=year'>Année <?php echo date('Y'); ?></a>>
		<a href='?p=month'> <?php echo date('m'); ?>e Mois</a>
		
		</nav>
		<form method='POST' cible='index.php'>
                    
				<fieldset id='options'>
				<h2 >Options | <a href="urlm_lib/setup.php">Config</a></h2>
				<input type='submit' value='envoyer' />
				<span class="choix"><input type='checkbox' name='backreturn' value='1' <?php selected('backreturn','1','checked'); ?>/> Retour à la ligne</span>
				<span class="choix"><input type='checkbox' name='thumb' value='0' /> sans /thumb ou /g.</span>
                                <select id="sel_lang" name='langage'>
					<option value='wiki' <?php selected( 'langage','wiki'); ?>>
					WIKI
					</option>
					<option value='bbcode' <?php selected( 'langage','bbcode'); ?> >
					BBCODE
					</option>
					<option value='html' <?php selected( 'langage','html'); ?> >
					HTML
					</option>
				</select>
                                
                                Ranger par
                                <select id="sort" name='sort'>
					<option value='crea' <?php selected( 'sort','crea'); ?>>
					date de création croissante
					</option>
                                        <option value='modif' <?php selected( 'sort','modif'); ?>>
					date de modification croissante
					</option>
					<option value='asc' <?php selected( 'sort','asc'); ?> >
					alphabet croissant
					</option>
					<option value='decr' <?php selected( 'sort','decr'); ?> >
					alphabet décroissant
					</option>
				</select>
                                

				<div id="dim_spe">
					<span class="choix"><input type='checkbox' name='activer' value='1' <?php selected('activer','1','checked'); ?> /> Activer Dimensions spéciales:</span>
					<span class="choix">Largeur: <input type='text' name='largeur' value='500' size='4'/></span>
					<span class="choix">hauteur:<input type='text' name='hauteur' value='500' size='4'/> </span>
				</div>
<?php 

//si l'url choppée contient index.php, on retire tout ça
$urlsansindex = explode('index.php',$disurl);

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
				if (isset($_POST['thumb']) && $_POST['thumb']==0){ $thumb = 0;}
				$prethumb='';
				$afterthumb='';
				 $postlien = $prelien=$prehtml = $posthtml = $add = '';
				$debug ='';
				$pasfound=0;
				
			
			
			
			
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
                $debug.= "$disurlinfo <br/>
		path: $path <br/>
		pathnormal: $pathnormal <br/>";
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
