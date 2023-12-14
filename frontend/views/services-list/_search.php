<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\Helpers\Helpers;


/** @var yii\web\View $this */
/** @var app\models\ServicesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="services-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row pb-5">        
        <div class="col">  
            <?= $form->field($model, 'service_code')->dropdownList(
                Helpers::dropdownServices(),
                ['prompt'=> Yii::t('app', 'select_services')], 
                )->label(Yii::t('app', 'services')); ?> 
        </div>       
        <div class="col">  
            <?= $form->field($model, 'category_code')->dropdownList(
                Helpers::dropdownServiceCategory(),
                ['prompt'=> Yii::t('app', 'select_services_category')], 
                )->label(Yii::t('app', 'service_cat')); ?> 
        </div>
        <div class="col">  
            <?= $form->field($model, 'location_code')->dropdownList(
                Helpers::dropdownCompanyLocations(),
                ['prompt'=> Yii::t('app', 'select_company_code_location')], 
                )->label(Yii::t('app', 'company_code_location')); ?> 
        </div>
    </div>   
    <div class="form-group pb-4">
        <?= Html::submitButton(Yii::t('app', 'search_button'), ['class' => 'btn btn-primary']) ?>
        <a class= "btn btn-outline-secondary" href="<?= Url::toRoute('services-list/index'); ?>">
            <?= Yii::t('app', 'reset_button') ?>
        </a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
