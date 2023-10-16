<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\Models\ClientsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="clients-search my-4">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row pb-3">  
        <div class="col">
            <?php  echo $form->field($model, 'subject')->label(Yii::t('app', 'subject'))  ?>
        </div>  
        <div class="col">
            <?php  echo $form->field($model, 'text_pt')->label(Yii::t('app', 'subject_pt')) ?>
        </div>  
        <div class="col">
            <?php  echo $form->field($model, 'text_en')->label(Yii::t('app', 'subject_en')) ?>
        </div>        
        <div class="col">            
            <?= $form->field($model, 'active')->dropdownList(
                Helpers::dropdownActive(),                
                )->label(Yii::t('app', 'active')); 
            ?>
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
