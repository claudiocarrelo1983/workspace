<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RecipesFood $model */

$this->title = 'Update Recipes Food: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Recipes Foods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recipes-food-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
