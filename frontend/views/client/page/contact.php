<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\Helpers\Helpers;

?>
<section class="section section-height-1 bg-light position-relative border-0 m-0" id="contactus">
        <div class="container"> 
        <div class="row">
            <div class="col">     
                <div class="heading text-primary heading-border">       
                    <h1 class="font-weight-normal">
                        <?=  Yii::t('app', 'menu_contacts') ?>
                    </h1>        
                </div>          
                <?php $form = ActiveForm::begin(); ?>            
                    <?= $form->field($model, 'type')->hiddenInput(['value' => 'client_message'])->label(false) ?>       
                    <div class="row">
                        <div class="form-group col-lg-6">                     
                            <?= $form->field($model, 'full_name')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true])->label(Yii::t('app', 'full_name')) ?>
                        </div>
                        <div class="form-group col-lg-3">
                            <?= $form->field($model, 'email')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true])->label(Yii::t('app', 'email')) ?>
                        </div>
                        <div class="form-group col-lg-3">
                            <?= $form->field($model, 'contact_number')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true])->label(Yii::t('app', 'contact_number')) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">        
                            <?= $form->field($model, 'subject')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true])->label(Yii::t('app', 'subject')) ?>            
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col pt-4">                     
                            <?= $form->field($model, 'text')->textarea(['rows' => '5', 'class' => 'form-control text-3 h-auto py-2','maxlength' => true])->label(Yii::t('app', 'text')) ?></div>
                    </div>
                    <div class="row">                 
                        <div class="form-group pt-3">
                            <?= Html::submitButton(Yii::t('app', 'save_button'), ['class' => 'btn btn-primary btn-modern']) ?>
                        </div>
                    </div>         
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>