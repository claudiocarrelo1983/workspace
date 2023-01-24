<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\BlogsCommentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blogs-comments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'blog_id') ?>

    <?= $form->field($model, 'parent_id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group py-3">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
