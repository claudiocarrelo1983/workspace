<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;



/* @var $this yii\web\View */
/* @var $model app\models\PricingSpecsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pricing-specs-search">

 
    <?php $form = ActiveForm::begin([]); ?>

        <div class="row">    
            <div class="col-3">
                <?= $form->field($model, 'page_code')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-3">       
                <?= $form->field($model, 'type')->dropDownList(
                    [
                        'basic' => 'Basic',
                        'standard' => 'Standard',
                        'professional' => 'Professional',
                        'enterprise' => 'Enterprise'
                    ],                     
                    array( 'separator' => "</br>" ))->label('Select Type');
                ?>             
            </div>  
            <div class="col-3">
                <?= $form->field($model, 'page_code')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-3">
                <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="form-group py-3">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
