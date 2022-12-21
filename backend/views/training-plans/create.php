<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrainingPlans */

$this->title = 'Create Training Plans';
$this->params['breadcrumbs'][] = ['label' => 'Training Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-plans-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
