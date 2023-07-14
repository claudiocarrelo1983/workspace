<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\CompanyLocationsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="company-locations-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row pb-5">   
        <div class="col">
            <?= $form->field($model, 'location_code') ?>
        </div>
        <div class="col">            
            <?php  echo $form->field($model, 'full_name') ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'contact_number') ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'email') ?>
        </div>
    </div>    

    

    <?php // $form->field($model, 'page_code_title') ?>

    <?php  // $form->field($model, 'page_code_description') ?>

    <?php  //echo $form->field($model, 'full_name') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'abbreviation') ?>

    <?php // echo $form->field($model, 'cae') ?>

    <?php // echo $form->field($model, 'contact_number') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'sheddule_array') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'postcode') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'google_location') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group pb-4">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <a class= "btn btn-outline-secondary" href="<?= Url::toRoute('company-locations/index'); ?>">Reset</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
