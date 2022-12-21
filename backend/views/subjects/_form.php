<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\Query;

$tagQueryUser = new Query;

$countries = $tagQueryUser->select([
    'country_code',
    'full_title' 
    ])
->from('countries')    
->all();

$arrLanguages = ['en', 'pt', 'es', 'it', 'de', 'fr'];

/* @var $this yii\web\View */
/* @var $model app\models\Subjects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subjects-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="tabs tabs-dark mb-4 pb-2">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#popularPosts" data-bs-toggle="tab">
                    Subjects
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
                <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

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
                    
                    <?= $form->field($model, 'text_'.trim($value['country_code']))->textInput(['maxlength' => true])->label('Subject '.$value['full_title']) ?>

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
    </div>


    <div class="form-group">

        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
