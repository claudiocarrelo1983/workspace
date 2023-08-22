<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Sheddule $model */

$this->title = 'Update Sheddule: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sheddules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sheddule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
