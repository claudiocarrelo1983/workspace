<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\NutricionFoodSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nutricion-food-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'nutricion_code') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'nutricion_pt') ?>

    <?php // echo $form->field($model, 'nutricion_es') ?>

    <?php // echo $form->field($model, 'nutricion_en') ?>

    <?php // echo $form->field($model, 'nutricion_it') ?>

    <?php // echo $form->field($model, 'nutricion_fr') ?>

    <?php // echo $form->field($model, 'nutricion_de') ?>

    <?php // echo $form->field($model, 'group') ?>

    <?php // echo $form->field($model, 'calories') ?>

    <?php // echo $form->field($model, 'energy') ?>

    <?php // echo $form->field($model, 'fat') ?>

    <?php // echo $form->field($model, 'protein') ?>

    <?php // echo $form->field($model, 'carbs') ?>

    <?php // echo $form->field($model, 'lipids_saturated') ?>

    <?php // echo $form->field($model, 'lipids_unsaturated') ?>

    <?php // echo $form->field($model, 'lipids_monoglycerides') ?>

    <?php // echo $form->field($model, 'sugars') ?>

    <?php // echo $form->field($model, 'fibers') ?>

    <?php // echo $form->field($model, 'sodium') ?>

    <?php // echo $form->field($model, 'calcium') ?>

    <?php // echo $form->field($model, 'iron') ?>

    <?php // echo $form->field($model, 'colesterol') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
