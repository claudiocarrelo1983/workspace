<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\TicketsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tickets-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-4">
            <?= $form->field($model, 'id') ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'full_name') ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'email') ?>
        </div>  
        <div class="col-4">
            <?= $form->field($model, 'subject') ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'text') ?>
        </div>    
    </div>


    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
