<?php
			if($dir_unfound!=1){
				foreach($scan AS $k=>$v){
				//	$textes .='<br/> '.$k.' ->'.$v;
					$debug .="<br/> scan $k=>$v ";
				//si diff�rent de . ou ..//exclut les deux 1e lignes des dossiers
					if($v != '.' && $v !='..') {
							if (preg_match("#\.|\.\.]#", $v)== TRUE) 
							{	
								//ce sont des images
								
								//texte alternatif
								$alt= substr(str_replace(array('_','-','(',')'),' ',$v), 0, -4);
								
								//selon le langage
								if(isset($_POST["langage"]) && $_POST["langage"]!='wiki'){
									//HTML_____HTML_____HTML_____HTML_____HTML_____HTML_____HTML_____HTML_____HTML_____HTML_____HTML_____HTML_____
											if($_POST["langage"]=='html'){
												$langage='html';
												$prehtml='<quote>';
												$posthtml='</quote>';
												if(isset($_POST["backreturn"]) && $_POST["backreturn"]==1){
													$br='<br/>';
													}
												if(isset($_POST["activer"]) && $_POST["activer"]=='1'){
													$spe_dim=1;
													$largeur='width="'.$_POST["largeur"].'"';
													$hauteur='height="'.$_POST["hauteur"].'"';
													}
												if( file_exists($pathnormal.'/g/'.$v)){
													$prelien='<a href="'.$path.'/g/'.$v.'">';
													$postlien='</a>';
												}
												$add = '<span class="grand">'.htmlspecialchars($prelien).'</span><span class="thumbing">'.htmlspecialchars('<img src="'.$path.'/'.$v.'" alt="'.$alt.'" title="'.$alt.'"'.$largeur.' '.$hauteur.' />'.$postlien.$br).'</span><br/>';
												$txtpropre = htmlspecialchars($prelien).htmlspecialchars('<img src="'.$path.'/'.$v.'" alt="'.$alt.'" title="'.$alt.'"'.$largeur.' '.$hauteur.' />'.$postlien.$br).' ';

											}
											else if($_POST["langage"]=='bbcode'){
												
									//BBCODE_____//BBCODE_____//BBCODE_____//BBCODE_____//BBCODE_____//BBCODE_____//BBCODE_____//BBCODE_____//BBCODE_____
												
												$langage='bbcode';
												if(isset($_POST["backreturn"]) && $_POST["backreturn"]==1){
												$br='<br/>';
												}
												//pour lien vers petit ou grand. test du dossier G, puis du dossier THUMB
											if($thumb==1){
																$debug.="<br/>test de $pathnormal.'/g/'.$v puis de $pathnormal.'/g/'.$v ";
												if(file_exists($pathnormal.'/g/'.$v)){
												$prethumb='[';
												$afterthumb='|'.$path.'/g/'.$v.']';
												$add = '[url=<span class="grand">'.$path.'/g/'.$v.'</span>][img]<span class="thumbimg">'.$path.'/'.$v.'</span>[/img][/url]'.$br;
												$txtpropre = '[url='.$pathnormal.'/g/'.$v.'][img]'.$path.'/'.$v.'[/img][/url]'.$br;

												}
												elseif(file_exists($pathnormal.'/thumb/'.$v)){
													$add = '[url=<span class="grand">'.$pathnormal.'/'.$v.'</span>][img]<span class="thumbimg">'.$path.'/thumb/'.$v.'</span>[/img][/url]'.$br;
													$txtpropre = '[url='.$pathnormal.'/'.$v.'][img]'.$path.'/thumb/'.$v.'[/img][/url]'.$br;
												}
												else{
													$add = '[img]<span class="unfound">'.$path.'/'.$v.'</span>[/img]'.$br;
													$txtpropre = '[img]'.$path.'/'.$v.'[/img]'.$br;
													$pasfound=1;
												}

											}
											else{
												$debug.="<br/>dossier ";
												$prethumb='<span class="unfound">';
												$afterthumb='</span>';
												$add = ''.$prethumb.'((<span class="thumbimg">'.$path.'/'.$v.'</span>|'.$alt.'|C))'.$afterthumb.$br.'<br/>';
												$txtpropre = '(('.$path.'/'.$v.'|'.$alt.'|C))'.$br;
												
												$pasfound=1;
											}
												
												
											}
								
									}
								else{
									//WIKI_____//WIKI_____//WIKI_____//WIKI_____//WIKI_____//WIKI_____//WIKI_____//WIKI_____//WIKI_____//WIKI_____//WIKI_____
									
											if(isset($_POST["backreturn"]) && $_POST["backreturn"]==1){
											$br='%%%';
											}
											//pour lien vers petit ou grand. test du dossier G, puis du dossier THUMB
											if($thumb==1){
																$debug.="<br/>test de $pathnormal.'/g/'.$v puis de $pathnormal.'/thumb/'.$v ";
												if(file_exists($pathnormal.'/g/'.$v)){
												$prethumb='[';
												$afterthumb='|'.$path.'g/'.$v.']';
												$add = ''.$prethumb.'((<span class="thumbimg">'.$path . $v.'</span>|'.$alt.'|C))<span class="grand">'.$afterthumb.'</span>'.$br.'<br/>';
												$txtpropre = '[(('.$path.'/'.$v.'|'.$alt.'|C))'.$afterthumb.$br.'';

												}
												elseif(file_exists($pathnormal.'/thumb/'.$v)){
													$add = '[((<span class="thumbimg">'.$path.htmlspecialchars($_POST['path']).'/thumb/'.$v.'</span>|'.$alt.'|C))|<span class="grand">'.$path.'/'.$v.'</span>]'.$br.'<br/>';
													$txtpropre = '[(('.$path.$_POST['path'].'/thumb/'.$v.'|'.$alt.'|C))|'.$path.'/'.$v.']'.$br.'';
												}
												else{
													$add = '<span class="unfound">((<span class="thumbimg">'.$path.'/'.$v.'</span>|'.$alt.'|C))'.$br.'</span><br/>';
													$txtpropre = '(('.$path.'/'.$v.'|'.$alt.'|C))'.$br.'';
												$pasfound=1;
													
												}

											}
											else{
												$debug.="<br/>dossier ";
												$prethumb='<span class="unfound">';
												$afterthumb='</span>';
												$add = ''.$prethumb.'((<span class="thumbimg">'.$path.'/'.$v.'</span>|'.$alt.'|C))'.$afterthumb.$br.'<br/>';
												$txtpropre  = '(('.$path.'/'.$v.'|'.$alt.'|C))'.$br.'';
												$pasfound=1;
											}
												

									}
									//retirer les double slash sans virer le http:// dans $add
									$add = str_replace('http://','hypertextprefix',$add);
									$add = str_replace('//','/',$add);
									$add = str_replace("\\",'/',$add );
									$add = str_replace('hypertextprefix','http://',$add);
									
														$textes .= $add;
														$pourcopier .= $txtpropre;

								}
								else{
							$dossiers .= '<a href="?thumb=1&langage='.$langage.'&path='.$pathnormal.'/'.$v.'">'.$v.'</a>';
								//regroupement des textes � copier
								////sinon ce sont des dossiers
								//regroupement des liens de navigation
								}
								

								
						}
					
						
					
					
				
				

				}
				
				if($textes !=''){
					if(get_user_browser()=='ie'){
					$pourcopier = $pourcopier;
					$copybouton = " <a class='bouton_copier' href='#textespropres' onClick=\"window.clipboardData.setData('Text', document.getElementById('textespropres').innerHTML); this.style.backgroundColor='#BBEAD2'; \">Copier</a> ";
					}
					else{
					$copybouton = " <object width='60' height='20' id='copybutton' class='bouton_copier'>
				<PARAM NAME=FlashVars VALUE=' txtToCopy=$pourcopier '>
				<param name='movie' value='copyButton.swf'>
				<embed src='urlm_lib/copyButton.swf' flashvars='txtToCopy=$pourcopier ' width='200' height='200'></embed></object> ";
					}

				}
			}