<?php foreach($stages as $id_stage => $s) : ?>
<?php $limit = new DateTime($s->date_limit_subscription); ?>
<div class="stage">
    <div class="title">
        <?php print($s->title); ?>
        <?php if ( date("Y-m-d") <= $limit->format("Y-m-d") && $this->session->userdata('logged_in') === true ) : ?>
        <div class='subscribe'><a href="<?php print(URL); ?>index.php/stage/subscribe/<?php print($id_stage); ?>">S'inscrire au stage</a></div>
        <?php endif; ?>
    </div>
    <div class="body"><?php print($s->body); ?></div>
    <div class="bottom">
        <div class="date_time"><?php $dt = new DateTime($s->date_start); print("Début du stage le " . $dt->format("d/m/Y") . " à " . $dt->format('H:i:s')); ?></div>
        <div class="date_time"><?php $dt = new DateTime($s->date_end); print("Fin du stage le " . $dt->format("d/m/Y") . " à " . $dt->format('H:i:s')); ?></div>
        <div class="date_time"><?php print("Date limite d'inscription le " . $limit->format("d/m/Y") . " à " . $limit->format('H:i:s')); ?></div>
    </div>
    <hr />
</div>

<?php endforeach; ?>