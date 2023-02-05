<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\BlogsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="blogs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row py-4">
        <div class="col-lg-3 col-sm-12">
            <?= $form->field($model, 'id') ?>
        </div>
        <div class="col-lg-3 col-sm-12">
            <?= $form->field($model, 'title') ?>
        </div>
        <div class="col-lg-3 col-sm-12">
            <?= $form->field($model, 'publish')->dropdownList(
                [1 => 'Yes', 0 => 'No'],
                [''=>'Choose']); 
            ?>
        </div>   
        <div class="col-lg-3 col-sm-12">
            <?= $form->field($model, 'active')->dropdownList(
                [1 => 'Yes', 0 => 'No'],
                [''=>'Choose']); 
            ?>
        </div>  
      
    </div>  

    



    <?php // echo $form->field($model, 'image_instagram') ?>

   

    <?php // echo $form->field($model, 'alt') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'tags') ?>

    <?php // echo $form->field($model, 'subtitle') ?>

    <?php // echo $form->field($model, 'title_pt') ?>

    <?php // echo $form->field($model, 'title_es') ?>

    <?php // echo $form->field($model, 'title_en') ?>

    <?php // echo $form->field($model, 'title_it') ?>

    <?php // echo $form->field($model, 'title_fr') ?>

    <?php // echo $form->field($model, 'title_de') ?>

    <?php // echo $form->field($model, 'text_pt') ?>

    <?php // echo $form->field($model, 'text_es') ?>

    <?php // echo $form->field($model, 'text_en') ?>

    <?php // echo $form->field($model, 'text_it') ?>

    <?php // echo $form->field($model, 'text_fr') ?>

    <?php // echo $form->field($model, 'text_de') ?>

    <?php // echo $form->field($model, 'subtitle_pt') ?>

    <?php // echo $form->field($model, 'subtitle_es') ?>

    <?php // echo $form->field($model, 'subtitle_en') ?>

    <?php // echo $form->field($model, 'subtitle_it') ?>

    <?php // echo $form->field($model, 'subtitle_fr') ?>

    <?php // echo $form->field($model, 'subtitle_de') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group py-3">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <a class= "btn btn-outline-secondary" href="<?= Url::toRoute('blogs/index'); ?>">Reset</a>
    </div>   

    <?php ActiveForm::end(); ?>

</div>
