<?php
	
$dossierscanned='';
$dactuel = date('/Y/m').$amois[date('m')];
		//si y'a pas de dossier défini ET qu'il existe un dossier actuel y aller, sinon aller à la racine
		//si y'a un dossier défini aller a ce dossier
		if(isset($_POST['path']) && !empty($_POST['path'])){
		
			//path nouveau pour afficher
			$dossierscanned = str_replace($disrel,'',$_POST['path']);

			$path =$_POST['path'];

			$pathboot = str_replace('http://','hypertextprefix',$path);
			$path = str_replace('//','/',$pathboot);
			$path = str_replace("\\",'/',$path );
			$path = str_replace('hypertextprefix','http://',$path);
			$debug .='#1# $_POST[\'path\'] $path='.$path;
		}
		elseif(isset($_GET['p']) && $_GET['p']=="year"){
			$path=getcwd().date('/Y/');
			$debug .='#2# year $path='.$path;
		}
		elseif(isset($_GET['p']) && $_GET['p']=="month"){
			$path=getcwd().date('/Y/m').$amois[date('m')];
			$debug .='#5# month $path= '.$path;
		}
		elseif(isset($_GET['p']) && $_GET['p']=="top"){
			$path=getcwd();
			$debug .='#3# top $path='.$path;
		}
		else{
			$path=getcwd().$dactuel;
			$debug .='#4# getcwd().$dactuel $path='.$path;
		}

	
			
				//scan des dossiers. 1erement: dossier année/mois.
				//sinon dossier getcwd/
				//sinon fok

			
			$pathnormal = $path;
			$debug .='<br/>#6#  '.$pathnormal.'<br/>=<br/>'.$path.';';
				
				if( file_exists($path)){
				$scan = scandir($path);	
				$debug .='<br/>#4# $scan = scandir('.$path.')';
			}
			else{
			$dir_unfound=1; 
			$corps .= "<span class='info'> Dossier incorrect:<span class='chemin'> $pathnormal </span>, </span>";
			}	
				
		//	print_r($_POST);
			if(empty($scan[3])){
				$textes .="<span class='info'> le dossier <span class='chemin'> $pathnormal </span>ne contient pas de fichiers</span>";
			}
			//enlever getcwd dans path
		// ajouter disurl a path

			//virer les espaces
			$disurl = str_replace(' ','',$disurl);
			$path = $disurl.'/'.$dossierscanned;
			
			$debug .='<br/><span class="success">#5# $dossierscanned = '.$dossierscanned.'</span>';
			if(stristr(curPageURL(),'http://localhost')){	
																//$path =str_replace($localroot,$localurl,$path); 
															$debug.="<h2>-------LOCALHOST--------- </h2>
															<span class='success'><h3>affiché:  $path ,</h3><h3> scanné $pathnormal </h3></span>";

			}
			else{							
			//	$path =$disurl.$dossierscanned;
			//	$path =$disurl.$_POST['path'];
		//	$path =$disurl;
		
		
		
		
				$debug.='
				<span class="success">cwd:  '.getcwd().'========</span>
				<h2>-------DISTANT HOTE--------- </h2>
															<span class="success"><h3>affiché:  '.$path.'========</h3><h3> scanné '.$pathnormal.' </h3></span>';
				
				}
				//pour éviter les double slash de fin de chemin
				 $debug.=" ".substr($pathnormal,-1)." et "." hop<br/><br/><br/>";
				if(substr($pathnormal,-1)=='/'){
					$path = substr($pathnormal,0,-1);
					$debug.="un / à été retiré de pathnormal";
					
				}
				else{
					$debug.="pathnormal ne se finit pas par /";;
				} 