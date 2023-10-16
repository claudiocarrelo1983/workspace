<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\Company $model */
/** @var yii\widgets\ActiveForm $form */


?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">     
        <div class="col-lg-3">
            <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'email_1')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'email_2')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'contact_number_1')->textInput(['rows' => 6]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'contact_number_2')->textInput(['rows' => 6]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'contact_number_3')->textInput(['rows' => 6]) ?>
        </div>   
        <div class="col-lg-3">
            <?= $form->field($model, 'nif')->textInput(['rows' => 6]) ?>
        </div>         
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'address_line_1')->textInput(['rows' => 6]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'address_line_2')->textInput(['rows' => 6]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'city')->textInput(['rows' => 6]) ?>
        </div>   
        <div class="col-lg-3">
            <?= $form->field($model, 'postcode')->textInput(['rows' => 6]) ?>
        </div>   
        <div class="col-lg-3">
            <?= $form->field($model, 'location')->textInput(['rows' => 6]) ?>
        </div>   
        <div class="col-lg-3">
            <?= $form->field($model, 'country')->dropdownList(  
                Helpers::countriesDropdownArr(),
                ['prompt'=>'Select Country']); ?> 
        </div>  
                  
    </div>



    <div class="row pt-5">
        <h5>Social</h5>
        <div class="col-lg-3">
            <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'pinterest')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'instagram')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'twitter')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'tiktok')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'linkedin')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'youtube')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
