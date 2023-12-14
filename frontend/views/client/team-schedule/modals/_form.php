


<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\Query;
use yii\helpers\Url;
use common\Helpers\Helpers;
use kartik\date\DatePicker;




?>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->hiddenInput(['value'=> date('Y-m-d',$date)])->label(false) ?> 
    <?= $form->field($model, 'time')->hiddenInput(['value'=> date('H:i',$dayHour)])->label(false) ?>
    <?= $form->field($model, 'datetime')->hiddenInput(['value'=> strtotime(date('Y-m-d',$date).' '.date('H:i',$dayHour))])->label(false) ?>
    <div class="modal-body">
        <div class="row mb-3">                                               
            <div class="form-group col-lg-4  text-left">                                               
                <?= $form->field($model, 'full_name')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true])->label(Yii::t('app','full_name')) ?>                                                 
            </div>
            <div class="form-group col-lg-4  text-left">
                <?= $form->field($model, 'contact_number')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true])->label(Yii::t('app','contact_number')) ?>
            </div>
            <div class="form-group col-lg-4  text-left">
                <?= $form->field($model, 'email')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true])->label(Yii::t('app','email')) ?>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-4  text-left">
                <?= $form->field($model, 'nif')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true])->label(Yii::t('app','nif')) ?> 
            </div>
            <div class="form-group col-lg-8  text-left">
                <?= $form->field($model, 'service_code')->dropdownList(
                    Helpers::dropdownServices(),
                    ['class' => 'form-select form-control h-auto py-2','prompt'=>'Select Service'])->label(Yii::t('app','service_code')) ?>
            </div>
        </div>  
        <div class="row">
            <div class="form-group col-lg-4 text-left">
                <?= $form->field($model, 'team_username')->dropdownList(
                    Helpers::dropdownTeam(),
                    ['class' => 'form-select form-control h-auto py-2','prompt'=> Yii::t('app','select_time')]) 
                ?>
            </div>
            <div class="form-group col-lg-8  text-left">
                <label class="control-label" for="sheddule-service_cat">
                    <?= Yii::t('app','date') ?>
                </label>
                <?= DatePicker::widget([
                        'model' => $model,   
                        'value' => date('d-m-Y', $date),                                                              
                        'name' => 'date',                                                            
                        'options' => [
                            'placeholder' => 'Select date...',
                            'class' => 'form-control text-4 h-auto py-1',
                            'label' =>'Date'
                        ],
                        'pluginOptions' => [  
                            //'autoclose' => true,           
                            'format' => 'dd-mm-yyyy',
                            'todayHighlight' => true
                        ]
                    ]) 
                ?>
            </div>
        </div>
        <div class="row">
            <?= Yii::$app->session->getFlash('msg') ?>
        </div>
        <div class="row">
            <div class="form-group col-lg-4  text-left">
                <?= $form->field($model, 'price_advanced')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true])->label(Yii::t('app','price_advanced')) ?> 
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <?=                             
            Html::button(
                Yii::t('app','back_button'),                                                                
                    [         
                        'class' => 'btn btn-primary rounded-0 mb-2 mt-2' ,
                        'data-bs-toggle' => 'modal',    
                        'data-bs-target' =>  '#client-info-'.$inc                             
                    ]
                ).' 
                    '.Html::submitButton('Save', 
                        ['class' => 'btn btn-success rounded-0 mb-2 mt-2']
                ) 
        ?>                         
    </div>
<?php  ActiveForm::end();  ?>