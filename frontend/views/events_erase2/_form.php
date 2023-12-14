<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\Helpers\Helpers;
use yii\jui\AutoComplete;

/** @var yii\web\View $this */
/** @var app\models\Events $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="events-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">       
        <div class="col">
            <?=  
               AutoComplete::widget([
                'name' => 'username',
                'model' => $model,     
                'options' => [
                    'class' => 'form-control',
                ],                 
                'clientOptions' => [
            
                    'source' => Helpers::autoCompleteUsername(),
                ],
            ]);
            ?>
        </div>
        <div class="col">
            <?=  
                $form->field($model, 'company_code_location')->dropdownList(
                    Helpers::dropdownCompanyLocations(),
                    [
                        'class' => 'form-select form-control h-auto py-2',
                        'prompt'=> Yii::t('app', 'select_company_code')
                    ])->label(false)
            ?>
        </div>
    </div>

  


    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_pt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'frequency')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start')->textInput() ?>

    <?= $form->field($model, 'end')->textInput() ?>

    <?= $form->field($model, 'allDay')->textInput() ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'className')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
