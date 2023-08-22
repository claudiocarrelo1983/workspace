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
            <?= $form->field($model, 'username_code')->dropdownList(
                Helpers::dropdownTeam(),
                ['prompt'=>'Select Team']); 
            ?> 
        </div>   
        <div class="col">
            <?php  echo $form->field($model, 'contact_number') ?>
        </div>   
        <div class="col">
            <?php  echo $form->field($model, 'full_name') ?>
        </div>      
        <div class="col">
            <?php  echo $form->field($model, 'email') ?>
        </div>
    </div>
    <div class="form-group pb-3">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <a class= "btn btn-outline-secondary" href="<?= Url::toRoute('clients/index'); ?>">Reset</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
