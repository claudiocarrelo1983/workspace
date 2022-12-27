<?php

use yii\helpers\Html;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\bootstrap4\ActiveForm;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $modelCustomer app\modules\yii2extensions\models\Customer */
/* @var $modelsAddress app\modules\yii2extensions\models\Address */

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});
';

$this->registerJs($js);

?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?=  $form->field($model, 'recipe_code_title')->hiddenInput(['value'=> $title])->label(false); ?>
    <?=  $form->field($model, 'recipe_code_text')->hiddenInput(['value'=> $text])->label(false); ?>
    <div class="row">    
        
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
        <div class="col-3">
            <?= $form->field($model, 'recipe_code')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'recipe_cat_code')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-12">
            <?= $form->field($model, 'recipe_title')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-12">
            <?= $form->field($model, 'recipe_title_pt')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-12">
            <?= $form->field($model, 'recipe_text_pt')->textInput(['maxlength' => true]) ?>
        </div>


        <div class="col-12">
            <?= $form->field($model, 'recipe_title_en')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-12">
            <?= $form->field($model, 'recipe_text_en')->textInput(['maxlength' => true]) ?>
        </div>


        <div class="col-12">
            <?= $form->field($model, 'recipe_title_es')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-12">
            <?= $form->field($model, 'recipe_text_es')->textInput(['maxlength' => true]) ?>
        </div>


        
        <div class="col-12">
            <?= $form->field($model, 'recipe_title_fr')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-12">
            <?= $form->field($model, 'recipe_text_fr')->textInput(['maxlength' => true]) ?>
        </div>


            
        <div class="col-12">
            <?= $form->field($model, 'recipe_title_de')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-12">
            <?= $form->field($model, 'recipe_text_de')->textInput(['maxlength' => true]) ?>
        </div>


        
        <div class="col-12">
            <?= $form->field($model, 'recipe_title_it')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-12">
            <?= $form->field($model, 'recipe_text_it')->textInput(['maxlength' => true]) ?>
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
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 4, // the maximum times, an element can be cloned (default 999)
        'min' => 0, // 0 or 1 (default 1)
        'insertButton' => '.add-item-button', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $modelsAddress[0],
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
            <i class="fa fa-envelope"></i> Address Book
            <button type="button" class="pull-right add-item-button btn btn-success btn-xs"><i class="fa fa-plus"></i> Add address</button>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body container-items"><!-- widgetContainer -->
            <?php foreach ($modelsAddress as $index => $modelAddress): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <span class="panel-title-address">Address: <?= ($index + 1) ?></span>
                        <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (!$modelAddress->isNewRecord) {
                                echo Html::activeHiddenInput($modelAddress, "[{$index}]id");
                            }
                        ?>
                        <?= $form->field($modelAddress, "[{$index}]recipe_code")->textInput(['maxlength' => true]) ?>
                        <?= $form->field($modelAddress, "[{$index}]name")->textInput(['maxlength' => true]) ?>

                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelAddress, "[{$index}]measure")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelAddress, "[{$index}]calories")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- end:row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelAddress, "[{$index}]fat")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelAddress, "[{$index}]carbs")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- end:row -->
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelAddress, "[{$index}]protein")->textInput(['maxlength' => true]) ?>
                            </div>
                      
                            <div class="col-sm-6">
                                <?= $form->field($modelAddress, "[{$index}]active")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- end:row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelAddress, "[{$index}]nutricion_pt")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelAddress, "[{$index}]nutricion_es")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelAddress, "[{$index}]nutricion_en")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- end:row -->
                    </div>

                    <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelAddress, "[{$index}]nutricion_fr")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelAddress, "[{$index}]nutricion_de")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelAddress, "[{$index}]nutricion_it")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- end:row -->
                    </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php DynamicFormWidget::end(); ?>

    <div class="form-group">
        <?= Html::submitButton($modelAddress->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>