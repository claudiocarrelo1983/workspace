<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\Helpers\Helpers;
use kartik\date\DatePicker;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\Sheddule $model */
/** @var yii\widgets\ActiveForm $form */


?>


<div class="sheddule-form">   

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">     
        <div class="col-lg-6">               
            <?=
                $form->field($model, 'team_username')->dropDownList(
                    Helpers::dropdownTeam(),
                    [
                        //'id' => 'select-username-'.$model->team_username,
                        //'data-username' => $model->team_username,
                        'class' => 'form-control text-3 h-auto ',
                        'prompt'=> Yii::t('app', 'select_team'),                                                                 
                        'onChange' => 'getServicesByUserAjax(this)'                                                               
                        
                    ]            
                )->label(Yii::t('app','team_username'))
            ?>                                                                  
        </div>       
        <div class="col-lg-6">      
            <?= $form->field($model, 'service_code')->dropDownList(
                    Helpers::dropdownServices(['username'  => $model->team_username]),
                    [
                        'id' => 'select-service',
                        'class' => 'form-control text-3 h-auto ',
                        'prompt'=> Yii::t('app', 'select_services')
                    ]            
                )->label(Yii::t('app','service'))
            ?>                                                                 
        </div> 
        <div class="col-lg-6  pt-4">
            <label for="clients-gender">
                <?= Yii::t('app', "date") ?>                   
            </label>
            <?= DatePicker::widget([
                'model' => $model,                                                                                                      
                'name' => 'dob',    
                'id' => 'date-calendar-search', 
                'removeButton' => false,
              
                'value' => $model->date,
                'options' => [
                    'placeholder' => 'Select date...',
                    'class' => ' form-control text-4 h-auto ',
                    'onChange' => 'getScheduleByDateAjax()'
                ],
                'pluginOptions' => [  
                    'autoclose' => true,           
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]                   
            ]) ?>
        </div>  
        <div class="col-lg-6  pt-4">
            <?= $form->field($model, 'time')->dropDownList(
                Helpers::dropdownUserTimeWindowAvailable($model->date, $model->team_username),
                [
                    'id' => 'select-hour',
                    'class' => 'form-control text-3 h-auto ',
                    'prompt'=> Yii::t('app', 'select_time')
                ]            
                )->label(Yii::t('app','time'))
            ?>                                                                 
        </div>    
        <div class="col-lg-12  py-5">  
            <?= Html::submitButton(Yii::t('app', 'save_button'), ['class' => 'btn text-3 btn-primary']) ?>      
            <?= Html::a(
                Yii::t('app', 'back_button'),                                           
                Url::toRoute(
                    [
                        '/client-appointments/index',
                        'code' => Yii::$app->request->get('code')
                    ]
                ),

                [                                                      
                    'class' => 'btn text-3 btn-light'
                ]
            ) ?> 
                                            
        </div>  
    </div>  
  
    <?php ActiveForm::end(); ?>
</div>
