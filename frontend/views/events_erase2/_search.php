<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\EventsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="events-search my-5">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        ]);
     ?>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'username')->label(Yii::t('app', 'username')) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'event_code')->label(Yii::t('app', 'event_code')) ?>
        </div>
    </div>   

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'title_pt') ?>

    <?php // echo $form->field($model, 'title_en') ?>

    <?php // echo $form->field($model, 'color_code') ?>

    <?php // echo $form->field($model, 'frequency') ?>

    <?php // echo $form->field($model, 'start') ?>

    <?php // echo $form->field($model, 'end') ?>

    <?php // echo $form->field($model, 'allDay') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'className') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group my-3">
        <?= Html::submitButton(Yii::t('app', 'search_button'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'reset_button'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
