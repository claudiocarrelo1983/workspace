<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\Team $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="team-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row pt-4">      
        <div class="col">           
            <?= $form->field($model, 'username_code')->dropdownList(
                Helpers::dropdownTeam(),
                ['prompt'=>'Select Team']); 
            ?> 
        </div>  
        <div class="col">
            <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true]) ?>
        </div>       
    </div>
    <div class="form-group pt-3">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
