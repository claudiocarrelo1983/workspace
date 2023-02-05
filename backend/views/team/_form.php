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


$users = $tagQueryUser->select([
    'id', 
    'guid', 
    'first_name',
    'last_name',
    'username', 
    'name'
    ])
->from('user')    
->where(['active' => '1'])   
->all();

$arrUsers = array();

foreach($users as $user){
    $arrUsers[$user['username']] = $user['first_name'].' '.$user['last_name'];
}

/** @var yii\web\View $this */
/** @var app\models\Team $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="team-form">

<?php $form = ActiveForm::begin(); ?>   
    <div class="tabs tabs-dark mb-4 pb-2">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#popularPosts" data-bs-toggle="tab">
                     Faq's
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
                <div class="row" >
                    <?=  $form->field($model, 'page_code_title')->hiddenInput(['value'=> $title])->label(false); ?>
                    <?=  $form->field($model, 'page_code_text')->hiddenInput(['value'=> $text])->label(false); ?>
                    <div class="col-3">                    
                        <?= $form->field($model, 'username')->dropdownList($arrUsers,
                        ['prompt'=>'Select User']); ?> 
                    </div>
                    <div class="col-3">
                        <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="col-3">
                         <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="col-3">
                        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-3">
                        <?= $form->field($model, 'imageFile')->fileInput()->hint('The image needs to be 900 x 500 ')->label('Image') ?>                      
                    </div>
                </div>
                <div class="row" >
                    <div class="col-3">
                        <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-3">
                        <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="col-3">
                        <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-3">
                        <?= $form->field($model, 'pinterest')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-3">
                        <?= $form->field($model, 'instagram')->textInput(['maxlength' => true]) ?>
                    </div>                   
                
                    <div class="col-3">
                        <?= $form->field($model, 'twitter')->textInput(['maxlength' => true]) ?>                    
                    </div>             

                    <div class="col-3">
                        <?= $form->field($model, 'tiktok')->textInput(['maxlength' => true]) ?>                    
                    </div>

                    <div class="col-3">
                        <?= $form->field($model, 'linkedin')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="col-3">
                        <?= $form->field($model, 'youtube')->textInput(['maxlength' => true]) ?>
                    
                    </div>

                    <div class="col-3">
                        <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="col-3">
                        <?= $form->field($model, 'active')->dropdownList(
                            [1 => 'Yes', 0 => 'No']); 
                        ?>
                    </div>
                </div>
            </div>
        <div class="tab-pane" id="recentPosts">   
            <div class="row" >   
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
                <div class="col-4">
                    <?= $form->field($model, 'title_'.$value['country_code'])->textInput(['maxlength' => true])->label('Title '.$value['full_title']) ?>
              
                    <?= $form->field($model, 'text_'.$value['country_code'])->textarea(['maxlength' => true])->label('Text '.$value['full_title']) ?>
                </div>        
                <?php 
                    }else{
                ?>
                    <?=  $form->field($model, 'title_'.$valLang)->hiddenInput(['value'=> 'n/a'])->label(false); ?>
                    <?=  $form->field($model, 'text_'.$valLang)->hiddenInput(['value'=> 'n/a'])->label(false); ?>
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
