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
        <h4 class="mb-sm-0 font-size-18 pb-4 pt-5">           
            <?= Yii::t('app', ' Dados do Colaborador') ?>
        </h4>  
        <div class="col">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">           
            <?= $form->field($model, 'title')->dropdownList(
                Helpers::dropdownTitle(),
                ['prompt'=>'Select Title']); 
            ?> 
        </div>        
        <div class="col">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
        </div>  
        <div class="col">
            <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true]) ?>
        </div> 
        <div class="col">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>  
    </div>
    <div class="row">  
        <div class="col-lg-2">           
            <?= $form->field($model, 'gender')->dropdownList(
                Helpers::dropdownGender(),
                ['prompt'=>'Select Gender']); 
            ?> 
        </div>  
        <div class="col-lg-2">           
            <?= $form->field($model, 'level')->dropdownList(
                Helpers::dropdownLevel(),
                ['prompt'=>'Select Level']); 
            ?> 
        </div>
        <div class="col-lg-2">            
            <?= $form->field($model, 'active')->dropdownList(
                Helpers::dropdownActive()
                ); 
            ?>
        </div>  
    </div>
    <div class="form-group pt-3">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
