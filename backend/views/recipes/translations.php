<?php

use yii\helpers\Html;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\bootstrap4\ActiveForm;
use dosamigos\tinymce\TinyMce;


/* @var $this yii\web\View */
/* @var $modelCustomer app\modules\yii2extensions\models\Customer */
/* @var $modelsAddress app\modules\yii2extensions\models\Address */



?>


   
<?php 

foreach($arrLanguages as $valLang){

    $display = 0;

    foreach ($countries as $value){
        if($value['country_code'] == $valLang){
            $display = 1;
            break;
        }
    }

    if($display == 1){

?>  
    <?= $form->field($model, 'recipe_title_'.$value['country_code'])->textInput(['maxlength' => true]) ?>  

    <div class="col-12">
        <?= $form->field($model, 'recipe_text_'.$valLang)->widget(TinyMce::className(), [
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

    <hr class="my-5">

<?php 
}else{            
?>
    <?=  $form->field($model, 'recipe_title_'.$valLang)->hiddenInput(['value'=> 'n/a'])->label(false); ?>   
    <?=  $form->field($model, 'recipe_text_'.$valLang)->hiddenInput(['value'=> 'n/a'])->label(false); ?>           
    <?php 
        
    }
}               
?>