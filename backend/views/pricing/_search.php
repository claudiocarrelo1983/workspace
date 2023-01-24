<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\PricingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pricing-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">    
        <div class="col-lg-2 col-sm-12">
            <?= $form->field($model, 'title') ?>
        </div>
        <div class="col-lg-2 col-sm-12">
            <?= $form->field($model, 'coin') ?>
        </div>
        <div class="col-lg-2 col-sm-12">
             <?= $form->field($model, 'key') ?>
        </div>
        <div class="col-lg-2 col-sm-12">
            <?= $form->field($model, 'standard') ?>
        </div>
        <div class="col-lg-2 col-sm-12">
            <?= $form->field($model, 'professional') ?>
        </div>
        <div class="col-lg-2 col-sm-12">
            <?= $form->field($model, 'enterprise') ?>
        </div>
    </div>

    <div class="form-group py-3">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
