<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;

$this->title = 'Login';
?>

<div role="main" class="main my-5">
    <div class="container py-4">
        <div class="row justify-content-center">
          
            <div class="col-md-6 col-lg-5 mb-5 mb-lg-0 border shadow ">
                <div class="m-4 pb-5 pt-4">
                <span class="text-center">
                    <?= Html::a(
                        Yii::t('app',
                        '<div class="header-row py-3">
                            <div class="header-logo">							
                                <span class="text-color-dark font-weight-normal text-10 mb-2 mt-2">My</span>
                                <span class="text-color-dark font-weight-extra-bold text-10 mb-2 mt-2">Special</span>
                                <span class="font-weight-extra-bold blue-lettering text-10 mb-2 mt-2">Gym</span>						
                            </div>
                        </div>'),
                        Url::home(),     
                        [
                        'class' => 'logo-url',
                        'data-hash' => '',         
                        'data-hash-offset' => 0,  
                        'data-hash-offset-lg' => 130,  
                        ]      
                    ) ?>
                </span>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <div class="row  ">                                         
                        <?= $form->field($model, 'username')->textInput(['class' => 'form-control form-control-lg text-4',  'autofocus' => true])->label('Username')?>
                      
                        <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control form-control-lg text-4'])->label('Password')?>
                    </div>
                  

                    <div class="row justify-content-between">                   
                        <div class="custom-control custom-checkbox">
                                <?= $form->field($model, 'rememberMe')->checkbox(['class' => 'custom-control-input'])->label('Remember Me')?>
                        </div>                                        
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <?= Html::submitButton('Login', ['class' => 'btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3', 'name' => 'login-button']) ?>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
