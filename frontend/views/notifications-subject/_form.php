<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\Query;

$tagQueryUser = new Query;

$countries = $tagQueryUser->select([
    'country_code',
    'full_title' 
    ])
->from('countries')    
->all();

$arrLanguages = ['en', 'pt', 'es', 'it', 'de', 'fr'];

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
            <div class="col">
                <?= $form->field($model, 'text_pt')->textInput(['maxlength' => true])->label(Yii::t('app', 'subject_pt')) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'text_en')->textInput(['maxlength' => true])->label(Yii::t('app', 'subject_en')) ?>
            </div>   
            <div class="col">
                <?= $form->field($model, 'order')->textInput(['maxlength' => true])->label(Yii::t('app', 'order')) ?>
            </div>  
        </div>  
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
