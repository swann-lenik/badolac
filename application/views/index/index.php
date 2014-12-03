<?php foreach($news as $id_news => $n) : ?>
<div class="post">
    <div class="title"><?php print($n->title); ?></div>
    <?php if ( $n->subtitle != "" ) : ?>
    <div class="subtitle"><i><?php print($n->subtitle); ?></i></div>
    <?php endif; ?>
    <div class="body"><?php print($n->body); ?></div>
    <div class="bottom">
        <div class="author"><?php print(ucfirst(strtolower($n->firstname))); ?> <?php print(ucfirst(strtolower($n->lastname))); ?></div>
        <div class="comments"><?php print($n->comments == 1 ? $n->cpt . " commentaires" : "<i>Commentaires désactives</i>"); ?></div>
        <div class="date_time"><?php $dt = new DateTime($n->date_upd); print("Posté le " . $dt->format("d/m/Y") . " à " . $dt->format('H:i:s')); ?></div>
    </div>
    <hr />
</div>

<?php endforeach; ?>