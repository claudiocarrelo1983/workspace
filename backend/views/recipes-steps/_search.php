<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\Models\RecipesStep $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="recipes-steps-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'recipe_code') ?>

    <?= $form->field($model, 'recipe_step_text') ?>

    <?= $form->field($model, 'recipe_step_text_pt') ?>

    <?= $form->field($model, 'recipe_step_text_es') ?>

    <?php // echo $form->field($model, 'recipe_step_text_en') ?>

    <?php // echo $form->field($model, 'recipe_step_text_it') ?>

    <?php // echo $form->field($model, 'recipe_step_text_fr') ?>

    <?php // echo $form->field($model, 'recipe_step_text_de') ?>

    <?php // echo $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
