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
    'username', 
    'name'
    ])
->from('user')    
->all();

$arrUsers = array();

foreach($users as $user){
    $arrUsers[$user['username']] = $user['name'];
}

$countries = $tagQuery->select([
    'country_code',
    'full_title' 
    ])
->from('countries')    
->all();


$countryUsers = array();

foreach($countries as $value){
    $countryUsers[$value['country_code']] = $value['full_title'];
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
    'description'
    ])
->from('blogs_category')    
->all();

$tagsArr = array();

foreach($tags as $tag){
    $tagsArr[$tag['tag']] = $tag['description'];
}

?>

<div class="blogs-form">


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    
    <?= $form->field($model, 'imageFile')->fileInput()->hint('The image needs to be 900 x 500 ') ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alt')->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'username')->dropdownList($arrUsers,
    ['prompt'=>'Select User']); ?> 

    <?= $form->field($model, 'tagsArr')->checkBoxList($tagsArr, ['separator' => '<br>']); ?>

    <a href="<?= Url::toRoute('blogscategory/create') ?>" target="_blank"  class="pb-5">
        <?= Yii::t('app', 'Create New Category') ?>	
    </a>

    <?= $form->field($model, 'country_code')->radioList(
           $countryUsers
        ,                     
        array('required','separator' => "</br>" ))->label('Language');
    ?>  
    <a href="<?= Url::toRoute('countries/create') ?>" target="_blank"  class="pb-5">
        <?= Yii::t('app', 'Create  new Country') ?>	
    </a>


    <?= $form->field($model, 'active')->dropdownList(
        [1 => 'Yes', 0 => 'No'],
    ['prompt'=>'Active']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
