<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\Query;
use dosamigos\tinymce\TinyMce;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Blogs */
/* @var $form yii\widgets\ActiveForm */

$tagQuery = new Query;

$countries = $tagQuery->select([
    'country_code' 
    ])
->from('countries')    
->all();

$arrLanguages = ['en', 'pt', 'es', 'it', 'de', 'fr'];

$tags = $tagQuery->select([
    'id', 
    'tag', 
    'tag_parent_id',
    'description', 																										
    'created_date' 
    ])
->from('blogs_category')    
->all();

$users = $tagQuery->select([
    'id', 
    'guid', 
    'first_name',
    'last_name',
    'username', 
    'name'
    ])
->from('user')    
->all();

$arrUsers = array();

foreach($users as $user){
    $arrUsers[$user['username']] = $user['first_name'].' '.$user['last_name'];
}


$arrTags = array();

$i = 0;

foreach($tags as $tag){

    $exists = false;

    foreach($tags as $tagSearch){
        if($tagSearch['tag_parent_id'] == $tag['tag']){
            $exists = true;
            break;
        }
    }
  
    
    if($exists === false){  
        $arrTags[$tag['tag']] = $tag['description'];            
    } 
}



$tagQueryUser = new Query;

$tags = $tagQueryUser->select([
    'tag', 
    'description',
    'tag_parent_id'
    ])
->from('blogs_category')    
->all();

$tagsArr = array();

foreach($tags as $tag){
    if(!empty($tag['tag_parent_id'])){
         $tagsArr[$tag['tag']] = $tag['description'];
    }
}

?>

<div class="blogs-form">
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
                    <?=  $form->field($model, 'page_code_title')->hiddenInput(['value'=> $title])->label(false); ?>
                    <?=  $form->field($model, 'page_code_subtitle')->hiddenInput(['value'=> $subtitle])->label(false); ?>
                    <?=  $form->field($model, 'page_code_text')->hiddenInput(['value'=> $text])->label(false); ?>
                    <div clasS="row">
                        <div class="col">
                                <?= $form->field($model, 'imageFile')->fileInput()->hint('The image needs to be 900 x 500 ')->label('Image') ?>
                        </div>
                        <div class="col">
                            <?= $form->field($model, 'imageFile2')->fileInput()->hint('The image needs to be 900 x 500 ')->label('Image') ?>
                        </div>   
                    </div>
                    <div class="row">
                         <div class="col">
                            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                         </div> 
                         <div class="col">
                             <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>            
                         </div> 
                    </div>
                    <div class="row">
                         <div class="col">
                            <?= $form->field($model, 'text')->widget(TinyMce::className(), [
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
               

                    <?= $form->field($model, 'username')->dropdownList($arrUsers,
                    ['prompt'=>'Select User']); ?> 

                    <?= $form->field($model, 'tagsArr')->checkBoxList($tagsArr, ['separator' => '<br>']); ?>

                    <a href="<?= Url::toRoute('blogscategory/create') ?>" target="_blank"  class="pb-5">
                        <?= Yii::t('app', 'Create New Category') ?>	
                    </a>

                    <?= $form->field($model, 'active')->dropdownList(
                        [1 => 'Yes', 0 => 'No'],
                        ['prompt'=>'Active']); 
                    ?>
                </div>
                <div class="tab-pane" id="recentPosts">      
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
                        <?=  $form->field($model, 'title_'.$valLang)->textInput() ?>   
                        <?=  $form->field($model, 'subtitle_'.$valLang)->textInput() ?>  
                        <?= $form->field($model, 'text_'.$value['country_code'])->widget(TinyMce::className(), [
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
                    
                    <?php 
                        }else{
                    ?>
                        <?=  $form->field($model, 'title_'.$valLang)->hiddenInput(['value'=> 'n/a'])->label(false); ?>   
                        <?=  $form->field($model, 'subtitle_'.$valLang)->hiddenInput(['value'=> 'n/a'])->label(false); ?>   
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

    <?php ActiveForm::end(); ?>
    </div>
</div>
