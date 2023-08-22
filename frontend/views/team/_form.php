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
        <h4 class="mb-sm-0 font-size-18 pb-4 pt-5">           
            <?= Yii::t('app', ' Dados do Colaborador') ?>
        </h4>  
        <div class="col">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'value' => 'teamuser_'.Helpers::generateRandowHumber()]) ?>
        </div>
        <div class="col">           
            <?= $form->field($model, 'title')->dropdownList(
                Helpers::dropdownTitle(),
                ['prompt'=>'Select Location']); 
            ?> 
        </div>        
        <div class="col">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
        </div>  
        <div class="col">
            <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true]) ?>
        </div> 
        <div class="col">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>  
    </div>
    <div class="row">
   
        <div class="col">          
            <?= $form->field($model, 'location')->dropdownList(Helpers::dropdownCompanyLocations(),
                ['prompt'=>'Select Location']); 
            ?> 
        </div>  
        <div class="col">
            <?= $form->field($model, 'job_title')->textInput(['maxlength' => true]) ?>
        </div>   
        <div class="col">
            <?= $form->field($model, 'title_pt')->textInput(['maxlength' => true]) ?>
        </div>   
        <div class="col">
            <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
        </div>  

        <div class="col">           
            <?= $form->field($model, 'time_window')->dropdownList(
                Helpers::dropdownTimeWindow(),
                ['prompt'=>'Select Time Window']); 
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
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'text')->textarea(['maxlength' => true]) ?>
        </div>    
    </div>


    <div class="row">
        <h4 class="mb-sm-0 font-size-18 pb-4  pt-5" >
            <?= Yii::t('app', 'Redes Sociais') ?>
        </h4>  
        <div class="col">
            <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'pinterest')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'instagram')->textInput(['maxlength' => true]) ?>
        </div>         
    </div>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'twitter')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'tiktok')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'linkedin')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'youtube')->textInput(['maxlength' => true]) ?>
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
