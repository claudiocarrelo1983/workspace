<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\Helpers\Helpers;


?>

 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18 pb-4 pt-4">
                <?= Html::encode(Yii::t('app', 'menu_admin_settings_webpage')) ?>
            </h4>  
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript: void(0);">
                            <?= Yii::t('app', 'menu_admin_settings') ?> 
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        <?= Yii::t('app', 'menu_admin_settings_webpage') ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
    

<div class="my-3">
    <h5>   
        <?= Yii::t('app','your_registration_url') ?> :
        <?= Html::a(                            
            Url::base('https').Url::toRoute(['/page', 'code' => Yii::$app->user->identity->company_code_url]), 
            Url::toRoute(['/page', 'code' => Yii::$app->user->identity->company_code_url]),
            [           
            'target' => '_blank'
            ]                             
        ) ?>    
    </h5>
</div>

<?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-lg-4">
        <?= $form->field($model, 'company_code_url')->textInput(['maxlength' => true])->label(Yii::t('app', 'company_code_url')) ?>
    </div>
    <div class="col-lg-4">
        <?= $form->field($model, 'publish')->dropdownList(
            [
                1 => Yii::t('app', 'yes'),
                0 => Yii::t('app', 'no'),
            ]); 
        ?>
    </div>

    <div class="col-lg-4">
        <?= $form->field($model, 'color')->textInput(
            [
                'class' => 'form-control spectrum with-add-on',
                'id' => 'colorpicker-default',
                'value' => $model->color,
                'maxlength' => true
            ]
            )->label(Yii::t('app', 'color')) ?>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-4">   
        <?= $form->field($model, 'bannerimage')->fileInput(
            ['class' => 'form-control']
        )->hint(Yii::t('app', 'hint_banner'))->label(Yii::t('app','banner_image')) ?>
    </div>

    <div class="col-lg-4">
        <?= $form->field($model, 'logoimage')->fileInput(
            ['class' => 'form-control']
        )->hint(Yii::t('app', 'hint_image'))->label(Yii::t('app','logo_image')) ?>
    </div>

    <div class="form-group mt-3">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>