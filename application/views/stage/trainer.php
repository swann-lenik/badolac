<h1>Nos entraineurs</h1>

<?php foreach($trainers as $t ) : ?>
<div class="trainer">
    <div class="name"><h3><?php print(ucfirst(strtolower($t->firstname))); ?> <?php print(strtoupper($t->name)); ?></h3></div>
    <div class="desc"><?php print($t->description); ?></div>
    <hr />
</div>

<?php endforeach; ?>
