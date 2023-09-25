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
            <?= $form->field($model, 'title')->dropdownList(
                Helpers::dropdownTitle(),
                ['prompt'=> Yii::t('app', 'select_title')]
                )->label(Yii::t('app', 'title')); 
            ?> 
            <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label(Yii::t('app', 'title'));  ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'title_pt')->textInput(['maxlength' => true])->label(Yii::t('app', 'title_pt'));  ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'title_en')->textInput(['maxlength' => true])->label(Yii::t('app', 'title_en'));  ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'order')->textInput(['maxlength' => true])->label(Yii::t('app', 'order'));  ?>
        </div>
        <div class="col">            
            <?= $form->field($model, 'active')->dropdownList(
                    Helpers::dropdownActive(),
                    ['prompt'=> Yii::t('app', 'select_active')], 
                )->label(Yii::t('app', 'active')); 
            ?>
        </div>
    </div>

    <div class="form-group pt-3">
        <?= Html::submitButton(Yii::t('app', 'submit_button'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
