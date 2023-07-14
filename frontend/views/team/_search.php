<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\db\Query;

/** @var yii\web\View $this */
/** @var app\Models\TeamSearch $model */
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


?>

<div class="team-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row pb-5">
        <div class="col">
            <?= $form->field($model, 'username') ?>
        </div>
        <div class="col">  
            <?= $form->field($model, 'location')->dropdownList($arrCompany,
                    ['prompt'=>'Select Location']); ?> 
        </div>
        <div class="col">
            <?php  echo $form->field($model, 'title') ?>
        </div>
        <div class="col">
            <?php  echo $form->field($model, 'contact_number') ?>
        </div>
    </div>


    <?php //$form->field($model, 'page_code_title') ?>

    <?php //$form->field($model, 'page_code_text') ?>    

    <?php // echo $form->field($model, 'path') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'title_pt') ?>

    <?php // echo $form->field($model, 'text_pt') ?>

    <?php // echo $form->field($model, 'title_en') ?>

    <?php // echo $form->field($model, 'text_en') ?>

    <?php // echo $form->field($model, 'website') ?>

    <?php // echo $form->field($model, 'facebook') ?>

    <?php // echo $form->field($model, 'pinterest') ?>

    <?php // echo $form->field($model, 'instagram') ?>

    <?php // echo $form->field($model, 'twitter') ?>

    <?php // echo $form->field($model, 'tiktok') ?>

    <?php // echo $form->field($model, 'linkedin') ?>

    <?php // echo $form->field($model, 'youtube') ?>

    <?php  //echo $form->field($model, 'contact_number') ?>

    <?php // echo $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group pb-4">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <a class= "btn btn-outline-secondary" href="<?= Url::toRoute('team/index'); ?>">Reset</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
