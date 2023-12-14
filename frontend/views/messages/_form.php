<?php

use yii\widgets\ActiveForm;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\Messages $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="messages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'template_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_code_location_array')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'genders')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_pt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_pt')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'from_schedule_date')->textInput() ?>

    <?= $form->field($model, 'to_schedule_date')->textInput() ?>

    <?= $form->field($model, 'schedule_hour')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reminder_number')->textInput() ?>

    <?= $form->field($model, 'reminder_hours_days')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'language')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'send')->textInput() ?>

    <?= $form->field($model, 'error')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <div class="form-group pt-3">
        <?=  Helpers::displaySaveButtonsView($model); ?> 
    </div>

    <?php ActiveForm::end(); ?>

</div>
