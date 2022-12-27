<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Recipes */

$this->title = 'Update Recipes: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Recipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recipes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'title' => $title,
        'text' => $text,
        'modelsAddress' => $modelsAddress
    ]) ?>

</div>
