<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\Helpers\Helpers;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\Team $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="team-form">
    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>              
        <div class="row">                         
            <div class="col-lg-2"> 
                <?= $form->field($model, 'title')->dropdownList(
                    Helpers::dropdownTitle(),
                    ['prompt'=> Yii::t('app', "select_title")])->label(Yii::t('app', "title")); 
                ?>                              
            </div>
            <div class="col-lg-5">                              
                <?= $form->field($model, 'first_name')->textInput()->label(Yii::t('app', "first_name")) ?>                             
            </div>
            <div class="col-lg-5">
                <?= $form->field($model, 'last_name')->textInput()->label(Yii::t('app', "last_name")) ?>
            </div>                           
        </div>
        <div class="row pt-3"> 
            <div class="col-lg-2"> 
                <?= $form->field($model, 'gender')->dropdownList(
                    Helpers::dropdownGender(),
                    ['prompt'=> Yii::t('app', "select_gender")])->label(Yii::t('app', "gender")); 
                ?>                              
            </div>                
            <div class="col-lg-5">          
                <?= $form->field($model, 'contact_number')->textInput()->label(Yii::t('app', "contact_number")) ?>                             
            </div>   
            <div class="col-lg-5">                        
                <?= $form->field($model, 'email')->textInput()->label(Yii::t('app', "email")) ?>
            </div> 
        </div> 
        <div class="row pt-3">  
            <div class="col-lg-4">          
                <?= $form->field($model, 'nif')->textInput()->label(Yii::t('app', "nif")) ?>                             
            </div>                                        
            <div class="col-lg-4">          
                <?= $form->field($model, 'location_code')->dropDownList(
                        Helpers::dropdownCompanyLocations(),
                        ['prompt'=> Yii::t('app', 'select_company_code_location')], 
                        ['separator' => '<br>']
                    )->label(Yii::t('app', 'company_code')); 
                ?>   
                <a href="<?= Url::toRoute('company-locations/create') ?>" target="_blank"  class="pb-5">
                    <?= Yii::t('app', 'create_company_location') ?>	
                    
                </a>         
            </div>
            <div class="col-lg-4">  
                <?= $form->field($model, 'time_window')->dropDownList(
                        Helpers::dropdownTimeWindow(),   
                        ['prompt'=> Yii::t('app', 'select_time_window')],                   
                        ['separator' => '<br>']
                    )->label(Yii::t('app', 'time_window')); 
                ?>                           
            </div>
        </div>
        <div class="row pt-3">     
            <div class="col-lg-4"> 
                <label>
                    <?= Yii::t('app', 'date_of_birth') ?>
                </label>
                <div class="input-group"  id="from_schedule_date">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="validationTooltipUsernamePrepend">
                            <i class="fas fa-calendar-alt kv-dp-icon"></i>
                        </span>                  
                    </div>
                    <?= $form->field($model, 'dob')->textInput(           
                        [
                            'inputOptions' => [ 'placeholder' => 'Ihre E-Mail Adresse', 'class' => 'newsletter-cta-mail' ],
                            'class' => 'form-control',
                            'data-date-format' => 'yyyy-m-dd',
                            'data-date-container' => '#from_schedule_date',
                            'data-provide' => 'datepicker',
                            'style' => ' height: 38px; ',    
                            'options' => ['tag' => false]        
                        ]
                        )->label(false); 
                    ?>  
                </div>	        
            </div> 
                       
        </div>    
        <div class="row pt-3">                    
            <div class="form-group col-lg-6">
                <?= $form->field($model, 'username')->textInput()->label(Yii::t('app', "signup_block_username"))?>
            </div>                 
            <div class="form-group col-lg-6"> 
                <?= $form->field($model, 'password')->passwordInput(['placeholder' => ''])->label(Yii::t('app', "signup_block_password"))?>
            </div>    
        </div>      
        <div class="row pt-4">
            <div class="form-group col">
                <?= Html::submitButton(Yii::t('app', "submit_button"), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
