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

}elseif(empty(Helpers::arrayTeam())){

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

    <?php $form = ActiveForm::begin([
            'id' => 'submit-location',
            //'validateOnSubmit' => true,
            //'type' => ActiveForm::TYPE_VERTICAL,
        ]);                        
    ?>  
    <div class="row pb-5"> 
        <div class="col">   
            <div class="form-group field-services-locationcodearr">
                <label class="control-label">
                    <?=

                        $form->field($model, 'locationCodeArr')->checkboxList( 

                        Helpers::dropdownCompanyLocations(),
                            [

                                'item'=>function ($index, $label, $name, $checked, $value){

                                    return '<label>
                                                <input type="checkbox" name="'.$name.'"  onchange= "getTeam(this)" value="'.$value.'" '.(($checked == 1) ? 'checked' : '').'> 
                                                    '.$label.'
                                                </label><br>';

                                }

                            ]
                            )->label(Yii::t('app', 'company_code_location'));
                    ?>
                </div>
        
            <a href="<?= Url::toRoute('company-locations/index') ?>" target="_blank"  class="pb-5">
                <?= Yii::t('app', 'create_company_location') ?>	                    
            </a>         
        </div>


    <?php
    
        $i = 0;
        $companyLocationArr =   Helpers::dropdownCompanyLocations();

        foreach($companyLocationArr as $locationCode => $locationName){

    ?>
               
        
            <?php
                $teamMembers = Helpers::dropdownTeam(
                    [                        
                        'company_code' => Yii::$app->user->identity->company_code, 
                        'level' => 'team', 
                        'location_code'=> $locationCode
                    ]);
            ?>

            <?php
                $display = 'style="display:none"';
                foreach($model->locationCodeArr as $location){                    
                    if($location == $locationCode){
                        $display = '';
                        break;                   
                    }
                }
            ?>

         
        <div class="col"  id="team-<?= $locationCode ?>" <?= $display  ?> >         
            <div class="form-group field-services-usernamearr" >   
                <label class="control-label">
                    <?= Yii::t('app', 'team_members').' : '.$locationName; ?>
                </label>          
                <div id="services-usernamearr">
                    <label>
                        <input id="checkbox-all-<?= $locationCode ?>" type="checkbox"  data-location="<?= $locationCode ?>" onclick="checkboxAll(this)"> 
                        <?= Yii::t('app', 'choose_all') ?>
                    </label><br>
                    <?php foreach($teamMembers as $guid => $name){ ?>
                        <?php           
                            $checked = '';

                            if(in_array($guid, $model->usernameArr)) {
                                $checked = 'checked';
                            }else{
                                $checked = '';
                            }
                        ?>
                        <label>
                            <input id="team-<?= $locationCode ?>-<?= $guid ?>" type="checkbox" name="Services[usernameArr][]" value="<?= $guid ?>" <?= $checked ?>>
                            <?= $name ?>
                        </label><br>
                    <?php } ?>
                </div>
                <div class="help-block"></div>
            </div>  
            <a href="<?= Url::toRoute('team/index') ?>" target="_blank"  class="pb-5">
                <?= Yii::t('app', 'create_team') ?>	 
            </a>  
        </div>
      
        <?php
            $i++;
            }

        ?>         

        
   
    </div>
    <div class="row"> 
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
                      ['prompt'=> Yii::t('app', 'select_duration')],      
                   )->label(Yii::t('app', 'duration'));;
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

 
    <div class="form-group pt-3">
        <?=  Helpers::displaySaveButtonsView($model); ?> 
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
}
?>