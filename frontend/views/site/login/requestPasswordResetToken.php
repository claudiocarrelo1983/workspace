<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;

$path2 = 'reset_token';
?>

<!-- Banner -->
<?= $this->render('@frontend/views/site/banner',['path1' => 'Menu','path2' => $path2]); ?>

<div role="main" class="main my-5">
    <div class="container py-4">  
        <div class="row justify-content-center">   
            <div class="col-lg-12 text-center">
                <h3 class="font-weight-bold text-3 mb-0">
                    <p>Please fill out your email. A link to reset password will be sent there.</p>
                    <?php // Yii::t('app', "login_block_title_1") ?>
                </h3>            
            </div>  
   
            <div class="col-md-6 col-lg-5 mb-5 mb-lg-0 ">
                <div class="m-2 pb-2 pt-2">  
                    <?php $form = ActiveForm::begin(['id' => 'resend-verification-email-form']); ?>              
                        <div class="row">   
                            <div class="col-lg-12">
                                <?= $form->field($model, 'email')->textInput(['class' => 'form-control form-control-lg text-4',  'autofocus' => true])->label(Yii::t('app', "email"))?>                         
                            </div>
                            <div class="col-lg-12 pt-4">                           
                                    <?= Html::submitButton(Yii::t('app', "send_button"), ['class' => 'btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3', 'name' => 'login-button']) ?>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
