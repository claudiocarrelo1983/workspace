<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
$path2 = 'reset_token';
?>


<!-- Banner -->
<?= $this->render('@frontend/views/site/banner',['path1' => 'Menu','path2' => $path2]); ?>

<div class="container py-4">
    <div class="row">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5 mb-5 mb-lg-0">
                <div class="site-resend-verification-email ">
                    <div class=" text-center">
                        <h4 class="font-weight-bold text-4 mb-0">
                            <?= Yii::t('app','resend_password_reset_email_title') ?>
                        </h4>
                    </div>
                    <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                    <?= $form->field($model, 'password')->textInput(['class'=> 'form-control form-control-lg text-4 is-invalid','autofocus' => true])->label(Yii::t('app','password')) ?>

                    <?php if (Yii::$app->session->hasFlash('success')): ?>                   
                        <div class="alert alert-success alert-dismissible mt-3" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>                        
                            <?= Yii::t('app','resend_password_reset_email_success_message') ?>
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


<?= $this->render('/site/footer', ['modelSubscriber' => $modelSubscriber]); ?>