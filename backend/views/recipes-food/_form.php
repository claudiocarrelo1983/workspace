<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RecipesFood */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipes-food-form">
    <?php $form = ActiveForm::begin([
        'id' => 'form-recipe-food', 
        'enableClientValidation' => true, 
        'enableAjaxValidation' => false,
        'action' => ['/recipe-food/create', 
        '#' => 'create'],                                             
        'options' => ['enctype' => 'multipart/form-data']]);
    ?>   

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'measure')->dropdownList(
        ['milliliters' => 'Milliliters', 'grams' => 'Grams'],
        ['prompt'=>'Grams']); 
    ?>

    <?= $form->field($model, 'calories')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'carbs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'protein')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nutricion_pt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nutricion_es')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nutricion_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nutricion_it')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nutricion_fr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nutricion_de')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->dropdownList(
        [1 => 'Yes', 0 => 'No'],
        ['prompt'=>'Active']); 
    ?>

    <div class="form-group">
        <?= Html::submitInput('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
