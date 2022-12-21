<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NutricionFood */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nutricion-food-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'group')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'calories')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'energy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'protein')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'carbs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lipids_saturated')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lipids_unsaturated')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lipids_monoglycerides')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sugars')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fibers')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sodium')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'calcium')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'iron')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cholesterol')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
