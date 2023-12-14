<?php


use yii\helpers\Html;
use yii\helpers\Url;
use kartik\date\DatePicker;
use common\Helpers\Helpers;
use yii\widgets\ActiveForm;

$companyArr = Helpers::myCompanyArr();

?>

<?= $this->render('@frontend/views/client/client-booking/header', ['headerTransparent' => 1, 'model' => $model, 'companyArr' => $companyArr]); ?>

<div id="examples" class="container  pb-5 pt-5">
    <?= $this->render('@frontend/views/client/client-booking/links'); ?>
    <?= $this->render('@frontend/views/client/team-schedule/links'); ?>
 

        <div class="row pt-">   
            <div class="col-lg-12">

                <?php $form = ActiveForm::begin(); ?>  
                    <?= $form->field($model, 'company_code')->hiddenInput(['value' => 'c42912795124624832670'])->label(false)  ?>
                    <?= $form->field($model, 'type')->hiddenInput(['value' => 'message'])->label(false) ?>       
                    <div class="row">
                        <div class="form-group col-lg-2">                     
                            <?= $form->field($model, 'title')->dropDownList(Helpers::dropdownTitle(),['class' => 'form-control text-3 h-auto py-2','maxlength' => true]) ?>
                        </div>
                        <div class="form-group col-lg-5">                     
                            <?= $form->field($model, 'first_name')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true]) ?>
                        </div>
                        <div class="form-group col-lg-5">                     
                            <?= $form->field($model, 'last_name')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true]) ?>
                        </div>
                    </div>
                    <div class="row pt-5">
                        <div class="form-group col-lg-4">
                            <?= $form->field($model, 'email')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true]) ?>
                       </div>
                        <div class="form-group col-lg-4">
                            <?= $form->field($model, 'contact_number')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true]) ?>
                        </div>
                        <div class="form-group col-lg-4">
                            <?= $form->field($model, 'nif')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true]) ?>
                        </div>
                    </div>
               
                    <div class="row pt-5">
                        <div class="form-group col-lg-4">   
                            <label for="clients-gender">Date of Birth:</label>
                            <?php                 
            
                                echo DatePicker::widget([
                                    'model' => $model,                                                                                                      
                                    'name' => 'dob',    
                                    'id' => 'date-calendar-search', 
                                    'removeButton' => false,
                                    'value' => (empty($date) ? '' : date('d-m-Y', strtotime($date))),
                                    'options' => [
                                        'placeholder' => 'Select date...',
                                        'class' => ' form-control text-4 h-auto py-1'
                                    ],
                                    'pluginOptions' => [  
                                        'autoclose' => true,           
                                        'format' => 'dd-mm-yyyy',
                                        'todayHighlight' => true
                                    ]                   
                                ]);               
                            ?>  
                        </div>  
                    </div>

                    <div class="row pt-5">
                        <div class="form-group col-lg-4">
                            <?= $form->field($model, 'username')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true]) ?>
                       </div>
                        <div class="form-group col-lg-4">
                            <?= $form->field($model, 'password')->textInput(['type' => 'password', 'class' => 'form-control text-3 h-auto py-2','maxlength' => true]) ?>
                        </div>                
                    </div>
                    <div class="row">                 
                        <div class="form-group pt-3">
                            <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-modern']) ?>
                        </div>
                    </div>         
                <?php ActiveForm::end(); ?>

            </div>
        </div>



</div>