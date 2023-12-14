<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\Helpers\Helpers;
use yii\helpers\Url;

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
                    ['prompt'=> Yii::t('app', 'select_team')]            
                )->label(Yii::t('app','team_username')) ; ; 
            ?> 
        </div>
        <div class="col">
            <?= $form->field($model, 'service_code')->dropDownList(
                    Helpers::dropdownServices(),
                    ['prompt'=> Yii::t('app', 'select_services')]                 
                )->label(Yii::t('app','service_code')) ; 
            ?> 
        </div>
        <div class="col">            
            <?= $form->field($model, 'contact_number')->label(Yii::t('app','contact_number'))  ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'nif')->label(Yii::t('app','nif')) ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'email')->label(Yii::t('app','email')) ?>
        </div>
    </div>
    <div class="form-group pb-4">
        <?= Html::submitButton(Yii::t('app', 'search_button'), ['class' => 'btn btn-primary']) ?>
        <a class= "btn btn-outline-secondary" href="<?= Url::toRoute('sheddule/index'); ?>">
            <?= Yii::t('app', 'reset_button') ?>
        </a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
