<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MessagesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="messages-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'company_code') ?>

    <?= $form->field($model, 'template_code') ?>

    <?= $form->field($model, 'company_code_location_array') ?>

    <?= $form->field($model, 'genders') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'title_pt') ?>

    <?php // echo $form->field($model, 'text_pt') ?>

    <?php // echo $form->field($model, 'title_en') ?>

    <?php // echo $form->field($model, 'text_en') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'from_schedule_date') ?>

    <?php // echo $form->field($model, 'to_schedule_date') ?>

    <?php // echo $form->field($model, 'schedule_hour') ?>

    <?php // echo $form->field($model, 'reminder_number') ?>

    <?php // echo $form->field($model, 'reminder_hours_days') ?>

    <?php // echo $form->field($model, 'language') ?>

    <?php // echo $form->field($model, 'stage') ?>

    <?php // echo $form->field($model, 'send') ?>

    <?php // echo $form->field($model, 'error') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
