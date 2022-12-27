<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RecipesFood */

$this->title = 'Update Recipes Food: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Recipes Foods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recipes-food-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
