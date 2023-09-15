<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\Helpers\Helpers;


/** @var yii\web\View $this */
/** @var app\models\ServicesCategorySearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="services-category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row pb-5">        
        <div class="col">  
            <?= $form->field($model, 'category_code')->dropdownList(
                Helpers::dropdownServiceCategory()
                )->label(Yii::t('app', 'category_code'));
            ?>        
        </div>
        <div class="col">
            <?= $form->field($model, 'title')->label(Yii::t('app', 'title')); ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'active')->dropdownList(
                Helpers::dropdownActive()
                )->label(Yii::t('app', 'active'));
            ?>
        </div>
    </div>  
    <div class="form-group pb-4">
        <?= Html::submitButton(Yii::t('app', 'search_button'), ['class' => 'btn btn-primary']) ?>
        <a class= "btn btn-outline-secondary" href="<?= Url::toRoute('services-category/index'); ?>">
            <?= Yii::t('app', 'reset_button') ?>
        </a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
