<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\Models\ClientsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="clients-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row pb-3">
        <div class="col">
            <?= $form->field($model, 'username') ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'first_name') ?>
        </div>
        <div class="col">
            <?php  echo $form->field($model, 'nif') ?>
        </div>
        <div class="col">
            <?php  echo $form->field($model, 'contact_number') ?>
        </div>
    </div>
  

    <?php // $form->field($model, 'contact_number') ?>

    <?php // $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'nif') ?>

    <?php // echo $form->field($model, 'first_name') ?>

    <?php // echo $form->field($model, 'last_name') ?>

    <?php // echo $form->field($model, 'full_name') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'path') ?>

    <?php // echo $form->field($model, 'dob') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'company_code') ?>

    <?php // echo $form->field($model, 'starting_date') ?>

    <?php // echo $form->field($model, 'payment_month_fee') ?>

    <?php // echo $form->field($model, 'payment_year_fee') ?>

    <?php // echo $form->field($model, 'offer') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'language') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'postcode') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'voucher') ?>

    <?php // echo $form->field($model, 'terms_and_conditions') ?>

    <?php // echo $form->field($model, 'gdpr') ?>

    <?php // echo $form->field($model, 'privacy') ?>

    <?php // echo $form->field($model, 'newsletter') ?>

    <?php // echo $form->field($model, 'auth_key') ?>

    <?php // echo $form->field($model, 'password_hash') ?>

    <?php // echo $form->field($model, 'password_reset_token') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'subscription') ?>

    <?php // echo $form->field($model, 'subscription_startingdate') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group pb-3">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <a class= "btn btn-outline-secondary" href="<?= Url::toRoute('clients/index'); ?>">Reset</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
