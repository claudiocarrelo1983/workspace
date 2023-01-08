<?php

use yii\helpers\Html;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\bootstrap4\ActiveForm;
use dosamigos\tinymce\TinyMce;


?>


<?php DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_wrapper_ingredients', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
    'widgetBody' => '.container-items', // required: css class selector
    'widgetItem' => '.item', // required: css class
    'limit' => 100, // the maximum times, an element can be cloned (default 999)
    'min' => 0, // 0 or 1 (default 1)
    'insertButton' => '.add-item-button-ingredients', // css class
    'deleteButton' => '.remove-item-ingredients', // css class
    'model' => $modelIngredients[0],
    'formId' => 'dynamic-form',
    'formFields' => [
        'recipe_code',
        'name',
        'quantity',
        'measure',
        'calories',
        'fat',
        'protein',
        'active',
        'nutricion_pt',
        'nutricion_es',
        'nutricion_en',
        'nutricion_it',
        'nutricion_fr',
        'nutricion_de',
    ],
]); ?>

<div class="panel panel-default">
    <div class="panel-heading">                
        <button type="button" class="pull-right add-item-button-ingredients btn btn-success">
            <i class="fa fa-plus"></i> Add Ingredients
        </button>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body container-items text-right"><!-- widgetContainer -->
        <?php $key = 1;
        foreach ($modelIngredients as $index => $model): 
        ?>        
        <div class="item panel panel-default"><!-- widgetBody -->
            <div class="panel-heading text-right">               
                <div class="row"> 
                    <div class="col-sm-11">
                    </div>                
                    <div class="col-sm-1 text-right">
                        <div class="text-right">                         
                            <button type="button" class="pull-right remove-item-ingredients btn btn-danger ">
                                <span class="panel-title-ingredients">
                                    Remove: <?= ($index + 1) ?>
                                </span>
                            </button>
                        </div>   
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <?php
                    // necessary for update action.
                    if (!$model->isNewRecord) {
                        echo Html::activeHiddenInput($model, "[{$index}]id");
                    }
                ?>              
                <div class="row">                
                    <div class="col-sm-3">
                        <?= $form->field($model, "[{$index}]recipe_food_name")->textInput(['maxlength' => true])->label('Ingredient Name') ?>
                    </div>
                    <div class="col-sm-3">
                        <?= $form->field($model, "[{$index}]quantity")->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">  
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
                        <div class="col-sm-3">
                            <?= $form->field($model, "[{$index}]recipe_food_".$valLang)->textInput(['maxlength' => true])->label('Ingredient Name '. ucfirst($value['country_code'])) ?>
                        </div>
                    <?php 
                            }else{            
                    ?>                        
                        <?=  $form->field($model, "[{$index}]recipe_food_".$valLang)->hiddenInput(['value'=> 'n/a'])->label(false); ?>      
                    <?php 
                            
                        }
                    }               
                    ?>
                    <div class="col-sm-2">
                        <?= $form->field($model, "[{$index}]measure")->dropdownList(
                            [
                                'grams' => 'Grams',
                                'kg' => 'KG',
                                'mil' => 'Mililiters',
                                'decil' => 'Deciliters',
                                'spoon' => 'Spoon',
                                'tea_spoon' => 'Tea Spoon',
                                'cup' => 'Cup',
                                '1_2' => '1/2',
                                '1_3' => '1/3',
                                '1_4' => '1/4',
                                '3_4' => '3/4',                         
                                'q_b' => 'q.b.',
                                'unid' => 'Unid.'                            
                            ]); 
                        ?>   
                    </div>                
                    <div class="col-sm-2">
                        <?= $form->field($model, "[{$index}]calories")->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-2">
                        <?= $form->field($model, "[{$index}]fat")->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-2">
                        <?= $form->field($model, "[{$index}]carbs")->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-2">
                        <?= $form->field($model, "[{$index}]protein")->textInput(['maxlength' => true]) ?>
                    </div>
            
                    <div class="col-sm-2">
                        <?= $form->field($model, "[{$index}]active")->dropdownList(
                            [
                                1 => 'Yes',
                                0 => 'No'
                            ]); 
                        ?>                                      
                    </div>                
                </div><!-- end:row -->
                <hr class="my-5">
            </div>
        </div>       

    <?php endforeach; ?>
    </div>
</div>

<?php DynamicFormWidget::end(); ?>