<?php $menu = f::getMenu(); ?>
<html>
    <meta charset="utf-8" />
    <head>
        <title>BADOLAC</title>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
        <script src="<?php print(JS . "functions.js"); ?>"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="<?php print(CSS . "style.css"); ?>" />

    </head>
    <body>
        <?php //base_url(); ?>
        <div class="container">
            <div class="menu">
                <div class="menu_list">
                    <ul id="menu">
                    <?php foreach($menu as $id => $item) : ?>
                        <li class="menu_item_clickable" data-link="<?php print($item['item']->link); ?>"><?php print($item['item']->label); ?>
                        <?php if ( isset($item['children'])) : ?>
                            <ul>
                            <?php foreach($item['children'] as $child) : ?>
                                <li class="menu_item_clickable" data-link="<?php print($child->link); ?>"><?php print($child->label); ?></li>
                            <?php endforeach; ?>
                            </ul>
                            <?PHP endif; ?>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
                <div class="menu_connect">
                    <?php if ( !empty($session['username']) ) : ?>
                    Bonjour <?php print($session['username']); ?> - <a href="<?php f::getUrl("admin"); ?>">Espace perso</a> <a href="<?php f::getUrl("index/disconnect"); ?>">Déconnexion</a>
                    <?php else : ?>
                    <form method="POST" action="<?php f::getUrl("index/connect"); ?>">
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