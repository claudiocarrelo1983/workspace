<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\EventsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="events-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'company_code') ?>

    <?= $form->field($model, 'event_code') ?>

    <?= $form->field($model, 'company_code_location') ?>

    <?php // echo $form->field($model, 'template_code') ?>

    <?php // echo $form->field($model, 'path') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'page_code_title') ?>

    <?php // echo $form->field($model, 'page_code_text') ?>

    <?php // echo $form->field($model, 'title_pt') ?>

    <?php // echo $form->field($model, 'text_pt') ?>

    <?php // echo $form->field($model, 'title_en') ?>

    <?php // echo $form->field($model, 'text_en') ?>

    <?php // echo $form->field($model, 'frequency') ?>

    <?php // echo $form->field($model, 'start_day') ?>

    <?php // echo $form->field($model, 'end_day') ?>

    <?php // echo $form->field($model, 'start_hour') ?>

    <?php // echo $form->field($model, 'end_hour') ?>

    <?php // echo $form->field($model, 'number_or_hours') ?>

    <?php // echo $form->field($model, 'cost') ?>

    <?php // echo $form->field($model, 'max_num_people') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'login_required') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
