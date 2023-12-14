<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\CompanyLocations $model */
/** @var yii\widgets\ActiveForm $form */

$weekDays = array('monday', 'tuesday', 'wednesday','thursday','friday', 'saturday','sunday');


?>

<div class="company-locations-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'full_name')->textInput(['maxlength' => true])->label(Yii::t('app', 'full_name')) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'description')->textarea(['rows' => 6])->label(Yii::t('app', 'description')) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'title_pt')->textInput(['maxlength' => true])->label(Yii::t('app', 'title_pt')) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'description_pt')->textInput(['maxlength' => true])->label(Yii::t('app', 'description_pt')) ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'title_en')->textInput(['maxlength' => true])->label(Yii::t('app', 'title_en')) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'description_en')->textarea(['rows' => 6])->label(Yii::t('app', 'description_en')) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'cae')->textInput(['maxlength' => true])->label(Yii::t('app', 'cae')) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true])->label(Yii::t('app', 'contact_number')) ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label(Yii::t('app', 'email')) ?>
        </div>    
        <div class="col">
            <?= $form->field($model, 'address_line_1')->textInput(['maxlength' => true])->label(Yii::t('app', 'address_line_1')) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'address_line_2')->textInput(['maxlength' => true])->label(Yii::t('app', 'address_line_2')) ?>
        </div>
        <div class="col">            
            <?= $form->field($model, 'city')->textInput(['maxlength' => true])->label(Yii::t('app', 'city')) ?>

        </div>
    </div>
    <div class="row">
        <div class="col">
        <?= $form->field($model, 'postcode')->textInput(['maxlength' => true])->label(Yii::t('app', 'postcode')) ?>

        </div>
        <div class="col">
        <?= $form->field($model, 'location')->textInput(['maxlength' => true])->label(Yii::t('app', 'location')) ?>

        </div>
        <div class="col">
            <?= $form->field($model, 'country')->dropdownList(
                Helpers::countriesDropdownArr(),
                ['prompt'=> Yii::t('app', 'select_country')]); 
            ?> 
        </div>
        <div class="col">
        <?= $form->field($model, 'google_location')->textarea(['rows' => 6])->label(Yii::t('app', 'google_location')) ?>

        </div>
        <div class="col">
            <?= $form->field($model, 'active')->dropdownList(
                [
                    1 => Yii::t('app', 'yes'),
                    0 => Yii::t('app', 'no'),
                ])->label(Yii::t('app', 'active')); 
            ?>
        </div>
    </div>
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
                                        Helpers::dropdownSheddulleHours(),
                                        ['class' => 'form-select form-control h-auto py-2','prompt'=> Yii::t('app', 'select_time')])->label(false)
                                ?>
                            </td>
                            <td>
                                <?=  
                                    $form->field($model, $value.'_end_hour')->dropdownList(
                                        Helpers::dropdownSheddulleHours(),
                                        ['class' => 'form-select form-control h-auto py-2','prompt'=> Yii::t('app', 'select_time')])->label(false)
                                ?>
                            </td>
                            <td>
                                <?=  
                                    $form->field($model, $value.'_starting_break')->dropdownList(
                                        Helpers::dropdownSheddulleHours(),
                                        ['class' => 'form-select form-control h-auto py-2','prompt'=> Yii::t('app', 'select_time')])->label(false)
                                ?>
                            </td>
                            <td>
                                <?=  
                                    $form->field($model, $value.'_end_break')->dropdownList(
                                        Helpers::dropdownSheddulleHours(),
                                        ['class' => 'form-select form-control h-auto py-2','prompt'=>'Select Time'])->label(false)
                                ?>
                            </td>
                        </tr>
                    <?php } ?>					
                    
                </tbody>
            </table>

    </div>


    <div class="form-group pt-3">
         <?=  Helpers::displaySaveButtonsView($model); ?> 
    </div>

    <?php ActiveForm::end(); ?>

</div>
