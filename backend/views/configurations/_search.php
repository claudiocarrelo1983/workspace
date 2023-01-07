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
            <?= $form->field($model, 'field') ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'type') ?>
        </div>
        <div class="col-3">
             <?= $form->field($model, 'value') ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'active') ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <a class= "btn btn-outline-secondary" href="<?= Url::toRoute('configurations/index'); ?>">Reset</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
