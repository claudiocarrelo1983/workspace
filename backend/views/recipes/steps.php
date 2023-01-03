<?php

use yii\helpers\Html;
use wbraganca\dynamicform\DynamicFormWidget;




?>


<?php DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
    'widgetBody' => '.container-items', // required: css class selector
    'widgetItem' => '.item', // required: css class
    'limit' => 4, // the maximum times, an element can be cloned (default 999)
    'min' => 0, // 0 or 1 (default 1)
    'insertButton' => '.add-item-button', // css class
    'deleteButton' => '.remove-item', // css class
    'model' => $modelsRecipeSteps[0],
    'formId' => 'dynamic-form',
    'formFields' => [
        'recipe_code',
        'name',
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
        <button type="button" class="pull-right add-item-button btn btn-success">
            <i class="fa fa-plus"></i> 
            Add Step
        </button>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body container-items text-right"><!-- widgetContainer -->
        <?php
        $i = 1;
        foreach ($modelsRecipeSteps as $index => $model): ?>
        
            <div class="item panel panel-default"><!-- widgetBody -->
                <div class="panel-heading text-right">              
                    <div class="row"> 
                        <div class="col-sm-11">
                        </div>                
                        <div class="col-sm-1 text-right">
                            <div class="text-right">                          
                                <button type="button" class="pull-right remove-item btn btn-danger ">
                                    <span class="panel-title-address">
                                        <?= ($index + 1) ?>
                                    </span>
                                </button>
                            </div>   
                        </div>
                    </div>
                    <?=  $form->field($model, "[{$index}]order")->hiddenInput(['value'=> ($index + 1)])->label(false); ?>  
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (!$model->isNewRecord) {
                                echo Html::activeHiddenInput($model, "[{$index}]id");
                            }
                        ?>              
                        <div class="row">               
                            <div class="col-sm-3">                   
                                <?=  $form->field($model, "[{$index}]recipe_step_text")->textarea(); ?>                       
                            </div>                     
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
                                    <?=  $form->field($model, "[{$index}]recipe_step_text_".$value['country_code'])->textarea()?>          
                                </div>    
                            <?php 
                            }else{            
                            ?>                            
                            <?=  $form->field($model, "[{$index}]recipe_step_text_".$valLang)->hiddenInput(['value'=> 'n/a'])->label(false); ?>         
                            <?php 
        
                                }
                            }               
                            ?>
                            <hr class="my-5">  
                        </div><!-- end:row -->
                    </div>
                </div>
            </div>
       
<?php endforeach; ?>
</div>
</div>
<?php DynamicFormWidget::end(); ?>