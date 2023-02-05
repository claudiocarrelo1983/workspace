<?php

use yii\helpers\Html;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\bootstrap4\ActiveForm;
use dosamigos\tinymce\TinyMce;
use yii\db\Query;

$tagQueryUser = new Query;

$countries = $tagQueryUser->select([
    'country_code',
    'full_title' 
    ])
->from('countries')    
->all();

$arrLanguages = ['en', 'pt'];

/* @var $this yii\web\View */
/* @var $modelCustomer app\modules\yii2extensions\models\Customer */
/* @var $modelsAddress app\modules\yii2extensions\models\Address */

$js = '
jQuery(".dynamicform_wrapper_steps").on("afterInsert", function(e, item) { 
    jQuery(".dynamicform_wrapper_steps .panel-title-steps").each(function(index) {      
        jQuery(this).html("Remove: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper_steps").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper_steps .panel-title-steps").each(function(index) {
        jQuery(this).html("Remove: " + (index + 1))
    });
});


jQuery(".dynamicform_wrapper_ingredients").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper_ingredients .panel-title-ingredients").each(function(index) {       
        jQuery(this).html("Remove: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper_ingredients").on("afterDelete", function(e) {
   jQuery(".dynamicform_wrapper_ingredients .panel-title-ingredients").each(function(index) {     
        jQuery(this).html("Remove: " + (index + 1))
    });
});
';


$this->registerJs($js);

$this->title = 'Recipes';
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="customer-form">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?php if(!empty($validationMessage)){?>
        <div class="alert alert-danger">
            <?= $validationMessage; ?>
        </div>
    <?php } ?>
      
    <div class="tabs tabs-dark mb-4 pb-2">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#popularPosts" data-bs-toggle="tab">
                     Recipes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-1 font-weight-bold text-uppercase" href="#recentPosts" data-bs-toggle="tab">
                    Translations
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-1 font-weight-bold text-uppercase" href="#steps" data-bs-toggle="tab">
                    Steps
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-1 font-weight-bold text-uppercase" href="#ingredients" data-bs-toggle="tab">
                    Ingredients
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="popularPosts"> 
                <?= $this->render('@backend/views/recipes/recipes',[
                    'model' => $model,          
                    'form' => $form, 
                    'countries' => $countries,
                    'arrLanguages' => $arrLanguages,
                ]); ?> 
                
            </div>
            
            <div class="tab-pane" id="recentPosts">    
          
                <?= $this->render('@backend/views/recipes/translations',[
                     'model' => $model,               
                    'form' => $form, 
                    'countries' => $countries,
                    'arrLanguages' => $arrLanguages,
                ]); ?> 
               
            </div>
            <div class="tab-pane" id="steps">   

                <?= $this->render('@backend/views/recipes/steps',[
                    'modelsRecipeSteps' => $modelsRecipeSteps,             
                    'form' => $form, 
                    'countries' => $countries,
                    'arrLanguages' => $arrLanguages,
                ]); ?>  

            </div>      

            <div class="tab-pane" id="ingredients">    
                <?= $this->render('@backend/views/recipes/ingredients',[
                    'modelIngredients' => $modelIngredients,                  
                    'form' => $form, 
                    'countries' => $countries,
                    'arrLanguages' => $arrLanguages,
                ]); ?>                                   
            </div>          
        </div>  
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

