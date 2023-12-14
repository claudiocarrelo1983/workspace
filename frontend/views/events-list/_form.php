<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Events $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="events-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'event_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_code_location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'template_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'page_code_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'page_code_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_pt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_pt')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'frequency')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_day')->textInput() ?>

    <?= $form->field($model, 'end_day')->textInput() ?>

    <?= $form->field($model, 'start_hour')->textInput() ?>

    <?= $form->field($model, 'end_hour')->textInput() ?>

    <?= $form->field($model, 'number_or_hours')->textInput() ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'max_num_people')->textInput() ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'login_required')->textInput() ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
