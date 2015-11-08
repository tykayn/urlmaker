<?php


$lesResultats .= " <div class='textes' id='textespropres'>
       $copybouton $pourcopier
    </div>
<div class='results'>
    <div id='folders'>
            <h2>Dossiers</h2>
            $dossiers
    </div>
    <div class='textes' id='textes'>
        <h2>
            $langage : URL des fichiers à copier.
        </h2>
        $prehtml
        $textes
        $posthtml
    </div>
    $config_infos
</div>
<p> $debug </p>
				";


echo $lesFichiers;