<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RecipesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'recipe_code_title') ?>

    <?= $form->field($model, 'recipe_code_text') ?>

    <?= $form->field($model, 'recipe_title') ?>

    <?= $form->field($model, 'recipe_text') ?>

    <?php // echo $form->field($model, 'recipe_cat_code') ?>

    <?php // echo $form->field($model, 'cooking_time') ?>

    <?php // echo $form->field($model, 'number_of_people') ?>

    <?php // echo $form->field($model, 'recipe_pt') ?>

    <?php // echo $form->field($model, 'recipe_es') ?>

    <?php // echo $form->field($model, 'recipe_en') ?>

    <?php // echo $form->field($model, 'recipe_it') ?>

    <?php // echo $form->field($model, 'recipe_fr') ?>

    <?php // echo $form->field($model, 'recipe_de') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
