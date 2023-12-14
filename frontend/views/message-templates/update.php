<?php

use yii\helpers\Html;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\MessagesTemplate $model */

$this->title = 'Update Messages Template: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Messages Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="messages-template-update">

    <?= Helpers::displayAminBreadcrumbs('messages-template', 'update') ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
