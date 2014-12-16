    
            </div>
        </div>
    </body>
</html>
        
<script type="text/javascript">
$(document).ready(function() {
    $("#menu").menu( { position: { using: positionnerSousMenu } });
    $("#menu > li > a > span.ui-icon-carat-1-e").removeClass("ui-icon-carat-1-e").addClass("ui-icon-carat-1-s");
});

 
function positionnerSousMenu(position, elements) {
 var options = {
 of: elements.target.element
 };
 
 if (elements.element.element.parent().parent().attr("id") === "menu") {
 // le menu à positionner est de niveau 2 :
 // on va superposer le point central du haut du menu sur le point central bas du menu parent
 options.my = "center top";
 options.at = "center bottom";
 }
 else
 {
 // le menu à positionner est de niveau > 2
 // le positionnement reste celui par défaut : on va superposer le coin haut gauche du menu sur le coin haut droit du menu parent
 options.my = "left top";
 options.at = "right top";
 }
 
 elements.element.element.position(options);
};

$("li.menu_item_clickable").click(function(event) {
    document.location = "<?php print(URL); ?>" + $(this).attr('data-link');
    event.stopPropagation();
});
</script>