<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\Query;
use yii\helpers\Url;
use common\Helpers\Helpers;


/** @var yii\web\View $this */
/** @var app\models\Services $model */
/** @var yii\widgets\ActiveForm $form */



if(empty(Helpers::dropdownServiceCategory())){
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
                <?= $form->field($model, 'locationCodeArr')->checkBoxList(Helpers::dropdownCompanyLocations(), ['separator' => '<br>']); ?>   
                <a href="<?= Url::toRoute('company-locations/index') ?>" target="_blank"  class="pb-5">
                    <?= Yii::t('app', 'Create Location') ?>	
                    
                </a>         
            </div>
            <div class="col">               
                <?= $form->field($model, 'usernameArr')->checkBoxList(Helpers::dropdownTeam(), ['separator' => '<br>']); ?>
                <a href="<?= Url::toRoute('team/index') ?>" target="_blank"  class="pb-5">
                    <?= Yii::t('app', 'Add Team Member') ?>	
                </a>    
            </div>
            <div class="col">
                <?= $form->field($model, 'category_code')->dropdownList(Helpers::dropdownServiceCategory(),
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
                <?= $form->field($model, 'time')->dropdownList(
                    Helpers::timeSheddulleArr());
                ?>
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