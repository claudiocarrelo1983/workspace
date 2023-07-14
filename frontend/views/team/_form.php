<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\Query;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\Team $model */
/** @var yii\widgets\ActiveForm $form */


$query = new Query;
$companyLocationsArr = $query->select([
    'location_code', 
    'full_name',
    'location',

    ])
->from('company_locations')    
->where(['company_code' => Yii::$app->user->identity->company_code])
->all();

$arrCompany = array();

foreach($companyLocationsArr as $value){
    $arrCompany[$value['location_code']] = $value['full_name'].' ('.$value['location'].')';
}


//'teamuser_'.Helpers::generateRandowHumber()

?>

<div class="team-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
        <h4 class="mb-sm-0 font-size-18 pb-4 pt-5">           
            <?= Yii::t('app', ' Dados do Colaborador') ?>
        </h4>  
        <div class="col">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'value' => 'teamuser_'.Helpers::generateRandowHumber()]) ?>
        </div>
        <div class="col">           
            <?= $form->field($model, 'title')->dropdownList(
                Helpers::titleDropdownArr(),
                ['prompt'=>'Select Location']); 
            ?> 
        </div>
        
        <div class="col">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
        </div>  
        <div class="col">
            <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true]) ?>
        </div> 
        <div class="col">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>  
    </div>
    <div class="row">
   
        <div class="col">          
            <?= $form->field($model, 'location')->dropdownList($arrCompany,
                ['prompt'=>'Select Location']); 
            ?> 
        </div>  
        <div class="col">
            <?= $form->field($model, 'job_title')->textInput(['maxlength' => true]) ?>
        </div>   
    </div>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'text')->textarea(['maxlength' => true]) ?>
        </div>    
    </div>


    <div class="row">
    <h4 class="mb-sm-0 font-size-18 pb-4  pt-5" >
            <?= Yii::t('app', 'Redes Sociais') ?>
        </h4>  
        <div class="col">
            <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'pinterest')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'instagram')->textInput(['maxlength' => true]) ?>
        </div>
         
    </div>




    <div class="row">
        <div class="col">
            <?= $form->field($model, 'twitter')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'tiktok')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'linkedin')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'youtube')->textInput(['maxlength' => true]) ?>
        </div>       
    </div>

   

    <?php //$form->field($model, 'title_pt')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'text_pt')->textarea(['rows' => 6]) ?>

    <?php //$form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'text_en')->textarea(['rows' => 6]) ?>


    <?= $form->field($model, 'active')->dropdownList(
        [
        1 => Yii::t('app', 'yes'),
            0 => Yii::t('app', 'no'),
        ]); 
    ?>

    <div class="form-group pt-3">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
