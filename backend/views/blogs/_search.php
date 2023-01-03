<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;




/* @var $this yii\web\View */
/* @var $model app\Models\BlogsSearch */
/* @var $form yii\widgets\ActiveForm */



?>

<div class="blogs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-3">
            <?= $form->field($model, 'id') ?>
        </div>
   
        <div class="col-3">
            <?= $form->field($model, 'title') ?>
        </div>
        <div class="col-3">            
        <?= $form->field($model, 'username') ?>
        </div>
        
    </div>
    


    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'username') ?>


    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
