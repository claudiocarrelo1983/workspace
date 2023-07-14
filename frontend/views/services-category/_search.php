<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\db\Query;


$query = new Query;
$servicesCatArr = $query->select([
        'category_code', 
        'title'   
    ])
->from('services_category')    
->where(['company' => Yii::$app->user->identity->company_code])
->orderBy(['order' => SORT_DESC])
->all();

$arrServiceCat = array();

foreach($servicesCatArr as $value){
    $arrServiceCat[$value['category_code']] = $value['title'];
}

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
            <?= $form->field($model, 'category_code')->dropdownList($arrServiceCat,
                    ['prompt'=>'Select Category'])->label('Category');; 
            ?>        
        </div>
        <div class="col">
            <?= $form->field($model, 'title') ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'active')->dropdownList(
                [
                1 => Yii::t('app', 'yes'),
                 0 => Yii::t('app', 'no'),
                ]); 
            ?>
        </div>
    </div>   

    <?php // echo $form->field($model, 'title_pt') ?>

    <?php // echo $form->field($model, 'title_en') ?>

    <?php // echo $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group pb-4">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <a class= "btn btn-outline-secondary" href="<?= Url::toRoute('services-category/index'); ?>">Reset</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
