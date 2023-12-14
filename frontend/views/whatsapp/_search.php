<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\EmailSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="email-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'company_code') ?>

    <?= $form->field($model, 'company_code_location_array') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'subject') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'users') ?>

    <?php // echo $form->field($model, 'language') ?>

    <?php // echo $form->field($model, 'send') ?>

    <?php // echo $form->field($model, 'error') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
