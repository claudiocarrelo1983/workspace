<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\Query;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\Team $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="team-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">    
        <div class="col">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label(Yii::t('app', 'username')) ?>
        </div>
        <div class="col">           
            <?= $form->field($model, 'title')->dropdownList(
                Helpers::dropdownTitle(),
                ['prompt'=> Yii::t('app', 'select_title')])->label(Yii::t('app', 'title')); 
            ?> 
        </div>        
        <div class="col">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true])->label(Yii::t('app', 'first_name')) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true])->label(Yii::t('app', 'last_name')) ?>
        </div>  
        <div class="col">
            <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true])->label(Yii::t('app', 'contact_number')) ?>
        </div> 
        <div class="col">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label(Yii::t('app', 'email')) ?>
        </div>  
    </div>
    <div class="row">  
        <div class="col-lg-2">           
            <?= $form->field($model, 'gender')->dropdownList(
                Helpers::dropdownGender(),
                ['prompt'=> Yii::t('app', 'select_gender')],
                )->label(Yii::t('app', 'gender')); 
            ?> 
        </div>  
        <div class="col-lg-2">           
            <?= $form->field($model, 'level')->dropdownList(
                Helpers::dropdownLevel(),
                ['prompt'=> Yii::t('app', 'select_level')],
              )->label(Yii::t('app', 'level')); 
            ?> 
        </div>
        <div class="col-lg-2">            
            <?= $form->field($model, 'active')->dropdownList(
                Helpers::dropdownActive(),                
                )->label(Yii::t('app', 'active')); 
            ?>
        </div>  
    </div>
    <div class="form-group pt-3">
        <?=  Helpers::displaySaveButtonsView($model); ?> 
    </div>

    <?php ActiveForm::end(); ?>

</div>
