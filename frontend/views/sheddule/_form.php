<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\Sheddule $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sheddule-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="row"> 
            <div class="col-lg-3">             
                <?= $form->field($model, 'team_username')->dropDownList(
                        Helpers::dropdownTeam(),
                        ['prompt'=> Yii::t('app', 'select_team')]            
                    )->label(Yii::t('app', 'team_username')); 
                ?>  
            </div>
            <div class="col-lg-3">  
                <?= $form->field($model, 'client_username')->textInput(['maxlength' => true])->label(Yii::t('app', 'client_usernames')) ?>
            </div>
            <div class="col-lg-3"> 
                <?= $form->field($model, 'service_code')->radioList(
                    Helpers::dropdownTeam(),
                    ['prompt'=> Yii::t('app', 'select_service')],   
                    ['maxlength' => true])->label(Yii::t('app', 'service_code'))
                ?>
            </div>
            <div class="col-lg-3"> 
                <?= $form->field($model, 'full_name')->textInput(['maxlength' => true])->label(Yii::t('app', 'full_name')) ?>
            </div>
            <div class="col-lg-3"> 
                <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true])->label(Yii::t('app', 'contact_number')) ?>
            </div>
            <div class="col-lg-3"> 
                <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label(Yii::t('app', 'email')) ?>
            </div>
            <div class="col-lg-3"> 
                <?= $form->field($model, 'nif')->textInput(['maxlength' => true])->label(Yii::t('app', 'nif')) ?>
            </div>
            <div class="col-lg-3"> 
                <label>
                    <?= Yii::t('app', 'date') ?>
                </label>
                <div class="input-group"  id="from_schedule_date">
                <div class="input-group-prepend">
                        <span class="input-group-text" id="validationTooltipUsernamePrepend">
                            <i class="fas fa-calendar-alt kv-dp-icon"></i>
                        </span>                  
                    </div>
                    <?= $form->field($model, 'date')->textInput(           
                        [
                            'inputOptions' => [ 'class' => 'newsletter-cta-mail' ],
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
            <div class="col-lg-3"> 
                <?= $form->field($model, 'time')->dropDownList(
                        Helpers::dropdownSheddulleHours(),
                        ['prompt'=> Yii::t('app', 'select_time')]            
                    )->label(Yii::t('app', 'time')); 
                ?>           
            </div>
        </div>
        <div class="form-group pt-3">
            <?= Html::submitButton(Yii::t('app', 'submit_button'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
