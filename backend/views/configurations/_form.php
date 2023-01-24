<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Configurations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="configurations-form">

    <?php $form = ActiveForm::begin(); ?>

    <div clasS="row my-5">
        <div class="col-3">
            <?= $form->field($model, 'field')->dropdownList(
                [
                    'maintenance' => 'Maintenance',
                    'login' => 'Login',
                    'register' => 'Register'
                ]); 
            ?>
        </div>
    </div>
    <div clasS="row my-5">
        <div class="col-3">
            <?= $form->field($model, 'active')->dropdownList(
            [
                1 => 'Yes', 
                0 => 'No'
            ]); 
            ?>
        </div>
    </div>
    <div clasS="row my-5">
        <div class="col-3">
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
