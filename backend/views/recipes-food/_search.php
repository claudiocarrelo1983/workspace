<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RecipesFoodSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipes-food-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'recipe_code') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'measure') ?>

    <?= $form->field($model, 'calories') ?>

    <?php // echo $form->field($model, 'lipids') ?>

    <?php // echo $form->field($model, 'colesterol') ?>

    <?php // echo $form->field($model, 'sodium') ?>

    <?php // echo $form->field($model, 'carbs') ?>

    <?php // echo $form->field($model, 'fibers') ?>

    <?php // echo $form->field($model, 'sugar') ?>

    <?php // echo $form->field($model, 'protein') ?>

    <?php // echo $form->field($model, 'nutricion_pt') ?>

    <?php // echo $form->field($model, 'nutricion_es') ?>

    <?php // echo $form->field($model, 'nutricion_en') ?>

    <?php // echo $form->field($model, 'nutricion_it') ?>

    <?php // echo $form->field($model, 'nutricion_fr') ?>

    <?php // echo $form->field($model, 'nutricion_de') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
