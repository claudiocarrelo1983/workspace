<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\Query;

$tagQueryUser = new Query;

$countries = $tagQueryUser->select([
    'country_code' 
    ])
->from('countries')    
->all();

$arrLanguages = ['en', 'pt', 'es', 'it', 'de', 'fr'];


/* @var $this yii\web\View */
/* @var $model app\models\PricingSpecs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pricing-specs-form">
    <?php $form = ActiveForm::begin(); ?>   
    <div class="tabs tabs-dark mb-4 pb-2">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#popularPosts" data-bs-toggle="tab">
                     Pricing Specs
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-1 font-weight-bold text-uppercase" href="#recentPosts" data-bs-toggle="tab">
                    Translations
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="popularPosts">  
                <?=  $form->field($model, 'text_it')->hiddenInput(['value'=> 'n/a'])->label(false); ?>
                <?=  $form->field($model, 'text_de')->hiddenInput(['value'=> 'n/a'])->label(false); ?>
                <?=  $form->field($model, 'text_fr')->hiddenInput(['value'=> 'n/a'])->label(false); ?>
                <?=  $form->field($model, 'page_code')->hiddenInput(['value'=> $code])->label(false); ?>

                <?= $form->field($model, 'type')->radioList(                       [
                        'basic' => 'Basic',
                        'standard' => 'Standard',
                        'professional' => 'Professional',
                        'enterprise' => 'Enterprise'
                    ],                     
                    array('required','separator' => "</br>" ))->label('Select Type');
                ?>      

                <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>        
                                
                <?= $form->field($model, 'active')->dropDownList(
                    [
                        '0' => 'Yes',
                        '1' => 'No'
                    ],                     
                    array( 'separator' => "</br>" ));
                ?>

                <?= $form->field($model, 'order')->textInput() ?>
                
            </div>
            <div class="tab-pane" id="recentPosts">      
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
                    <?= $form->field($model, 'text_'.$value['country_code'])->textInput(['maxlength' => true]) ?>
                
                <?php 
                    }else{
                ?>
                    <?=  $form->field($model, 'text_'.$valLang)->hiddenInput(['value'=> 'n/a'])->label(false); ?>           
                <?php 
                        
                    }
                }               
                ?>
            </div>
        </div>

        <div class="form-group">           
            <?= Html::submitInput(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>    
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
