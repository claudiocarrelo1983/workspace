<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\Query;
use yii\helpers\Url;
use common\Helpers\Helpers;

$activeLanguagesArr = Helpers::activeLanguages();

/** @var yii\web\View $this */
/** @var app\models\Services $model */
/** @var yii\widgets\ActiveForm $form */



if(empty(Helpers::dropdownServiceCategory())){
?>
<p>
    <?= Yii::t('app','create_services_category_first') ?>
</p> 
<div class="row pt-4">
    <div class="col">     
        <div class="services-category-index">
            <p>
                <?= Html::a(
                    Yii::t('app', 'create_services_category_button'),
                    ['services-category/create'], 
                    ['class' => 'btn btn-success']) 
                ?>
            </p>
        </div>
    </div>
</div>


<?php
}elseif(empty(Helpers::dropdownTeam())){
?>
    <p>
        <?= Yii::t('app','create_team_first') ?>
    </p> 
    <div class="row pt-4">
        <div class="col">
            <div class="services-category-index">
                <p>
                    <?= Html::a(
                        Yii::t('app', 'create_team'),
                        ['team/create'], 
                        ['class' => 'btn btn-success']) 
                    ?>
                </p>
            </div>
        </div>
    </div>
<?php
}else{
?>
<div class="services-form">

    <?php $form = ActiveForm::begin(); ?>
        <div class="row">      
            <div class="col">             
                <?= $form->field($model, 'locationCodeArr')->checkBoxList(Helpers::dropdownCompanyLocations(),
                    ['prompt'=> Yii::t('app', 'select_company_location')], 
                    ['separator' => '<br>'])->label(Yii::t('app', 'company_code_location')); 
                ?>   
                <a href="<?= Url::toRoute('company-locations/index') ?>" target="_blank"  class="pb-5">
                    <?= Yii::t('app', 'create_company_location') ?>	                    
                </a>         
            </div>
            <div class="col">               
                <?= 
                    $form->field($model, 'usernameArr')->checkBoxList(
                    Helpers::dropdownTeam(),
                    ['prompt'=> Yii::t('app', 'select_username'),'separator' => '<br>'])->label(Yii::t('app', 'team_members')); 
                ?>
                <a href="<?= Url::toRoute('team/index') ?>" target="_blank"  class="pb-5">
                    <?= Yii::t('app', 'create_team') ?>	 
                </a>    
            </div>
            <div class="col">
                <?= $form->field($model, 'category_code')->dropdownList(
                        Helpers::dropdownServiceCategory(),
                        ['prompt'=> Yii::t('app', 'select_services_category')]
                       )->label(Yii::t('app', 'service_cat')); 
                ?>  
                <a href="<?= Url::toRoute('services-category/index') ?>" class="pb-5">
                    <?= Yii::t('app', 'create_services_category_button') ?>	
                </a>    
            </div>           
        </div>   
        <div class="row mt-4">   
            <div class="col"> 
                <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label(Yii::t('app', 'description')); ?>
            </div>              
            <?php foreach($activeLanguagesArr as $language => $value): ?>
                <?php if($value == 1){ ?>
                    <div class="col"> 
                        <?= $form->field($model, 'title_'.$language)->textInput(['maxlength' => true])->label(Yii::t('app', 'title_'.$language)); ?>
                    </div>
                <?php } ?>  
            <?php endforeach; ?>             
        </div>
        <div class="row mt-4">  
            <div class="col"> 
                <?= $form->field($model, 'text')->textarea(['rows' => 6])->label(Yii::t('app', 'description_text')); ?>
            </div>    
            <?php foreach($activeLanguagesArr as $language => $value): ?>
                <?php if($value == 1){ ?>
                    <div class="col"> 
                        <?= $form->field($model, 'text_'.$language)->textarea(['rows' => 6])->label(Yii::t('app', 'text_'.$language)); ?>
                    </div>     
                <?php } ?>   
            <?php endforeach; ?>  
        </div>
        <div class="row mt-4">      
            <div class="col"> 
                <?= $form->field($model, 'price')->textInput()->label(Yii::t('app', 'price')); ?>
            </div>   
            <div class="col"> 
                <?= $form->field($model, 'price_range')->textInput()->label(Yii::t('app', 'price_range')); ?>
            </div>        
            <div class="col"> 
                <?= $form->field($model, 'time')->dropdownList(            
                    Helpers::timeSheddulleArr(),
                    ['prompt'=> Yii::t('app', 'select_duration')])->label(Yii::t('app', 'duration'));;
                ?>
            </div>
            <div class="col"> 
                <?= $form->field($model, 'order')->textInput()->label(Yii::t('app', 'order')); ?>
            </div>
            <div class="col"> 
                <?= $form->field($model, 'active')->dropdownList(
                    [
                        1 => Yii::t('app', 'yes'),
                        0 => Yii::t('app', 'no'),
                    ])->label(Yii::t('app', 'active'));; 
                ?>
            </div>    
        </div>    

 
    <div class="form-group mt-4">
        <?= Html::submitButton(Yii::t('app', 'submit_button'), ['class' => 'btn btn-success']) ?>       
        <?= Html::a(Yii::t('app', 'back_button'), ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
}
?>