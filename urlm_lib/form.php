<form class="well" method='POST' cible='index.php'>

    <fieldset id='options'>
        <h2>Options |
            <a href="urlm_lib/setup.php">Config</a>
        </h2>
        <input class="btn btn-primary btn-block" type='submit' value='envoyer'/>
        <br/>
            <span class="choix">
                <input type='checkbox' name='backreturn' value='1'
                    <?php selected('backreturn', '1', 'checked'); ?>/> Retour à la ligne
            </span>
            <span class="choix">
                <input type='checkbox' name='thumb' value='0'/> sans /thumb ou /g.
            </span>
        <select class="input" id="sel_lang" name='langage'>
            <option value='wiki'
                <?php selected('langage', 'wiki'); ?>> WIKI
            </option>
            <option value='bbcode'
                <?php selected('langage', 'bbcode'); ?> > BBCODE
            </option>
            <option value='html'
                <?php selected('langage', 'html'); ?> > HTML
            </option>
        </select>
        <br/> Ranger par
        <select class="input" id="sort" name='sort'>
            <option value='crea'
                <?php selected('sort', 'crea'); ?>> date de création croissante
            </option>
            <option value='modif'
                <?php selected('sort', 'modif'); ?>> date de modification croissante
            </option>
            <option value='asc'
                <?php selected('sort', 'asc'); ?> > alphabet croissant
            </option>
            <option value='decr'
                <?php selected('sort', 'decr'); ?> > alphabet décroissant
            </option>
        </select>


        <div id="dim_spe">
			<span class="choix">
                <input type='checkbox' name='activer' value='1'
                    <?php selected('activer', '1', 'checked'); ?> /> Activer Dimensions spéciales:</span>
            <span class="choix">Largeur: <input type='text' name='largeur' value='500' size='4'/></span>
            <span class="choix">hauteur:<input type='text' name='hauteur' value='500' size='4'/> </span>
        </div>
<?php


//localisation du dossier

require 'urlm_lib/controller.php';
require 'urlm_lib/scanner.php';

if ($pasfound == 1) {
    $textes .= "
		<span class='info'>Certains fichiers n'ont pas de deuxième version </span>
		";
}
if ($montrer_config == 0) {
    $config_infos = '';
}
if ($montrer_debug == 0) {
    $debug = '';
}

$pourtextarea = trim($pathnormal);

$leForm .= "
<br/>
<textarea name='path' rows='4' cols='40'>$pourtextarea</textarea>
<br/>
<br/>
<input class='btn btn-primary btn-block' type='submit' value='envoyer'/>
</form>
</fieldset>";


?>