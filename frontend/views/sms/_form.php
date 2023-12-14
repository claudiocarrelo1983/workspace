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

        ]]); 
    ?>
  

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

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
