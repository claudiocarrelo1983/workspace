<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

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
            <?= $form->field($model, 'username')->label(Yii::t('app', 'username')) ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'first_name')->label(Yii::t('app', 'first_name')) ?>
        </div>
        <div class="col">
            <?php  echo $form->field($model, 'nif')->label(Yii::t('app', 'nif')) ?>
        </div>
        <div class="col">
            <?php  echo $form->field($model, 'contact_number')->label(Yii::t('app', 'contact_number')) ?>
        </div>
    </div>
    <div class="form-group pb-3">
        <?= Html::submitButton(Yii::t('app', 'search_button'), ['class' => 'btn btn-primary']) ?>
        <a class= "btn btn-outline-secondary" href="<?= Url::toRoute('clients/index'); ?>">
            <?= Yii::t('app', 'reset_button') ?>
        </a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
