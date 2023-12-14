<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\Query;
use common\Helpers\Helpers;

$activeLanguagesArr = Helpers::activeLanguages();


/* @var $this yii\web\View */
/* @var $model app\models\Subjects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subjects-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="row mb-4">
            <div class="col">
                <?= $form->field($model, 'subject')->textInput(['maxlength' => true])->label(Yii::t('app', 'subject')) ?>
            </div>
            <?php foreach($activeLanguagesArr as $language => $value): ?>
                <?php if($value == 1){ ?>
                    <div class="col"> 
                        <?= $form->field($model, 'text_'.$language)->textInput(['rows' => 6])->label(Yii::t('app', 'subject_'.$language)); ?>
                    </div>     
                <?php } ?>   
            <?php endforeach; ?>          
            <div class="col">
                <?= $form->field($model, 'order')->textInput(['maxlength' => true])->label(Yii::t('app', 'order')) ?>
            </div>  
        </div>  
        <div class="form-group pt-3">
            <?=  Helpers::displaySaveButtonsView($model); ?> 
        </div>
    <?php ActiveForm::end(); ?>
</div>
