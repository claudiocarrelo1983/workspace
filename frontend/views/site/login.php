<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

$path2 = 'login';

?>

<?= $this->render('@frontend/views/site/banner',['path1' => 'Menu','path2' => $path2]); ?>

    <div role="main" class="main my-5">
        <div class="container py-4">  
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <h2 class="font-weight-bold text-9 mb-0">
                        <?= Yii::t('app', "login_block_title_1") ?>
                    </h2>
                    <p class="text-1rem text-color-default negative-ls-05 pt-3 pb-4 mb-5">
                        <?= Yii::t('app', "login_block_text_1") ?>           
                    </p>
                </div>   
            
                <div class="col-md-6 col-lg-5 mb-5 mb-lg-0 ">
                    <div class="m-4 pb-5 pt-4">
        
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                        <div class="row">    
                            <div class="form-group col-12">                                     
                                <?= $form->field($model, 'username')->textInput(['class' => 'form-control form-control-lg text-4',  'autofocus' => true])->label(Yii::t('app', "login_label_username_2"))?>
                            </div>
                            <div class="form-group col-12">
                                <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control form-control-lg text-4'])->label(Yii::t('app', "login_label_password_2"))?>
                            </div>
                            <div class="col-12">       

                                <?= $form->field($model, 'rememberMe', ['template'=>'<div class="control-group">
                                        <label class="control control--checkbox checkbox-small-text">  
                                            {input} '.Yii::t('app', "login_block_remember_me_1").'                                    
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>'])->textInput(['class'=>"",'type'=>'checkbox'])?>                                
                            </div>    
                            
                            <div class="form-group col-12">   
                                <div style="color:#999;margin:1em 0">
                                    <?= Yii::t('app', "login_block_forgot_password_2")  ?>
                                    <?= Html::a(Yii::t('app', "login_block_reset_it_2"), ['site/request-password-reset']) ?>.
                                    <br>
                                    <?= Yii::t('app', "login_block_verification_email_2")  ?>
                                    <?= Html::a(Yii::t('app', "login_block_resend_2"), ['site/resend-verification-email']) ?>
                                </div>
                            </div>
                        </div>                  

                        <div class="row">
                            <div class="form-group col">
                                <?= Html::submitButton(Yii::t('app', "login_button_2"), ['class' => 'btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3', 'name' => 'login-button']) ?>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Sub Footer -->
<?= $this->render('@frontend/views/site/subfooter',['path2' => $path2]); ?>
<!-- Sub Footer -->