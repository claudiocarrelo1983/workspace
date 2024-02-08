<?php


use yii\helpers\Html;
use yii\helpers\Url;
use kartik\date\DatePicker;
use common\Helpers\Helpers;
use yii\widgets\ActiveForm;

$companyArr = Helpers::myCompanyArr();

?>

<?= $this->render('@frontend/views/client/client-booking/header', ['headerTransparent' => 1, 'model' => $model, 'companyArr' => $companyArr]); ?>

<div id="examples" class="container  pb-5">
    <?= $this->render('@frontend/views/client/booking/steps', ['type' => 'client-profile']); ?>    
        <div class="row">  
            <div class="col  text-center ">  
                <div class=" box-content featured-box  text-start mt-0"> 
                    <div class="col-lg-12 py-5 px-3" >  
              
                <h1>
                    <?= Yii::t('app','profile') ?>
                </h1>
                <?php $form = ActiveForm::begin(); ?>               
                    <div class="row">
                        <div class="form-group col-lg-2">                     
                            <?= $form->field($model, 'title')->dropDownList(Helpers::dropdownTitle(),['class' => 'form-control text-3 h-auto py-2','maxlength' => true]) ?>
                        </div>
                        <div class="form-group col-lg-5">                     
                            <?= $form->field($model, 'first_name')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true])->label(Yii::t('app','first_name'))?>
                        </div>
                        <div class="form-group col-lg-5">                     
                            <?= $form->field($model, 'last_name')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true])->label(Yii::t('app','last_name')) ?>
                        </div>
                    </div>
                    <div class="row pt-5">
                        <div class="form-group col-lg-4">
                            <?= $form->field($model, 'email')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true])->label(Yii::t('app','email')) ?>
                       </div>
                        <div class="form-group col-lg-4">
                            <?= $form->field($model, 'contact_number')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true])->label(Yii::t('app','contact_number')) ?>
                        </div>
                        <div class="form-group col-lg-4">
                            <?= $form->field($model, 'nif')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true])->label(Yii::t('app','nif')) ?>
                        </div>
                    </div>
               
                    <div class="row pt-5">
                        <div class="form-group col-lg-4">   
                            <label for="clients-gender">
                                <?= Yii::t('app','date_of_birth') ?>:
                            </label>
                    
                            <?= DatePicker::widget([
                                    'model' => $model,                                                                                                      
                                    'name' => 'dob',    
                                    'id' => 'date-calendar-search', 
                                    'removeButton' => false,
                                    'value' => (empty($model->dob) ? '' : date('d-m-Y', strtotime($model->dob))),
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
                            <?= $form->field($model, 'username')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true])->label(Yii::t('app','username'))  ?>
                       </div>
                        <div class="form-group col-lg-4">
                            <?= $form->field($model, 'password')->textInput(['type' => 'password', 'class' => 'form-control text-3 h-auto py-2','maxlength' => true])->label(Yii::t('app','password')) ?>
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
    </div>
</div>