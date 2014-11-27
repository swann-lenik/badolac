<ul>
    <li><a href="personal">Informations personnelles</a></li>
    <?php if ( in_array("modify", $session['access']['admin']) ) : ?>
    <li><a href="modify">Modifications de données</a></li>
    <?php endif; ?>
    <?php if ( in_array("rights", $session['access']['admin']) ) : ?>
    <li><a href="access">Gestion des droits</a></li>
    <?php endif; ?>
</ul>
