<?php

use common\models\Email;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;


/** @var yii\web\View $this */
/** @var app\models\EmailSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Emails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-index">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18 pb-4 pt-4">
                    <?= Html::encode(Yii::t('app', 'menu_admin_maintenance_mode')) ?>
                </h4>  
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">
                                <?= Yii::t('app', 'menu_admin_settings') ?> 
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                        <?= Yii::t('app', 'menu_admin_maintenance_mode') ?> 
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>  

        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col">  
                <div class="mb-4">   
                    <h4 class="mb-sm-0 font-size-15  py-3">
                        <?= Html::encode(Yii::t('app', 'menu_admin_campaign_manteinance_title')) ?>
                    </h4> 
                    <div class="pb-4">
                        <?= Html::encode(Yii::t('app', 'menu_admin_campaign_manteinance_text')) ?>
                    </div>               
                </div>      
                <div class="d-flex flex-wrap gap-3">
                <div class="btn-group" role="group" >     
                    <?php $checked = $model->publish ?>
                    <?= $form
                        ->field($model, 'publish')
                        ->radioList(
                            [true => 'Yes', false => 'No'],
                            ['type' => 'radio','item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                if ($label === 'Yes') {
                                    $id = 'btnradio4';
                                    $label = '<label class="btn btn-outline-primary" for="btnradio4">On</label> ';
                                
                                } else {
                                    $id = 'btnradio5';
                                    $label = '<label class="btn btn-outline-primary" for="btnradio5">Off</label> ';
                                
                                }
                                return Html::radio(
                                    $name,
                                    $checked,
                                    [
                                        'class' => 'btn-check',
                                        'value' => $value,
                                        'label' => $label,
                                        'id' => $id,
                                        
                                        'autocomplete' => 'off'
                                    ]
                                );
                            }]
                        )
                        ->label(false); 
                    ?>
                </div>
            </div>  
        </div>
    </div> 

    <div class="form-group pt-3">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>