<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Clients */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clients-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row pb-3">
        <div class="col-3">
            <?= $form->field($model, 'username') ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'first_name') ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'last_name') ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'name') ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'email') ?>
        </div>
        <div class="col-3">
            <?=  $form->field($model, 'gender') ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'contact_number') ?>
        </div>
    </div>
    </br>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
