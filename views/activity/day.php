<h1><?=$greeting?></h1>

<h1>День: <?=$model->typeOfDay; ?></h1>

<h3><?=$model->activities[0]->getAttributeLabel('title')?> : <?=$model->activities[0]->title?></h3>
<h3><?=$model->activities[0]->getAttributeLabel('startDate')?> : <?=$model->activities[0]->startDate?></h3>
<h3><?=$model->activities[0]->getAttributeLabel('endDate')?> : <?=$model->activities[0]->endDate?></h3>
<h3><?=$model->activities[0]->getAttributeLabel('idAuthor')?> : <?=$model->activities[0]->idAuthor?></h3>
<h3><?=$model->activities[0]->getAttributeLabel('body')?> : <?=$model->activities[0]->body?></h3>
<h3><?=$model->activities[0]->getAttributeLabel('repeat')?> : <?=$model->activities[0]->repeat?></h3>

