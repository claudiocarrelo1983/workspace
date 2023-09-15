<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\Query;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\Team $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="team-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">   
        <div class="col">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'value' => 'teamuser_'.Helpers::generateRandowHumber()])->label(Yii::t('app', 'username')) ?>
        </div>
        <div class="col">           
            <?= $form->field($model, 'title')->dropdownList(
                Helpers::dropdownTitle(),
                ['prompt'=> Yii::t('app', 'select_title')]
                )->label(Yii::t('app', 'title')); 
            ?> 
        </div> 
        <div class="col">           
            <?= $form->field($model, 'gender')->dropdownList(
                Helpers::dropdownGender(),
                ['prompt'=> Yii::t('app', 'select_gender')]
                )->label(Yii::t('app', 'gender')); 
            ?> 
        </div>    
        <div class="col">
            <?= $form->field($model, 'password')->textInput(['maxlength' => true])->label(Yii::t('app', 'password')) ?>
        </div>     
        <div class="col">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true])->label(Yii::t('app', 'first_name')) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true])->label(Yii::t('app', 'last_name')) ?>
        </div>  
        <div class="col">
            <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true])->label(Yii::t('app', 'contact_number')) ?>
        </div> 
        <div class="col">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label(Yii::t('app', 'email')) ?>
        </div>  
    </div>
    <div class="row">
   
        <div class="col">          
            <?= $form->field($model, 'location')->dropdownList(
                Helpers::dropdownCompanyLocations(),
                ['prompt'=> Yii::t('app', 'select_company_location')]
                )->label(Yii::t('app', 'location')); 
            ?> 
        </div>  
        <div class="col">
            <?= $form->field($model, 'job_title')->textInput(['maxlength' => true])->label(Yii::t('app', 'job_title')) ?>
        </div>   
        <div class="col">
            <?= $form->field($model, 'title_pt')->textInput(['maxlength' => true])->label(Yii::t('app', 'title_pt')) ?>
        </div>   
        <div class="col">
            <?= $form->field($model, 'title_en')->textInput(['maxlength' => true])->label(Yii::t('app', 'title_en')) ?>
        </div>  

        <div class="col">           
            <?= $form->field($model, 'time_window')->dropdownList(
                Helpers::dropdownTimeWindow(),
                ['prompt'=> Yii::t('app', 'time_window')]
                )->label(Yii::t('app', 'time_window')); 
            ?> 
        </div>  
        <div class="col">            
            <?= $form->field($model, 'active')->dropdownList(
                Helpers::dropdownActive(),
                ['prompt'=> Yii::t('app', 'select_active')]
                )->label(Yii::t('app', 'active')); 
            ?>
        </div> 
    </div>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'text')->textarea(['maxlength' => true])->label(Yii::t('app', 'text')) ?>
        </div>    
    </div>


    <div class="row">
        <h4 class="mb-sm-0 font-size-18 pb-4  pt-5" >
            <?= Yii::t('app', 'Redes Sociais') ?>
        </h4>  
        <div class="col">
            <?= $form->field($model, 'website')->textInput(['maxlength' => true])->label(Yii::t('app', 'website')) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'facebook')->textInput(['maxlength' => true])->label(Yii::t('app', 'facebook')) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'pinterest')->textInput(['maxlength' => true])->label(Yii::t('app', 'pinterest')) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'instagram')->textInput(['maxlength' => true])->label(Yii::t('app', 'instagram')) ?>
        </div>         
    </div>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'twitter')->textInput(['maxlength' => true])->label(Yii::t('app', 'twitter')) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'tiktok')->textInput(['maxlength' => true])->label(Yii::t('app', 'tiktok')) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'linkedin')->textInput(['maxlength' => true])->label(Yii::t('app', 'linkedin')) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'youtube')->textInput(['maxlength' => true])->label(Yii::t('app', 'youtube')) ?>
        </div>       
    </div>



    <div class="row">
        <div clasS="col pt-5">
            <h4 class="mb-sm-0 font-size-18 pb-4  pt-5">
                <?= Yii::t('app', 'sheddule_title') ?>    
            </h4>
            <table class="table table-sm">
                <thead class="text-4">
                    <tr>
                        <th class="py-4"><?= Yii::t('app', 'sheddule_week_day') ?></th>
                        <th class="py-4"><?= Yii::t('app', 'sheddule_open') ?></th>
                        <th class="py-4"><?= Yii::t('app', 'sheddule_opening_time') ?></th>
                        <th class="py-4"><?= Yii::t('app', 'sheddule_closing_time') ?></th>
                        <th class="py-4"><?= Yii::t('app', 'sheddule_starting_break') ?></th>
                        <th class="py-4"><?= Yii::t('app', 'sheddule_ending_break') ?></th>
                    </tr>
                </thead>
                    <tbody>
                        <?php foreach($weekDays as $value){ ?>
                            <tr>
                                <td class="text-4"><?= Yii::t('app', $value) ?></td>
                                <td>                        
                                    <?= $form->field($model, $value.'_open_checkbox')->checkBox(['label' => '', 'value' => '1']) ?>
                                </td>
                                <td>
                                    <?=  
                                        $form->field($model, $value.'_starting_hour')->dropdownList(
                                            Helpers::dropdownSheddulleHours($serviceTimeMin),
                                            ['class' => 'form-select form-control h-auto py-2','prompt'=>'Select Time'])->label(false)
                                    ?>
                                </td>
                                <td>
                                    <?=  
                                        $form->field($model, $value.'_end_hour')->dropdownList(
                                            Helpers::dropdownSheddulleHours($serviceTimeMin),
                                            ['class' => 'form-select form-control h-auto py-2','prompt'=>'Select Time'])->label(false)
                                    ?>
                                </td>
                                <td>
                                    <?=  
                                        $form->field($model, $value.'_starting_break')->dropdownList(
                                            Helpers::dropdownSheddulleHours($serviceTimeMin),
                                            ['class' => 'form-select form-control h-auto py-2','prompt'=>'Select Time'])->label(false)
                                    ?>
                                </td>
                                <td>
                                    <?=  
                                        $form->field($model, $value.'_end_break')->dropdownList(
                                            Helpers::dropdownSheddulleHours($serviceTimeMin),
                                            ['class' => 'form-select form-control h-auto py-2','prompt'=>'Select Time'])->label(false)
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>				
                    </tbody>
                </table>
            </div>
        </div>   

    <div class="form-group pt-3">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
