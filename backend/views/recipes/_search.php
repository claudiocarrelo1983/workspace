<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\RecipesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row py-4">   
        <div class="col-3">
        <?= $form->field($model, 'fatsecret_id') ?>
        </div>   
        <div class="col-3">
        <?= $form->field($model, 'recipe_title') ?>
        </div>    
        <div class="col-3">
            <?php  echo $form->field($model, 'recipe_cat_code') ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'active')->dropdownList(
            [
                1 => 'Yes',
                0 => 'No'
            ])->label('Valid'); 
            ?>
        </div>
    </div>  


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
        <a class= "btn btn-outline-secondary" href="<?= Url::toRoute('recipes/index'); ?>">Reset</a>
    </div>


    <?php ActiveForm::end(); ?>

</div>
