<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\CompanyDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'company_code') ?>

    <?= $form->field($model, 'logo') ?>

    <?= $form->field($model, 'url_code') ?>

    <?= $form->field($model, 'text') ?>

    <?php echo $form->field($model, 'extternal_url') ?>

    <?php echo $form->field($model, 'facebook') ?>

    <?php echo $form->field($model, 'instagram') ?>

    <?php echo $form->field($model, 'twitter') ?>

    <?php echo $form->field($model, 'linkedin') ?>

    <?php echo $form->field($model, 'youtube') ?>

    <?php  echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
