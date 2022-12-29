<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RecipesFoodSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="recipes-food-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'recipe_code') ?>

    <?= $form->field($model, 'recipe_food_name') ?>

    <?= $form->field($model, 'measure') ?>

    <?= $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'calories') ?>

    <?php // echo $form->field($model, 'lipids') ?>

    <?php // echo $form->field($model, 'colesterol') ?>

    <?php // echo $form->field($model, 'sodium') ?>

    <?php // echo $form->field($model, 'fibers') ?>

    <?php // echo $form->field($model, 'sugar') ?>

    <?php // echo $form->field($model, 'fat') ?>

    <?php // echo $form->field($model, 'carbs') ?>

    <?php // echo $form->field($model, 'protein') ?>

    <?php // echo $form->field($model, 'recipe_food_pt') ?>

    <?php // echo $form->field($model, 'recipe_food_es') ?>

    <?php // echo $form->field($model, 'recipe_food_en') ?>

    <?php // echo $form->field($model, 'recipe_food_it') ?>

    <?php // echo $form->field($model, 'recipe_food_fr') ?>

    <?php // echo $form->field($model, 'recipe_food_de') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
