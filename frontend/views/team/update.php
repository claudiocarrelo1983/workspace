<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Team $model */

$this->title = 'Team Member : ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="team-update">
    <h4 class="mb-sm-0 font-size-18 pb-4">
        <?= Html::encode($this->title) ?>
    </h4>  

    <?= $this->render('_form', [
        'model' => $model,
        'weekDays' => $weekDays,
        'serviceTimeMin' => $serviceTimeMin,
    ]) ?>

</div>
