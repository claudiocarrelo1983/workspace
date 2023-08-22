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
                ['prompt'=>'Select Category']            
            ); 
        ?>  
    </div>
    <div class="col-lg-3">  
        <?= $form->field($model, 'client_username')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-3"> 
        <?= $form->field($model, 'client_username')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-3"> 
        <?= $form->field($model, 'service_code')->radioList(
              Helpers::dropdownTeam(),
              ['maxlength' => true]) 
        ?>
    </div>
    <div class="col-lg-3"> 
        <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-3"> 
        <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-3"> 
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-3"> 
        <?= $form->field($model, 'nif')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-3"> 
        <?= $form->field($model, 'date')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-3"> 
        <?= $form->field($model, 'time')->textInput(['maxlength' => true]) ?>
    </div>
</div>




    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
