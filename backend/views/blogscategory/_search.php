<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\BlogsCategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="blogs-category-search">
  
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>
  <div class="row">
        <div class="col-lg-3 col-sm-12">
            <?= $form->field($model, 'id') ?>
        </div>
        <div class="col-lg-3 col-sm-12">
        <?= $form->field($model, 'tag') ?>
        </div>
        <div class="col-lg-3 col-sm-12">
        <?= $form->field($model, 'page_code') ?>
        </div>
        <div class="col-lg-3 col-sm-12">
        <?= $form->field($model, 'tag_parent_id') ?>
        </div>
     
    </div>
        

    <div class="form-group py-3">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
