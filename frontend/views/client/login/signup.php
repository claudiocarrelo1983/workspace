<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use common\Helpers\Helpers;
use kartik\date\DatePicker;


$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;

$path2 = 'sign_up';
$myData = '';

?>

<?= $this->render('/client/client-booking-header', ['myData' => $myData, 'model' => $model]); ?>

<div role="main" class="main pb-4">
    <div class="container">  
        <div class="row justify-content-center">      
            <div class="col-md-10 col-lg-10">           
                <h2 class="font-weight-bold text-8 mb-0 text-center">
                    <?= Yii::t('app', "signup_block_register") ?>
                </h2>
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>              
                    <div class="row">
                        <h2 class="font-weight-bold text-3 mb-0 pt-3">                                       
                            <?= Yii::t('app', 'signup_block_dados') ?>               
                        </h2>                      
                        <div class="form-group col-lg-2"> 
                            <?= $form->field($model, 'title')->dropdownList(
                                Helpers::dropdownTitle(),
                                ['prompt'=>'Select Title', 'class' => 'form-control text-2 h-auto py-2'])->label(Yii::t('app', "signup_block_title").':'); 
                            ?>                              
                        </div>
                        <div class="form-grou col-lg-5">                              
                            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'class' => 'form-control text-3 h-auto py-2'])->label(Yii::t('app', "signup_block_first_name").':') ?>                             
                        </div>
                        <div class="form-group  col-lg-5">
                            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'class' => 'form-control text-3 h-auto py-2'])->label(Yii::t('app', "signup_block_last_name").':') ?>
                        </div>                           
                    </div>                 
                    
                    <div class="row pt-5">  
                        <div class="form-group col-lg-2"> 
                            <?= $form->field($model, 'gender')->dropdownList(
                                Helpers::dropdownGender(),
                                ['prompt'=>'Select Gender', 'class' => 'form-control text-2 h-auto py-2'])->label(Yii::t('app', "gender").':'); 
                            ?>                              
                        </div>                
                        <div class="form-group col-lg-5">          
                            <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true, 'class' => 'form-control text-3 h-auto py-2'])->label(Yii::t('app', "signup_block_contact_number").':') ?>                             
                        </div>   
                        <div class="form-group col-lg-5">                        
                            <?= $form->field($model, 'email')->textInput(['class' => 'form-control text-3 h-auto py-2',  'autofocus' => true])->label(Yii::t('app', "signup_block_email").':') ?>
                        </div> 
                    </div> 
                    <div class="row pt-5">  
                        <div class="form-group col-lg-6">          
                            <?= $form->field($model, 'nif')->textInput(['maxlength' => true, 'class' => 'form-control text-3 h-auto py-2'])->label(Yii::t('app', "signup_block_nif").':') ?>                             
                        </div>                                          
                
                        
                        <div class="form-group col-lg-6">   
                            <label for="clients-gender">
                                <?= Yii::t('app', "date_of_birth") ?>                       
                            </label>
                        <?php                 
        
                            echo DatePicker::widget([
                                'model' => $model,                                                                                                      
                                'name' => 'dob',    
                                'id' => 'date-calendar-search', 
                                'removeButton' => false,
                                'value' => (empty($date) ? '' : date('d-m-Y', strtotime($date))),
                                'options' => [
                                    'placeholder' => 'Select date...',
                                    'class' => ' form-control text-4 h-auto py-1'
                                ],
                                'pluginOptions' => [  
                                    'autoclose' => true,           
                                    'format' => 'dd-mm-yyyy',
                                    'todayHighlight' => true
                                ]                   
                            ]);               
                        ?>  
                        </div>           
                    </div> 
                            
                    <h2 class="font-weight-bold text-3 mb-0 pt-5">
                        <?= Yii::t('app', "signup_block_login") ?>                   
                    </h2>
                    <div class="row">                    
                        <div class="form-group col-lg-6">
                            <?= $form->field($model, 'username')->textInput(['class' => 'form-control text-3 h-auto py-2',  'autofocus' => true])->label(Yii::t('app', "signup_block_username").':')?>
                        </div>                 
                        <div class="form-group col-lg-6"> 
                            <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control text-3 h-auto py-2'])->label(Yii::t('app', "signup_block_password").':')?>
                        </div>
                    </div>       
                    <div class="row">
                        <div class="form-group col pt-4">                    
                            <?= $form->field($model, 'newsletter')->checkBox(['required' => true,'label' => Yii::t('app', "signup_block_validation_newsletter"),'data-size'=>'small', 'class'=>'form-control ','id'=>'active']) ?>
                        </div>
                    </div>
              
                    <div class="row">
                        <div class="form-group col pt-4">                    
                            <?= $form->field($model, 'terms_and_conditions')->checkBox(['required' => true,'label' => Yii::t('app', "signup_block_validation_privacy").'<a href="'.Url::toRoute('site/privacy-policy').'" class="text-decoration-none">'.Yii::t('app', "signup_block_privacy_link").'</a>','data-size'=>'small', 'class'=>'form-control ','id'=>'active']) ?>
                        </div>
                    </div>      
                    
                    <div class="row pt-4">
                        <div class="form-group col">
                            <button type="submit" class="btn btn-primary btn-modern text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading...">
                                <?= Yii::t('app', "submit_button") ?>
                            </button>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
