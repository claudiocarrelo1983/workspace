<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\Query;

/* @var $this yii\web\View */
/* @var $model app\models\BlogsCategory */
/* @var $form yii\widgets\ActiveForm */

$tagQuery = new Query;

$tags = $tagQuery->select([
    'id', 
    'tag', 
    'tag_parent_id',
    'description', 																										
    'created_date' 
    ])
->from('blogs_category')    
->limit(100)
->all();

$arrTags = array();

foreach($tags as $tag){
    $arrTags[$tag['tag']] = $tag['description'];   
}

?>

<div class="blogs-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tag_parent_id')->dropdownList($arrTags,
    ['prompt'=>'Select Parent Category']); ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
