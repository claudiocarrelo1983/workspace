<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;


$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;

$path2 = 'sign_up'

?>

<?= $this->render('../banner',['path1' => 'Menu','path2' => $path2]); ?>

    <div role="main" class="main my-5">
        <div class="container py-4">  
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <h2 class="font-weight-bold text-9 mb-0">
                        <?= Yii::t('app', "signup_block_title_1") ?>
                    </h2>
                    <p class="text-1rem text-color-default negative-ls-05 pt-3 pb-4 mb-5">
                        <?= Yii::t('app', "signup_block_text_1") ?>           
                    </p>
                </div>   
                <div class="col-md-10 col-lg-10">           
                    <h2 class="font-weight-bold text-5 mb-0">
                        <?= Yii::t('app', "signup_block_register") ?>
                    </h2>
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?> 
                        <div class="row">
                            <div class="form-group col-lg-6">                              
                                <?= $form->field($modelSignupForm, 'first_name')->textInput(['maxlength' => true, 'class' => 'form-control text-3 h-auto py-2'])->label(Yii::t('app', "signup_block_first_name").':') ?>                             
                            </div>
                            <div class="form-group col-lg-6">
                                <?= $form->field($modelSignupForm, 'last_name')->textInput(['maxlength' => true, 'class' => 'form-control text-3 h-auto py-2'])->label(Yii::t('app', "signup_block_last_name").':') ?>
                            </div>                     
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">          
                                <?= $form->field($modelSignupForm, 'company')->textInput(['maxlength' => true, 'class' => 'form-control text-3 h-auto py-2'])->label(Yii::t('app', "signup_block_company").':') ?>                             
                            </div>                          
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <?= $form->field($modelSignupForm, 'username')->textInput(['class' => 'form-control form-control-lg text-4',  'autofocus' => true])->label(Yii::t('app', "signup_block_username").':')?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">                        
                                <?= $form->field($modelSignupForm, 'email')->textInput(['class' => 'form-control form-control-lg text-4',  'autofocus' => true])->label(Yii::t('app', "signup_block_email").':') ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <?= $form->field($modelSignupForm, 'password')->passwordInput(['class' => 'form-control form-control-lg text-4'])->label(Yii::t('app', "signup_block_password").':')?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">                    
                                <?= $form->field($modelSignupForm, 'newsletter')->checkBox(['required' => true,'label' => Yii::t('app', "signup_block_validation_newsletter"),'data-size'=>'small', 'class'=>'form-control ','id'=>'active']) ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">                    
                                <?= $form->field($modelSignupForm, 'privacy')->checkBox(['privacy' => true,'label' => Yii::t('app', "signup_block_validation_terms"),'data-size'=>'small', 'class'=>'form-control ','id'=>'active']) ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">                    
                                <?= $form->field($modelSignupForm, 'terms_and_conditions')->checkBox(['required' => true,'label' => Yii::t('app', "signup_block_validation_privacy").'<a href="'.Url::toRoute('site/privacy-policy').'" class="text-decoration-none">'.Yii::t('app', "signup_block_privacy_link").'</a>','data-size'=>'small', 'class'=>'form-control ','id'=>'active']) ?>
                            </div>
                        </div>      
                        
                        <div class="row">
                            <div class="form-group col">
                                <button type="submit" class="btn btn-dark btn-modern text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading...">
                                    <?= Yii::t('app', "signup_block_register") ?>
                                </button>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sub Footer -->
<?= $this->render('@frontend/views/site/subfooter',['path2' => $path2]); ?>
<!-- Sub Footer -->