<?php

use yii\helpers\Html;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\Messages $model */

$this->title = 'Update Messages: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="messages-update">

    <?= Helpers::displayAminBreadcrumbs('messages-template', 'update') ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
