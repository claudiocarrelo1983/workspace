<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\db\Query;


/* @var $this yii\web\View */
/* @var $model app\Models\TranslationsSearch */
/* @var $form yii\widgets\ActiveForm */

$tagQuery = new Query;

$countryUsers = array(
    '' => 'Country'
);

$countries = $tagQuery->select([
    'country_code',
    'full_title' 
    ])
->from('countries')    
->all();

foreach($countries as $value){
    $countryUsers[$value['country_code']] = $value['full_title'];
}

?>

<div class="translations-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-2">
            <?= $form->field($model, 'id') ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'country_code')->dropDownList(
                $countryUsers
                ,                     
                array('required','separator' => "</br>" ))->label('Select Country');
            ?>  
        </div>
        <div class="col-2">
            <?= $form->field($model, 'page') ?>
        </div>  
        <div class="col-2">
            <?= $form->field($model, 'page_code') ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'text') ?>
        </div>    
    </div>

    <?php // echo $form->field($model, 'active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <a class= "btn btn-outline-secondary" href="<?= Url::toRoute('translations/index'); ?>">Reset</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
