<ul>
    <li><a href="<?php f::getUrl("admin/personal"); ?>">Informations personnelles</a></li>
    <?php if ( in_array("modify", $session['access']['admin']) ) : ?>
    <li><a href="<?php f::getUrl("admin/modify"); ?>">Modifications de données</a></li>
    <?php endif; ?>
    <?php if ( in_array("access", $session['access']['admin']) ) : ?>
    <li><a href="<?php f::getUrl("admin/access"); ?>">Gestion des droits</a></li>
    <?php endif; ?>
    <?php if ( in_array("create", $session['access']['admin']) ) : ?>
    <li><a href="<?php f::getUrl("admin/create"); ?>">Créer un compte</a></li>
    <?php endif; ?>
</ul>