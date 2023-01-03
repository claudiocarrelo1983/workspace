<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RecipesCategory $model */

$this->title = 'Create Recipes Category';
$this->params['breadcrumbs'][] = ['label' => 'Recipes Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipes-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'code' =>  $code
    ]) ?>

</div>
