<?php

use yii\helpers\Html;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\Events $model */

$this->title = 'Update Events: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="events-update">

    <?= Helpers::displayAminBreadcrumbs('events', 'events-list', 'update') ?> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
