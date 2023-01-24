<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RecipesCategorySearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="recipes-category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-lg-3 col-sm-12">
            <?= $form->field($model, 'id') ?>
        </div>      
        <div class="col-lg-3 col-sm-12">
            <?= $form->field($model, 'page_code') ?>
        </div>
        <div class="col-lg-3 col-sm-12">
            <?= $form->field($model, 'recipe_cat_code') ?>
        </div>
        <div class="col-lg-3 col-sm-12">
            <?= $form->field($model, 'description') ?>
        </div>
    </div>


    <?php // echo $form->field($model, 'recipe_pt') ?>

    <?php // echo $form->field($model, 'recipe_es') ?>

    <?php // echo $form->field($model, 'recipe_en') ?>

    <?php // echo $form->field($model, 'recipe_it') ?>

    <?php // echo $form->field($model, 'recipe_fr') ?>

    <?php // echo $form->field($model, 'recipe_de') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group py-3">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
