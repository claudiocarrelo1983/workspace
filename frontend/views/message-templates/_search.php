<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\MessagesTemplateSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="messages-template-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row my-4">
        <div class="col-lg-4">
            <?= $form->field($model, 'template_code')->dropdownList(
                Helpers::dropdownMessageTemplates(),
                ['prompt'=> Yii::t('app', 'select_template_code')]
                )->label(Yii::t('app', 'template_code')); 
            ?>   
        </div>
    </div>

    <div class="form-group my-4">
        <?= Html::submitButton(Yii::t('app', 'search_button'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'reset_button'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
