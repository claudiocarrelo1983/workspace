<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RecipesFood $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="recipes-food-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'recipe_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recipe_food_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'measure')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'calories')->textInput() ?>

    <?= $form->field($model, 'lipids')->textInput() ?>

    <?= $form->field($model, 'colesterol')->textInput() ?>

    <?= $form->field($model, 'sodium')->textInput() ?>

    <?= $form->field($model, 'fibers')->textInput() ?>

    <?= $form->field($model, 'sugar')->textInput() ?>

    <?= $form->field($model, 'fat')->textInput() ?>

    <?= $form->field($model, 'carbs')->textInput() ?>

    <?= $form->field($model, 'protein')->textInput() ?>

    <?= $form->field($model, 'recipe_food_pt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recipe_food_es')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recipe_food_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recipe_food_it')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recipe_food_fr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recipe_food_de')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
