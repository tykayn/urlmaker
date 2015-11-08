<?php


$lesResultats .= " <div class='textes alert alert-success' id='textespropres'>
       <div class='pull-right'> $copybouton </div>

       <div> $pourcopier</div>
    </div>
<div class='results'>

    <div class='textes alert alert-info' id='textes'>
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