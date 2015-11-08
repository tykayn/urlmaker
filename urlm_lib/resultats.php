<?php


$lesResultats .= " <div class='textes alert alert-success' id='textespropres'>
       <div class='pull-right'> $copybouton </div>

<div id='premiere-img'>$premiere_img</div>
       <div id='pourcopier'><h2>images</h2> $pourcopier</div>
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
<p> $GLOBALS[debug] </p>

				<div id='lefichiers'>$lesFichiers </div>";