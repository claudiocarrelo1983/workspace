<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SubjectsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subjects-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">    
        <div class="col-4">
            <?= $form->field($model, 'id') ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'subject') ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'order') ?>
        </div>


        <?php //$form->field($model, 'text_pt') ?>

        <?php //$form->field($model, 'text_es') ?>

        <?php //$form->field($model, 'text_en') ?>

        <?php // echo $form->field($model, 'text_it') ?>

        <?php // echo $form->field($model, 'text_fr') ?>

        <?php // echo $form->field($model, 'text_de') ?>

        <?php // echo $form->field($model, 'order') ?>

        <?php // echo $form->field($model, 'created_date') ?>

        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
