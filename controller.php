<?php
	
			
				$dactuel = date('/Y/m').$amois[date('m')];
							//si y'a pas de dossier d�fini ET qu'il existe un dossier actuel y aller, sinon aller � la racine
							//si y'a un dossier d�fini aller a ce dossier
							if(isset($_GET['path']) && !empty($_GET['path'])){
							
						
								$path =$_GET['path'];

								$pathboot = str_replace('http://','hypertextprefix',$path);
								$path = str_replace('//','/',$pathboot);
								$path = str_replace("\\",'/',$path );
								$path = str_replace('hypertextprefix','http://',$path);
								$debug .='#1# $path=$_GET[\'path\']';
							}
							elseif(isset($_GET['p']) && $_GET['p']=="year"){
								$path=getcwd().date('/Y/');
								$debug .='#2#$path=getcwd()';
							}
							elseif(isset($_GET['p']) && $_GET['p']=="top"){
								$path=getcwd();
								$debug .='#3#$path=getcwd()';
							}
							else{
								$path=getcwd().$dactuel;
								$debug .='#4#$path=getcwd().$dactuel';
							}
			
			
			


				//scan des dossiers. 1erement: dossier ann�e/mois.
				//sinon dossier getcwd/
				//sinon fok

			
			$pathnormal = $path;
		/* 	if( file_exists($pathnormal)){
				$scan = scandir($pathnormal);	
			}
			elseif( file_exists(getcwd())){
				$scan = scandir(getcwd());	
			}
			else{
				$path = getcwd().'/';
				$dir_unfound=1; 
				$scan = scandir($path)
						OR die("<span class='info'> le dossier sp�cifi� � analyser,<span class='chemin'> $pathnormal </span>, n'est pas correct.</span>");
				} */
				
				if( file_exists($path)){
				$scan = scandir($path);	
				$debug .='<br/>#4# $scan = scandir('.$path.')';
			}
			else{
			$dir_unfound=1; 
			$corps .= "<span class='info'> le dossier sp�cifi� � analyser,<span class='chemin'> $pathnormal </span>, n'est pas correct.</span>";
			}	
				
		//	print_r($_GET);
			if(empty($scan[3])){
				$textes .="<span class='info'> le dossier sp�cifi� � analyser,<span class='chemin'> $pathnormal </span>ne contient pas de fichiers</span>";
			}
			$dossierscanned = str_replace($disrel,'','/'.$_GET['path']);
			$debug .='<br/>#5# $dossierscanned = '.$dossierscanned;
			if(stristr(curPageURL(),'http://localhost')){	
																//$path =str_replace($localroot,$localurl,$path); 
															$debug.="<h2>-------LOCALHOST--------- affich�:  $path , scann� $pathnormal </h2>";
															
			}
			else{							
			//	$path =$disurl.$dossierscanned;
			//	$path =$disurl.$_GET['path'];
			$path =$disurl;
				$debug.='<h2>-------DISTANT HOTE--------- </h2>';
				
				}
				//pour �viter les double slash de fin de chemin
				/* $debug.=" ".substr($pathnormal,-1)." et "." hop<br/><br/><br/>";
				if(substr($pathnormal,-1)=='/'){
					$path = substr($pathnormal,0,-1);
					$debug.="un / � �t� retir� de pathnormal";
					
				}
				else{
					$debug.="pathnormal ne se finit pas par /";;
				} */