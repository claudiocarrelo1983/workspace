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
        <h4 class="mb-sm-0 font-size-18 pb-2  pt-3" >
            <?= Yii::t('app', 'profile_login_details') ?>
        </h4>  
        <div class="col-lg-4">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'value' => 'teamuser_'.Helpers::generateRandowHumber()])->label(Yii::t('app', 'username')) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'password')->textInput(['type'=>'password', 'maxlength' => true])->label(Yii::t('app', 'password')) ?>
        </div>
    </div>
    <div class="row"> 
        <h4 class="mb-sm-0 font-size-18 pb-2  pt-5" >
            <?= Yii::t('app', 'profile_user_details') ?>
        </h4>   
        <div class="col-lg-4">           
            <?= $form->field($model, 'title')->dropdownList(
                Helpers::dropdownTitle(),
                ['class'=> 'form-control', 'prompt'=> Yii::t('app', 'select_title')])->label(Yii::t('app', 'title')); 
            ?> 
        </div>        
        <div class="col-lg-4">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true])->label(Yii::t('app', 'first_name')) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true])->label(Yii::t('app', 'surname')) ?>
        </div>  
        <div class="col-lg-4">
            <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true])->label(Yii::t('app', 'contact_number')) ?>
        </div> 
        <div class="col-lg-4">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label(Yii::t('app', 'email')) ?>
        </div>  
    </div>
    <div class="row"> 
        <h4 class="mb-sm-0 font-size-18 pb-2  pt-5" >
            <?= Yii::t('app', 'profile_user_address') ?>
        </h4>   
        <div class="col-lg-4">
            <?= $form->field($model, 'address_line_1')->textInput(['maxlength' => true])->label(Yii::t('app', 'address_line_1')) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'address_line_2')->textInput(['maxlength' => true])->label(Yii::t('app', 'address_line_2')) ?>
        </div>  
        <div class="col-lg-4">
            <?= $form->field($model, 'city')->textInput(['maxlength' => true])->label(Yii::t('app', 'city')) ?>
        </div> 
        <div class="col-lg-4">
            <?= $form->field($model, 'postcode')->textInput(['maxlength' => true])->label(Yii::t('app', 'postcode')) ?>
        </div> 
        <div class="col-lg-4">
            <?= $form->field($model, 'location')->textInput(['maxlength' => true])->label(Yii::t('app', 'location')) ?>
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
