<?php

use yii\helpers\Url;
use yii\db\Query;

$tagQueryUser = new Query;

$tags = $tagQueryUser->select([
    'recipe_cat_code', 
    'description'
    ])
->from('recipes_category')    
->all();

$tagsArr = array();

foreach($tags as $tag){
    $tagsArr[$tag['recipe_cat_code']] = $tag['description'];
}


?>

<div class="row">   
    <div class="col-4">
        <?= $form->field($model, 'recipe_title')->textInput(['maxlength' => true]) ?>
    </div> 
    <div class="col-2">
        <?= $form->field($model, 'cooking_time')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-2">
        <?= $form->field($model, 'number_of_people')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-2">
        <?= $form->field($model, 'difficulty')->dropdownList(
            [
                'easy' => 'Easy',
                'Medium' => 'Medium',
                'hard' => 'Hard',                        
            ]); 
        ?>   
    </div>
    <div class="col-2">
        <?= $form->field($model, 'active')->dropdownList(
            [
                1 => 'Yes',
                0 => 'No'
            ]); 
        ?>
    </div>   
    <div class="col-12 py-4">
        <?= $form->field($model, 'imageFile')->fileInput() ?>
        <div> The image needs to be 900 x 500</div>
    </div>    
    <div class="col-12">
        <?= $form->field($model, 'recipe_cat_code')->radioList(
            $tagsArr); 
        ?>
        <a href="<?= Url::toRoute('recipes-category/create') ?>" target="_blank"  class="pb-5">
            <?= Yii::t('app', 'Create New Category') ?>	
    </a>
    </div>

    
    <div class="col-12">
        <?= $form->field($model, 'recipe_text')->textarea(['maxlength' => true]) ?>        
    </div>                      
</div>