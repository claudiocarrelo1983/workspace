<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Resend verification email';
$this->params['breadcrumbs'][] = $this->title;
$path2 = 'resend';
?>

<!-- Banner -->
<?= $this->render('/client/client-booking-header', ['myData' => [], 'model' => $model]); ?>

<div class="container py-4">
    <div class="row">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5 mb-5 mb-lg-0">
                <div class="site-resend-verification-email ">
                    <div class=" text-center">
                        <h4 class="font-weight-bold text-4 mb-0">
                            <?= Yii::t('app','resend_verification_email_title') ?>
                        </h4>
                    </div>
                    <?php $form = ActiveForm::begin(['id' => 'resend-verification-email-form']); ?>

                    <?= $form->field($model, 'email')->textInput(['class'=> 'form-control form-control-lg text-4 is-invalid','autofocus' => true])->label(Yii::t('app','email')) ?>

                    <?php if (Yii::$app->session->hasFlash('success')): ?>                   
                        <div class="alert alert-success alert-dismissible mt-3" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>                        
                            <?= Yii::t('app','resend_verification_email_success_message') ?>
                        </div>
                    <?php endif; ?>
                  
           
                    <div class="form-group mt-4">
                        <?= Html::submitButton(Yii::t('app','submit_button'), ['class' => 'btn btn-primary  w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
            
                </div>
            </div>
        </div>
    </div>
</div>