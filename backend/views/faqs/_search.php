<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FaqsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faqs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-2">
            <?= $form->field($model, 'id') ?>
        </div>
        <div class="col-2">
            <?= $form->field($model, 'page_code_question') ?>
        </div>
        <div class="col-2">
            <?= $form->field($model, 'page_code_answer') ?>
        </div>
        <div class="col-3">
             <?= $form->field($model, 'question') ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'answer') ?>
        </div>
    </div>

    <?php // echo $form->field($model, 'question_en') ?>

    <?php // echo $form->field($model, 'answer_en') ?>

    <?php // echo $form->field($model, 'question_es') ?>

    <?php // echo $form->field($model, 'answer_es') ?>

    <?php // echo $form->field($model, 'question_it') ?>

    <?php // echo $form->field($model, 'answer_it') ?>

    <?php // echo $form->field($model, 'question_de') ?>

    <?php // echo $form->field($model, 'answer_de') ?>

    <?php // echo $form->field($model, 'question_fr') ?>

    <?php // echo $form->field($model, 'answer_fr') ?>

    <?php // echo $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
