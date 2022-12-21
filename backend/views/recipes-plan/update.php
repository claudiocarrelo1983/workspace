<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RecipesPlan */

$this->title = 'Update Recipes Plan: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Recipes Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recipes-plan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
