<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RecipesPlan */

$this->title = 'Create Recipes Plan';
$this->params['breadcrumbs'][] = ['label' => 'Recipes Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipes-plan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
