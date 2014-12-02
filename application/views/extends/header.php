<html>
    <head>
        <title>BADOLAC</title>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
        <script src="<?php print(JS . "functions.js"); ?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php print(CSS . "style.css"); ?>" />
    </head>
    <body>
        <?php //base_url(); ?>
        <div class="container">
            <div class="menu">
                <div class="menu_list">
                    Menu 1 | Menu 2 | Menu 3 | Menu 4
                </div>
                <div class="menu_connect">
                    <?php if ( !empty($session['username']) ) : ?>
                    Bonjour <?php print($session['username']); ?> - <a href="<?php print(URL); ?>index.php/admin/index">Espace perso</a> <a href="<?php print(URL); ?>index.php/index/disconnect">Déconnexion</a>
                    <?php else : ?>
                    <form method="POST" action="<?php print(URL); ?>index.php/index/connect">
                        <input type="text" name="username" class="small_input" value="" placeholder="Identifiant" />
                        <input type="password" name="userpass" class="small_input" value="" placeholder="Mot de passe" />
                        <input type="submit" name="submit" value="Se connecter" />
                        <input type="button" name="button" value="S'inscrire" onclick="createAccount('<?php print(URL); ?>')" />
                    </form>
                    <?php endif; ?>
                </div>
            </div>
            <div class="main">
                <div class="alert"></div>