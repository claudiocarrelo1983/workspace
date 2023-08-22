<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use common\Helpers\Helpers;

?>
<?= $this->render('/client/client-booking-header', ['myData' => '', 'logo' => '']); ?>

<div role="main" class="main  pb-5">
    <div class="container py-5">  
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <h2 class="font-weight-bold text-9 mb-0 pb-4">
                    <?= Yii::t('app', "Client Login") ?>
                </h2>            
            </div>           
            <div class="col-md-6 col-lg-5 mb-5 mb-lg-0 ">
                <div class="m-2 pb-2 pt-2">        
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>                   
                        <div class="row">    
                            <?= $form->field($model, 'field')->hiddenInput(['value' => Helpers::encrypt('client', '10')])->label(false)?>
                            <div class="form-group col-12">                                     
                                <?= $form->field($model, 'username')->textInput(['class' => 'form-control form-control-lg text-5',  'autofocus' => true])->label(Yii::t('app', "login_label_username_2"))?>
                            </div>
                            <div class="form-group col-12 pt-3">
                                <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control form-control-lg text-5'])->label(Yii::t('app', "login_label_password_2"))?>
                            </div>  
                        </div>   
                        <div class="row justify-content-between pt-3">                    
                            <div class="col-6">      
                                <?= $form->field($model, 'rememberMe', ['template'=>'<div class="control-group">
                                        <label class="control control--checkbox checkbox-small-text">  
                                            {input} '.Yii::t('app', "login_block_remember_me_1").'                                    
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>'])->textInput(['class'=>"",'type'=>'checkbox'])?>                                
                            </div> 
                            <div class="form-group col-md-auto">                        
                                <?= Html::a(
                                    Yii::t('app', 'login_block_forgot_password_2'), 
                                    ['site/request-password-reset'],     
                                    [
                                    'class' => 'text-decoration-none text-color-dark text-color-hover-primary font-weight-semibold text-2',
                                    'data-hash' => '',         
                                    'data-hash-offset' => 0,  
                                    'data-hash-offset-lg' => 130,  
                                    ]      
                                ) ?>
                            </div>
                            <div style="color:#999;margin:1em 0">                          
                                <?=  Yii::t('app', 'login_block_verification_email_2')  ?> <?= Html::a(Yii::t('app', 'login_block_resend_2'), ['site/resend-verification-email']) ?>
                            </div>                     
                        </div>                         
                        <div class="row">
                            <div class="form-group col">
                                <?= Html::submitButton(Yii::t('app', "login_button_2"), [
                                        'class' => 'btn btn-primary btn-outline  w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3', 
                                        'name' => 'login-button'
                                    ]) ?>
                            </div>
                        </div>
                        <hr class="solid my-5">
                        <div class="row">
                            <div class="form-group col">
                                <?= Html::a(
                                    Yii::t('app', 'Sign Up'), 
                                    ['/page/signup', 'code' => Yii::$app->request->get('code')],     
                                    [
                                        'class' => 'btn btn-success btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3'                              
                                    ]      
                                ) ?>
                            </div>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>