<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrainingValues */

$this->title = 'Create Training Values';
$this->params['breadcrumbs'][] = ['label' => 'Training Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-values-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
