<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\Query;
use yii\helpers\Url;

$query = new Query;
$teamArr = $query->select([
        'username', 
        'first_name',      
        'surname'   
    ])
->from('team')    
->where(['company_code' => Yii::$app->user->identity->company_code])
->all();

$arrTeam = array();

foreach($teamArr as $value){
    $arrTeam[$value['username']] = $value['first_name'].' '.$value['surname'];;
}



$serviceArr = $query->select([
    'category_code', 
    'page_code_title',     
])
->from('services_category')    
->where(['company' => Yii::$app->user->identity->company_code])
->all();

$arrServiceCat = array();

foreach($serviceArr as $value){
    $arrServiceCat[$value['category_code']] = Yii::t('app',$value['page_code_title']);
}


$locationArr = $query->select([
    'location_code', 
    'full_name',
    'location',
])
->from('company_locations')    
->where(['company_code' => Yii::$app->user->identity->company_code])
->all();

$arrLocations = array();

foreach($locationArr as $value){
    $arrLocations[$value['location_code']] = $value['full_name'] . ' ('.$value['location'].')';
}



/** @var yii\web\View $this */
/** @var app\models\Services $model */
/** @var yii\widgets\ActiveForm $form */



if(empty($countCat->id)){
?>

<div class="services-category-index">

    <p>
        <?= Html::a('Create Services Category', ['services-category/create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>


<?php
}else{
?>

<div class="services-form">

    <?php $form = ActiveForm::begin(); ?>
        <div class="row">      
            <div class="col">             
                <?= $form->field($model, 'locationCodeArr')->checkBoxList($arrLocations, ['separator' => '<br>']); ?>   
                <a href="<?= Url::toRoute('company-locations/index') ?>" target="_blank"  class="pb-5">
                    <?= Yii::t('app', 'Create Location') ?>	
                    
                </a>         
            </div>
            <div class="col">               
                <?= $form->field($model, 'usernameArr')->checkBoxList($arrTeam, ['separator' => '<br>']); ?>
                <a href="<?= Url::toRoute('team/index') ?>" target="_blank"  class="pb-5">
                    <?= Yii::t('app', 'Add Team Member') ?>	
                </a>    
            </div>
            <div class="col">
                <?= $form->field($model, 'category_code')->dropdownList($arrServiceCat,
                        ['prompt'=>'Select Category']); 
                ?>  
                <a href="<?= Url::toRoute('services-category/index') ?>" target="_blank"  class="pb-5">
                    <?= Yii::t('app', 'Create Category') ?>	
                </a>    
            </div>           
        </div>   
        <div class="row">   
            <div class="col"> 
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            </div>   
            <div class="col"> 
                <?= $form->field($model, 'title_pt')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col"> 
                <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
            </div>      
        </div>
        <div class="row">  
            <div class="col"> 
                <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
            </div>    
            <div class="col"> 
                <?= $form->field($model, 'text_pt')->textarea(['rows' => 6]) ?>
            </div> 
            <div class="col"> 
                <?= $form->field($model, 'text_en')->textarea(['rows' => 6]) ?>
            </div>  
        </div>
        <div class="row">      
            <div class="col"> 
                <?= $form->field($model, 'price')->textInput() ?>
            </div>
            <div class="col"> 
                <?= $form->field($model, 'order')->textInput() ?>
            </div>
            <div class="col"> 
                <?= $form->field($model, 'active')->dropdownList(
                    [
                    1 => Yii::t('app', 'yes'),
                        0 => Yii::t('app', 'no'),
                    ]); 
                ?>
            </div>    
        </div>    

 
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
}
?>