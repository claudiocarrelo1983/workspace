<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\ServicesCategory $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="services-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'title_pt')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'order')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">            
            <?= $form->field($model, 'active')->dropdownList(
                    Helpers::dropdownActive(),
                    ['prompt'=> Yii::t('app', 'select_active')], 
                ); 
            ?>
        </div>
    </div>

    <div class="form-group pt-3">
        <?= Html::submitButton(Yii::t('app', 'submit_button'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
