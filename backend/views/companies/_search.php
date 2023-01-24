<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CompaniesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="companies-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-4">
            <?= $form->field($model, 'id') ?>
        </div>
        <div class="col-4">
             <?= $form->field($model, 'first_name') ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'last_name') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <?= $form->field($model, 'full_name') ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'gender') ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'title') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <?= $form->field($model, 'nif') ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'email') ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'team_code') ?>
        </div>
    </div>


  

   

   

  



    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'nif') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'contact_number') ?>

    <?php // echo $form->field($model, 'dob') ?>

    <?php // echo $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'team_code') ?>

    <?php // echo $form->field($model, 'team_name') ?>

    <?php // echo $form->field($model, 'summary') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'role') ?>

    <?php // echo $form->field($model, 'level') ?>

    <?php // echo $form->field($model, 'sublevel') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'postcode') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'language') ?>

    <?php // echo $form->field($model, 'website') ?>

    <?php // echo $form->field($model, 'facebook') ?>

    <?php // echo $form->field($model, 'pinterest') ?>

    <?php // echo $form->field($model, 'instagram') ?>

    <?php // echo $form->field($model, 'twitter') ?>

    <?php // echo $form->field($model, 'tiktok') ?>

    <?php // echo $form->field($model, 'linkedin') ?>

    <?php // echo $form->field($model, 'youtube') ?>

    <?php // echo $form->field($model, 'gdpr') ?>

    <?php // echo $form->field($model, 'terms_and_conditions') ?>

    <?php // echo $form->field($model, 'newsletter') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group py-3">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
