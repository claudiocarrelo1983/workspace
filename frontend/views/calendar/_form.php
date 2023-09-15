<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/** @var yii\web\View $this */
/** @var app\models\Events $model */
/** @var yii\widgets\ActiveForm $form */

?>


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelEvents, 'id')->hiddenInput(['maxlength' => true])->label(false); ?>
                             
    <?= $form->field($modelEvents, 'event_code')->textInput(['maxlength' => true])->label(false); ?>

    <?= $form->field($modelEvents, 'page_code')->textInput(['maxlength' => true])->label(false); ?>

    <?= $form->field($modelEvents, 'title')->textInput(['maxlength' => true])->label(false); ?>                         

    <?= $form->field($modelEvents, 'title_pt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelEvents, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelEvents, 'color_code')->dropDownList(
        [
        '' =>  Yii::t('app', 'choose_color'),
            'bg-danger' => 'Danger',
            'bg-warning' => 'Warning',
            'bg-success' => 'Success',
            'bg-info' => 'Info',
            'bg-primary' => 'Primary',                                       
            'bg-dark' => 'Dark',

        ]                                                      
        )->label('Color')
    ?>

    <div class="form-group field-events-start required">
        <label class="control-label">Start</label>
            <?= DateTimePicker::widget([       
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd HH:mm:ss',
                    'todayHighlight' => true,
                ],                          
                'name' => 'start',
                'class' => 'form-control p-5',
                'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
                'value' => $modelEvents->start,
            
            ]) ?>
    </div>      
    
<div class="form-group field-events-color_code required">
        <label class="control-label">End</label>
        <?= DateTimePicker::widget([     
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd HH:mm:ss',
                'todayHighlight' => true,
            ],                                   
            'name' => 'end',
            'class' => 'form-control p-5',
            'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
            'value' => $modelEvents->end,
        
        ]) ?>
    </div>

    <?= $form->field($modelEvents, 'frequency')->dropDownList(
        [                
                                
            'one-time' => Yii::t('app', 'One Time'),
            'every-day' => Yii::t('app', 'Every Day'),    
            'every-week' => Yii::t('app', 'Every Week'),                              
        ]                                                      
        )->label('Frequency')
    ?>

    <?= $form->field($modelEvents, 'allDay')->textInput(['maxlength' => true]) ?>
                                
    <?= $form->field($modelEvents, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelEvents, 'className')->textInput(['maxlength' => true]) ?>


    <div class="row mt-5">
        <div class="col-6">
            <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
        </div>
        <div class="col-6 text-end">
            <button type="button" class="btn btn-primary me-1" data-bs-dismiss="modal">Close</button>
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>                                      
        </div>
    </div>
    </div>
    <?php ActiveForm::end(); ?>
