<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\Models\TranslationsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="translations-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-4">
            <?= $form->field($model, 'id') ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'country_code') ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'page') ?>
        </div>  
        <div class="col-4">
            <?= $form->field($model, 'page_code') ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'text') ?>
        </div>    
    </div>

    <?php // echo $form->field($model, 'active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <a class= "btn btn-outline-secondary" href="<?= Url::toRoute('translations/index'); ?>">Reset</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
