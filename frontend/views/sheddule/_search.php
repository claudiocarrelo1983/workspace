<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\ShedduleSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sheddule-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row pb-4 pt-3">
        <div class="col">
            <?= $form->field($model, 'team_username')->dropDownList(
                    Helpers::dropdownTeam(),
                    ['prompt'=>'Select Team']            
                ); 
            ?> 
        </div>
        <div class="col">
            <?= $form->field($model, 'service_code')->dropDownList(
                    Helpers::dropdownServices(),
                    ['prompt'=>'Select Service']            
                ); 
            ?> 
        </div>
        <div class="col">            
            <?= $form->field($model, 'contact_number') ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'nif') ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'email') ?>
        </div>
    </div>


    <?php // echo $form->field($model, 'service_name') ?>

    <?php // echo $form->field($model, 'available') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'contact_number') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'nif') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group pb-4">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
