<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RecipesSteps $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="recipes-steps-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'recipe_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recipe_step_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'recipe_step_text_pt')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'recipe_step_text_es')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'recipe_step_text_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'recipe_step_text_it')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'recipe_step_text_fr')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'recipe_step_text_de')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
