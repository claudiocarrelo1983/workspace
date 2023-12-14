<?php

use yii\helpers\Html;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\Email $model */

$this->title = 'Create Email';
$this->params['breadcrumbs'][] = ['label' => 'Emails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$placeholders = ['username','email','dob','title','first_name','last_name','contact_number'];

?>
<div class="email-create">
    <?= Helpers::displayAminBreadcrumbs('message', 'sms', 'create') ?>
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
