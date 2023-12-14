<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\MessagesTemplate $model */
/** @var yii\widgets\ActiveForm $form */

$placeholders = ['username','email','dob','title','first_name','last_name','contact_number'];

?>

<div class="messages-template-form">
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="mb-sm-0 font-size-15  py-3">
                <?= Html::encode(Yii::t('app', 'menu_admin_campaign_placeholder_title')) ?>
            </h4> 
            <div class="pb-4">
                <?= Html::encode(Yii::t('app', 'menu_admin_campaign_placeholder_text')) ?>
            </div>
            <div class="row "> 
                 <?php foreach($placeholders as $value) { ?>
                    <div class="col-lg-4">
                        <div class="mb-2">
                            <strong>
                                <?= Yii::t('app', '#'.$value.'#') ?>
                            </strong> 
                            - <?= Yii::t('app', 'placeholder_'.$value) ?>
                        </div>
                    </div>                        
                <?php } ?>
            </div>  
        </div>
    </div>  

    <?php $form = ActiveForm::begin(); ?>

    <div class="row mb-4">   
        <div class="col-lg-12"> 
            <div class="my-3">             
                <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label(Yii::t('app', 'description')); ?>
            </div>
        </div>
        <div class="col-lg-6"> 
            <div class="my-3">             
                <?= $form->field($model, 'title_pt')->textInput(['maxlength' => true])->label(Yii::t('app', 'subject_pt')); ?>
            </div>
            <div>              
                <?= $form->field($model, 'text_pt')->textarea(['rows' => 6])->label(Yii::t('app', 'text_pt')); ?>
            </div> 
        </div>
        <div class="col-lg-6"> 
            <div class="my-3">                    
                <?= $form->field($model, 'title_en')->textInput(['maxlength' => true])->label(Yii::t('app', 'subject_en')); ?>
            </div>
            <div>             
                <?= $form->field($model, 'text_en')->textarea(['rows' => 6])->label(Yii::t('app', 'text_en')); ?>
            </div> 
        </div>
    </div>
 
    <div class="form-group pt-3">
         <?=  Helpers::displaySaveButtonsView($model); ?>   
    </div>

    <?php ActiveForm::end(); ?>

</div>
