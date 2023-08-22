<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ShedduleSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sheddule-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'team_username') ?>

    <?= $form->field($model, 'client_username') ?>

    <?= $form->field($model, 'company_code') ?>

    <?= $form->field($model, 'service_cat') ?>

    <?php // echo $form->field($model, 'service_name') ?>

    <?php // echo $form->field($model, 'available') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'contact_number') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'nif') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
