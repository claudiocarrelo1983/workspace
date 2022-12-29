<?php


use dosamigos\tinymce\TinyMce;

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
        <?= $form->field($model, 'recipe_text')->textarea(['maxlength' => true]) ?>        
    </div>                      
</div>