<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Sheddule $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sheddule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'team_username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'client_username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_cat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
