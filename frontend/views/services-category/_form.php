<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\Helpers\Helpers;

$activeLanguagesArr = Helpers::activeLanguages();

/** @var yii\web\View $this */
/** @var app\models\ServicesCategory $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="services-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col">        
            <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label(Yii::t('app', 'description'));  ?>
        </div>
        <?php foreach($activeLanguagesArr as $language => $value): ?>
            <?php if($value == 1){ ?>
                <div class="col"> 
                    <?= $form->field($model, 'title_'.$language)->textInput(['maxlength' => true])->label(Yii::t('app', 'title_'.$language)); ?>
                </div>
            <?php } ?>  
        <?php endforeach; ?>  
    </div>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'order')->textInput(['maxlength' => true])->label(Yii::t('app', 'order'));  ?>
        </div>
        <div class="col">            
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
