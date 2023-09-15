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
                <?= $form->field($model, 'client_username')->textInput(['maxlength' => true])->label(Yii::t('app', 'client_username')) ?>
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
                <?= $form->field($model, 'date')->textInput(['maxlength' => true])->label(Yii::t('app', 'date')) ?>
            </div>
            <div class="col-lg-3"> 
                <?= $form->field($model, 'time')->textInput(['maxlength' => true])->label(Yii::t('app', 'time')) ?>
            </div>
        </div>
        <div class="form-group pt-3">
            <?= Html::submitButton(Yii::t('app', 'submit_button'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
