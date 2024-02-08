<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\Helpers\Helpers;
use yii\helpers\Url;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\ShedduleSearch $model */
/** @var yii\widgets\ActiveForm $form */


?>

<div class="sheddule-search pb-5">

    <?php 
        $form = ActiveForm::begin([
            'action' => [
                'bubu/appointments/index',
                'code' => Yii::$app->request->get('code')           
            ],
            'method' => 'get',
    
        ]); 
    ?>
  
    <div class="row pb-4 pt-3">        
        <div class="col-lg-4">            
            <?= $form->field($model, 'team_username')->dropDownList(
                    Helpers::dropdownTeam(['company_code' => $model->company_code]),
                    [
                        'id' => 'select-username-'.$model->team_username,
                        'class' => 'form-control text-3 h-auto py-1',          
                        'data-company' => $model->company_code,      
                        //'prompt'=> Yii::t('app', 'select_team'),
                        'onChange' => 'getAppointmentUserServices(this)'  
                    ]            
                )->label(Yii::t('app','team_username')) ; ; 
            ?> 
        </div>
        <div class="col-lg-4">          
            <?= $form->field($model, 'service_code')->dropDownList(
                    Helpers::dropdownServices(['company_code' => $model->company_code]),
                    [
                        'id' => 'select-service',
                        'class' => 'form-control text-3 h-auto py-1',
                        //'prompt'=> Yii::t('app', 'select_services')
                    ]                 
                )->label(Yii::t('app','service_code')) ; 
            ?> 
        </div>      
        <div class="col-lg-4">    
            <label class="control-label" for="select-service">
                <?= Yii::t('app', 'schedule_date') ?>
            </label> 
            <?= DatePicker::widget([
                    'model' => $model,                                                                                                      
                    'name' => 'date',    
                    'id' => 'date-calendar-search', 
                    'removeButton' => false,
                    'value' => (empty($model->dob) ? '' : date('d-m-Y', strtotime($model->dob))),
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
    <div class="form-group pb-4">
        <?= Html::submitButton(Yii::t('app', 'search_button'), ['class' => 'btn btn-primary text-3 h-auto py-2']) ?>

      
        <?= Html::a(
            Yii::t('app', 'reset_button'),                                           
            Url::toRoute(
                [
                    '/appointments',
                    'code' => Yii::$app->request->get('code')
                ]
            ),

            [                                                       
                'data-hash' => '',
                'data-hash-offset' => 0,
                'data-hash-offset-lg' => 130,
                'class' => 'btn btn-outline-secondary'
            ]
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

