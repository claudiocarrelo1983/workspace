<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RecipesSteps $model */

$this->title = 'Create Recipes Steps';
$this->params['breadcrumbs'][] = ['label' => 'Recipes Steps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipes-steps-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
