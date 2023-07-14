<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\CompanyLocations $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="company-locations-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'title_pt')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'description_pt')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'description_en')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'cae')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'sheddule_array')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'address_line_1')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'address_line_2')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">            
            <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

        </div>
    </div>
    <div class="row">
        <div class="col">
        <?= $form->field($model, 'postcode')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col">
        <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col">
            <?= $form->field($model, 'country')->dropdownList(
                Helpers::countriesDropdownArr(),
                ['prompt'=>'Select Country']); 
            ?> 
        </div>
        <div class="col">
        <?= $form->field($model, 'google_location')->textarea(['rows' => 6]) ?>

        </div>
        <div class="col">
            <?= $form->field($model, 'active')->dropdownList(
                [
                1 => Yii::t('app', 'yes'),
                    0 => Yii::t('app', 'no'),
                ]); 
            ?>
        </div>
    </div>

        


 

  
  


   

  
 

  

 
    
   


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
