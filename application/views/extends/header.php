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
                    Bonjour <?php print($session['username']); ?>
                </div>
            </div>
            <div class="main">
                <div class="alert"></div>