<?php


$lesResultats .= " <div class='textes alert alert-success' id='textespropres'>
       <div class='pull-right'> $copybouton </div>


       <div id='pourcopier'>
       <h5>images</h5>
       <div id='premiere-img'>$premiere_img</div>
       <div id='pour_copier'>
        $pourcopier
        </div>
        </div>
    </div>
<div class='results'>

   <!-- <div class='textes alert alert-info' id='textes'>
        <h2>
            $langage : URL des fichiers à copier.
        </h2>
        $prehtml
        $textes
        $posthtml
    </div> -->
    $config_infos
</div>
<p> $GLOBALS[debug] </p>

				<div id='lefichiers'>$lesFichiers </div>";