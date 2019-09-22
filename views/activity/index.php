<h1><?=$greeting?></h1>

<h1>Активность: <?=$model->title; ?></h1>

<?php if($model->startDate == $model->endDate): ?>
    <p>Событие на <?=date("d.m.Y", $model->startDate)?></p>
<?php else: ?>
    <p>Событие c <?=date("d.m.Y", $model->startDate)?> по <?=date("d.m.Y", $model->endDate)?></p>
<?php endif; ?>

<h3><?=$model->getAttributeLabel('body') ?></h3>
<div><?=$model->body ?></div>
