<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\TextsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="texts-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-3">
            <?= $form->field($model, 'code') ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'page_code_title') ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'page_code_text') ?>   
        </div>
        <div class="col-3">
            <?= $form->field($model, 'title') ?>
        </div>
    </div>

    <div class="form-group py-3">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
