<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\Models\ClientsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="clients-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row pb-3">  
        <div class="col">
            <?php  echo $form->field($model, 'ticket_number')->label(Yii::t('app', 'ticket_number'))  ?>
        </div>  
        <div class="col">
            <?php  echo $form->field($model, 'full_name')->label(Yii::t('app', 'full_name')) ?>
        </div>  
        <div class="col">
            <?php  echo $form->field($model, 'contact_number')->label(Yii::t('app', 'contact_number')) ?>
        </div>   
        <div class="col">
            <?php  echo $form->field($model, 'email')->label(Yii::t('app', 'email')) ?>
        </div>     
        <div class="col">  
            <?= $form->field($model, 'closed_ticket')->dropdownList(
                Helpers::dropdownTicketStatus(),
                ['prompt'=> Yii::t('app', 'select_ticket_status')]
                )->label(Yii::t('app', 'closed_ticket')); ?> 
        </div>
    </div>
    <div class="form-group pb-3">
        <?= Html::submitButton(Yii::t('app', 'search_button'), ['class' => 'btn btn-primary']) ?>
        <a class= "btn btn-outline-secondary" href="<?= Url::toRoute('notifications-list/index'); ?>">
            <?= Yii::t('app', 'reset_button') ?>
        </a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
