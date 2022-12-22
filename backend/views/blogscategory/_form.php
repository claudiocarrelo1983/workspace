<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\Query;

/* @var $this yii\web\View */
/* @var $model app\models\BlogsCategory */
/* @var $form yii\widgets\ActiveForm */

$tagQuery = new Query;

$tags = $tagQuery->select([
    'id', 
    'tag', 
    'tag_parent_id',
    'description', 																										
    'created_date' 
    ])
->from('blogs_category')    
->limit(100)
->all();

$countries = $tagQuery->select([
    'country_code',
    'full_title'
    ])
->from('countries')    
->all();

$arrTags = array();

foreach($tags as $tag){
    $arrTags[$tag['tag']] = $tag['description'];   
}

$arrLanguages = ['en', 'pt', 'es', 'it', 'de', 'fr'];

?>



<div class="blogs-category-form">
<?php $form = ActiveForm::begin(); ?>   
    <div class="tabs tabs-dark mb-4 pb-2">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#popularPosts" data-bs-toggle="tab">
                     Blog Category
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
            
                <?=  $form->field($model, 'page_code')->hiddenInput(['value'=> $code])->label(false); ?>
      
                <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'tag_parent_id')->dropdownList(
                    $arrTags,
                    ['prompt'=>'Select Parent Category']
                ); ?>

                <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

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
                <?= $form->field($model, 'text_'.$value['country_code'])->textInput(['maxlength' => true])->label('Description '.$value['full_title']) ?>
            
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
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
