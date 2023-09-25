<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Email $model */

$this->title = 'Create Email';
$this->params['breadcrumbs'][] = ['label' => 'Emails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$placeholders = ['username','email','dob','title','first_name','last_name','contact_number'];

?>
<div class="email-create">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18 pb-4 pt-4">
                    <?= Html::encode(Yii::t('app', 'menu_admin_campaign_email_create')) ?>
                </h4>  
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">
                                <?= Yii::t('app', 'menu_admin_campaign') ?> 
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                        <?= Yii::t('app', 'menu_admin_campaign_email_create') ?> 
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="mb-sm-0 font-size-15  py-3">
                <?= Html::encode(Yii::t('app', 'menu_admin_campaign_placeholder_title')) ?>
            </h4> 
            <div class="pb-4">
                <?= Html::encode(Yii::t('app', 'menu_admin_campaign_placeholder_text')) ?>
            </div>
            <div class="row "> 
                 <?php foreach($placeholders as $value) { ?>
                    <div class="col-lg-4">
                        <div class="mb-2">
                            <strong>
                                <?= Yii::t('app', '#'.$value.'#') ?>
                            </strong> 
                            - <?= Yii::t('app', 'placeholder_'.$value) ?>
                        </div>
                    </div>                        
                <?php } ?>
            </div>  
        </div>
    </div>  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
