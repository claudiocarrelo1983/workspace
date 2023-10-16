<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\Models\TeamSearch $model */
/** @var yii\widgets\ActiveForm $form */


?>

<div class="team-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row pb-5">
        <div class="col">   
            <?= $form->field($model, 'username')->label(Yii::t('app', 'username')); ?>
        </div>
        <div class="col">  
            <?= $form->field($model, 'location_code')->dropdownList(
                Helpers::dropdownCompanyLocations(),
                    ['prompt'=>Yii::t('app', 'select_company_code_location')]
                )->label(Yii::t('app', 'company_code_location')); 
            ?>  
        </div>
        <div class="col">          
            <?= $form->field($model, 'email')->label(Yii::t('app', 'email')); ?>
        </div>
        <div class="col">      
            <?= $form->field($model, 'contact_number')->label(Yii::t('app', 'contact_number')); ?>
        </div>
    </div>

    <div class="form-group pb-4">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <a class= "btn btn-outline-secondary" href="<?= Url::toRoute('team/index'); ?>">Reset</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
