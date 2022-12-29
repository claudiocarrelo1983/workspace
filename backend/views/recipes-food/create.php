<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RecipesFood $model */

$this->title = 'Create Recipes Food';
$this->params['breadcrumbs'][] = ['label' => 'Recipes Foods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipes-food-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
