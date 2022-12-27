<?php


use dosamigos\tinymce\TinyMce;

?>

<?=  $form->field($model, 'recipe_code_title')->hiddenInput(['value'=> $recipeCodeTitle])->label(false); ?>
<?=  $form->field($model, 'recipe_code_text')->hiddenInput(['value'=> $recipeCodeText])->label(false); ?>
<div class="row">   

    <div class="col-3">
        <?= $form->field($model, 'recipe_title')->textInput(['maxlength' => true]) ?>
    </div> 
    <div class="col-3">
        <?= $form->field($model, 'cooking_time')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-3">
        <?= $form->field($model, 'number_of_people')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-3">
        <?= $form->field($model, 'active')->dropdownList(
            [
                1 => 'Yes',
                0 => 'No'
            ],
            ['prompt'=>'Active']); 
        ?>
    </div>   
    <div class="col-12 py-4">
        <?= $form->field($model, 'imageFile')->fileInput() ?>
        <div> The image needs to be 900 x 500</div>
    </div>        
    
    <div class="col-12">
        <?= $form->field($model, 'recipe_text')->widget(TinyMce::className(), [
            'options' => ['rows' => 6],
            'language' => 'es',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            ]
        ]);?>
    </div>                      
</div>