<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\Helpers\Helpers;


/** @var yii\web\View $this */
/** @var app\models\Email $model */
/** @var yii\widgets\ActiveForm $form */
?>
<style>
    .calendar-input{
            
        width: 100%;
    }
  
</style>
<div class="email-form">
    <?php $form = ActiveForm::begin([

        'fieldConfig' => [

        'template' => "{input}",

        'options' => ['tag' => false], // remove wrapper tag

    ]]); ?>
    <div class="row">
        <div class="col-lg-3">  
            <label>
                <?= Yii::t('app', 'company_code_location') ?>
            </label>             
            <?= $form->field($model, 'company_code_location_array')->checkboxList(
                    Helpers::dropdownCompanyLocations(),
                    ['separator' => '<br>']
                    )->label(Yii::t('app', 'company_code_location')); 
            ?> 
        </div>
        <div class="col-lg-3"> 
            <label>
                <?= Yii::t('app', 'campaign_type') ?>
            </label> 
            <?= $form->field($model, 'type')->dropdownList(
                    Helpers::dropdownCampaignTypes(),
                    ['prompt'=> Yii::t('app', 'select_campaign_type_email')]
                    )->label(Yii::t('app', 'campaign_type')); 
            ?>            
        </div>
        <div class="col-lg-3"> 
            <label>
                <?= Yii::t('app', 'from_schedule_date') ?>
            </label>
            <div class="input-group"  id="from_schedule_date">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="validationTooltipUsernamePrepend">
                        <i class="fas fa-calendar-alt kv-dp-icon"></i>
                    </span>                  
                </div>
                <?= $form->field($model, 'from_schedule_date')->textInput(           
                    [
                        'inputOptions' => [ 'placeholder' => 'Ihre E-Mail Adresse', 'class' => 'newsletter-cta-mail' ],
                        'class' => 'form-control',
                        'data-date-format' => 'dd M, yyyy',
                        'data-date-container' => '#from_schedule_date',
                        'data-provide' => 'datepicker',
                        'style' => ' height: 38px;',    
                        'options' => ['tag' => false]        
                    ]
                    )->label(false); 
                ?>  
            </div>	        
        </div>  
        <div class="col-lg-3">    
            <label>
                <?= Yii::t('app', 'to_schedule_date') ?>
            </label>
            <div class="input-group"  id="from_schedule_date">
                <div class="input-group-text">
                    <i class="fas fa-calendar-alt kv-dp-icon"></i>
                </div>
                <?= $form->field($model, 'to_schedule_date')->textInput(           
                    [
                        'class' => 'form-control calendar-input',
                        'data-date-format' => 'dd M, yyyy',
                        'data-date-container' => '#from_schedule_date',
                        'data-provide' => 'datepicker',
                        'style' => ' height: 38px;'                 
                    ]
                    )->label(false); 
                ?>  
            </div>
        </div>   
    </div>


    <div class="row mt-4">
        <div class="col-lg-3"> 
            <label>
                <?= Yii::t('app', 'gender') ?>
            </label>   
            <?= $form->field($model, 'genders')->checkboxList(
                Helpers::dropdownGender(),
                ['separator' => '<span class="m-2"></span>']
                )->label(Yii::t('app', 'gender')); 
            ?>     

        </div>
  
        <div class="col-lg-3">     
            <label>
                <?= Yii::t('app', 'schedule_hour') ?>
            </label>      
            <?= $form->field($model, 'schedule_hour')->dropdownList(
                Helpers::dropdownSheddulleHours(),
                ['class' => 'form-control', 'prompt'=> Yii::t('app', 'select_time')]
                )->label(Yii::t('app', 'schedule_hour')); 
            ?>           
        </div> 
        <div class="col-lg-3">  
            <div class="row">  
                    <label>
                        <?= Yii::t('app', 'day_or_hours') ?>
                    </label>  
                    <div class="col-lg-6">  
                         
                        <?= $form->field($model, 'reminder_number')->textInput(['maxlength' => true])->label(false); ?>
                    </div>
                    <div class="col-lg-6">                              
                        <?= $form->field($model, 'reminder_hours_days')->dropdownList(
                            Helpers::dropdownDaysHours(),
                            [
                                'class' => 'form-control', 
                                'prompt'=> Yii::t('app', 'select_hour_days')
                            ]
                            )->label(false); 
                        ?>  
                </div> 
            </div>
        </div>
        <div class="col-lg-3">     
            <label>
                <?= Yii::t('app', 'active') ?>
            </label>         
            <?= $form->field($model, 'active')->dropdownList(
                Helpers::dropdownActive(),                
                )->label(Yii::t('app', 'active')); 
            ?>
        </div> 
    </div>   

    <div class="row mb-4">   
        <div class="col-lg-6"> 
            <div class="my-3">  
                <label>
                    <?= Yii::t('app', 'subject_pt') ?>
                </label>      
                <?= $form->field($model, 'title_pt')->textInput(['maxlength' => true])->label(Yii::t('app', 'subject_pt')); ?>
            </div>
            <div> 
                <label>
                    <?= Yii::t('app', 'text_pt') ?>
                </label>  
                <?= $form->field($model, 'text_pt')->textarea(['rows' => 6])->label(Yii::t('app', 'text_pt')); ?>
            </div> 
        </div>
        <div class="col-lg-6"> 
            <div class="my-3">   
                <label>
                    <?= Yii::t('app', 'subject_en') ?>
                </label>       
                <?= $form->field($model, 'title_en')->textInput(['maxlength' => true])->label(Yii::t('app', 'subject_en')); ?>
            </div>
            <div> 
                <label>
                    <?= Yii::t('app', 'text_en') ?>
                </label>  
                <?= $form->field($model, 'text_en')->textarea(['rows' => 6])->label(Yii::t('app', 'text_en')); ?>
            </div> 
        </div>
    </div>

    <div class="form-group pt-3">
        <?=  Helpers::displaySaveButtonsView($model); ?> 
    </div>

    <?php ActiveForm::end(); ?>

</div>
