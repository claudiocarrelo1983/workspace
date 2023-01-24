<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TeamSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="team-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
   <div class="row py-4">   
        <div class="col-lg-3 col-sm-12">
            <?= $form->field($model, 'id') ?>
        </div>
        <div class="col-lg-3 col-sm-12">
            <?= $form->field($model, 'username') ?>
        </div>
        <div class="col-lg-3 col-sm-12">
            <?= $form->field($model, 'full_name') ?>
        </div> 
        <div class="col-lg-3 col-sm-12">
            <?= $form->field($model, 'location') ?>
        </div>
    </div>






    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'title_pt') ?>

    <?php // echo $form->field($model, 'text_pt') ?>

    <?php // echo $form->field($model, 'title_es') ?>

    <?php // echo $form->field($model, 'text_es') ?>

    <?php // echo $form->field($model, 'title_en') ?>

    <?php // echo $form->field($model, 'text_en') ?>

    <?php // echo $form->field($model, 'title_it') ?>

    <?php // echo $form->field($model, 'text_it') ?>

    <?php // echo $form->field($model, 'title_fr') ?>

    <?php // echo $form->field($model, 'text_fr') ?>

    <?php // echo $form->field($model, 'title_de') ?>

    <?php // echo $form->field($model, 'text_de') ?>

    <?php // echo $form->field($model, 'website') ?>

    <?php // echo $form->field($model, 'facebook') ?>

    <?php // echo $form->field($model, 'pinterest') ?>

    <?php // echo $form->field($model, 'instagram') ?>

    <?php // echo $form->field($model, 'twitter') ?>

    <?php // echo $form->field($model, 'tiktok') ?>

    <?php // echo $form->field($model, 'linkedin') ?>

    <?php // echo $form->field($model, 'youtube') ?>

    <?php // echo $form->field($model, 'contact_number') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group py-3">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
