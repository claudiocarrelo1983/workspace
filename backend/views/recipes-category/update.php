<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RecipesCategory $model */

$this->title = 'Update Recipes Category: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Recipes Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recipes-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'code' =>  $code
    ]) ?>

</div>
