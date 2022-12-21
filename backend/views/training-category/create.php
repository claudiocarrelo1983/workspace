<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrainingCategory */

$this->title = 'Create Training Category';
$this->params['breadcrumbs'][] = ['label' => 'Training Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
