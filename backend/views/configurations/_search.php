<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\Models\ConfigurationsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="configurations-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">  
        <div class="col-3">
            <?= $form->field($model, 'field')->dropdownList(
                [
                    'maintenance' => 'Maintenance',
                    'login' => 'Login',
                    'register' => 'Register'
                ]); 
            ?>
        </div>  
        <div class="col-3">
            <?= $form->field($model, 'active')->dropdownList(
                [
                    1 => 'Yes', 
                    0 => 'No'
                ]); 
            ?>
        </div>
    </div>

    <div class="form-group py-3">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <a class= "btn btn-outline-secondary" href="<?= Url::toRoute('configurations/index'); ?>">Reset</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
