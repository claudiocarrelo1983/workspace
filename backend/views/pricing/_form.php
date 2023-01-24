<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\Query;

$tagQuery = new Query;

$countries = $tagQuery->select([
    'country_code' 
    ])
->from('countries')    
->all();

$arrLanguages = ['en', 'pt', 'es', 'it', 'de', 'fr'];


/* @var $this yii\web\View */
/* @var $model app\models\Pricing */
/* @var $form yii\widgets\ActiveForm */
?>
                    
<div class="pricing-form">
    <?php $form = ActiveForm::begin(); ?>   
        <div class="tabs tabs-dark mb-4 pb-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#popularPosts" data-bs-toggle="tab">
                        Prices
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
                    <?=  $form->field($model, 'page_code_title')->hiddenInput(['value'=> $title])->label(false); ?>
                    <div class="row">
                        <div class="col-sm-12  col-lg-4 py-4">
                            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-sm-12  col-lg-4 py-4">
                            <?= $form->field($model, 'coin')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-sm-12  col-lg-4 py-4">
                                <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>
                        </div>  
                    </div>  
                    <div class="row"> 
                        <div class="col-sm-12  col-lg-4 py-4">
                                <?= $form->field($model, 'standard')->textInput(['maxlength' => true]) ?>
                        </div> 
                        <div class="col-sm-12  col-lg-4 py-4">
                            <?= $form->field($model, 'professional')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-sm-12  col-lg-4 py-4">
                            <?= $form->field($model, 'enterprise')->textInput(['maxlength' => true]) ?>
                        </div>                                        
                    </div>
                </div>
                 <div class="tab-pane" id="recentPosts">  
                    <div class="row">    
                    <?php 

                        foreach($arrLanguages as $valLang){

                            $display = 0;

                            foreach ($countries as $value){
                                if(isset($value['country_code'])){
                                    if($value['country_code'] == $valLang){
                                        $display = 1;
                                        break;
                                    }
                                }                              
                            }

                            if($display == 1){

                        ?>  
                        <div class="col-sm-12  col-lg-4 py-4">
                            <?=  $form->field($model, 'title_'.$valLang)->textInput() ?>   
                        </div>
               
                    <?php 
                        }else{
                    ?>
                        <?=  $form->field($model, 'title_'.$valLang)->hiddenInput(['value'=> 'n/a'])->label(false); ?>  
                    
                    <?php 
                            
                        }
                    }               
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
 
    <?php ActiveForm::end(); ?>
</div>

