<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use common\models\Newsletter;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use common\Helpers\Helpers;

$company = Yii::$app->user->identity->company_code;

$inc = 0;
$arrFaqs = [];

foreach ($faqs as $key => $value):
    $arrFaqs[$value['category']][] = $value;
endforeach;  
?>

<!-- start page title --> 
<?= Helpers::displayAminBreadcrumbs('message', 'faqs-admin') ?>

<div class="checkout-tabs">
    <div class="row">
        <div class="col-lg-2">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <?php foreach (array_keys($arrFaqs) as $key => $category): ?> 
                    <a class="nav-link <?= (($key == 0) ? 'active' : '') ?>" id="v-pills-<?= $category ?>-tab" data-bs-toggle="pill" href="#v-pills-<?= $category ?>" role="tab" aria-controls="v-pills-<?= $category ?>" aria-selected="false"> 
                        
                        <?php if($category == 'general_questions'){ ?>
                                <i class="bx bx-question-mark d-block check-nav-icon mt-4 mb-2"></i>
                        <?php }else{ ?>
                                <i class="bx bx-check-shield d-block check-nav-icon mt-4 mb-2"></i>
                        <?php } ?>

                   
                        <p class="fw-bold mb-4">
                            <?= Yii::t('app', $category) ?>
                        </p>
                    </a>             
                <?php endforeach; ?>            
                <a class="nav-link" id="v-pills-support-tab" data-bs-toggle="pill" href="#v-pills-support" role="tab" aria-controls="v-pills-support" aria-selected="false">
                    <i class="bx bx-support d-block check-nav-icon mt-4 mb-2"></i>
                    <p class="fw-bold mb-4">
                        <?= Yii::t('app', 'support') ?>
                    </p>
                </a>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content" id="v-pills-tabContent">                                             
                        <?php foreach ($arrFaqs as $key => $questions): ?> 
                            <div class="tab-pane fade  <?= (($inc == 0) ? 'active show' : '') ?> " id="v-pills-<?= $key ?>" role="tabpanel" aria-labelledby="v-pills-<?= $key ?>-tab">
                                <?php $inc++; ?>
                                <h4 class="card-title mb-3">
                                    <?= Yii::t('app', $key) ?>
                                </h4>                           
                                <?php foreach ($questions as $key => $value): ?>                                   
                                    <div class="faq-box d-flex mb-2">
                                        <div class="flex-shrink-0 me-3 faq-icon">
                                            <i class="bx bx-help-circle font-size-20 text-success"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-15">
                                                <?= Yii::t('app', $value['page_code_question']) ?>
                                            </h5>
                                            <p class="text-muted">
                                                <?= Yii::t('app', $value['page_code_answer']) ?>                                           
                                            </p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>                          
                            </div>
                        <?php endforeach; ?>  
                        
                        <div class="tab-pane fade <?= ((count($arrFaqs) == 0) ? 'active show' : '') ?>" id="v-pills-support" role="tabpanel" aria-labelledby="v-pills-support-tab">
                            <h4 class="card-title mb-5">
                                <?= Yii::t('app', 'support') ?>
                            </h4>
                        
                            <div class="">
                                <div>
                                    <div class="row">
                                        <div class="col">                                        
                                            <div class="flex-grow-1">                                        
                                                <h5 class="font-size-15">
                                                    <i class="bx bx-help-circle font-size-16 text-success"></i>
                                                    <span class="pl-1">Helpdesk:</span>
                                                </h5>
                                                <p class="text-muted">helpdesk@mycalendar.com</p>
                                            </div>
                                        </div>
                                        <div class="col">                                       
                                            <div class="flex-grow-1">
                                                <h5 class="font-size-15">
                                                    <i class="bx bx-help-circle font-size-16 text-success"></i>
                                                    <span class="pl-1">Business Issues:</span>
                                                </h5>                                       
                                                <p class="text-muted">admin@mycalendar.com</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <hr class="my-4"></hr>
                                    <div>     
                                        
                                        <?php $form = ActiveForm::begin(); ?>                                                                            
                                            <div class="row">
                                                <div class="form-group col-lg-6">                     
                                                    <?= $form->field($model, 'full_name')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true])->label(Yii::t('app', 'full_name')) ?>
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <?= $form->field($model, 'email')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true])->label(Yii::t('app', 'email')) ?>
                                            </div>
                                                <div class="form-group col-lg-3">
                                                    <?= $form->field($model, 'contact_number')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true])->label(Yii::t('app', 'contact_number')) ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-6">                     
                                                    <?= $form->field($model, 'subject')->dropdownList(  
                                                        Helpers::dropdownSubjects('admin'),
                                                        ['prompt'=> Yii::t('app', 'select_subject'),
                                                        'class' => 'form-control text-3 h-auto py-2','maxlength' => true]
                                                        )->label(Yii::t('app', 'subject'));
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col pt-4">                     
                                                    <?= $form->field($model, 'text')->textarea(['rows' => '5', 'class' => 'form-control text-3 h-auto py-2','maxlength' => true])->label(Yii::t('app', 'text')) ?></div>
                                            </div>
                                            <div class="row">                 
                                                <div class="form-group pt-3">
                                                    <?= Html::submitButton(Yii::t('app', 'send_button'), ['class' => 'btn btn-primary btn-modern']) ?>
                                                </div>
                                            </div>         
                                        <?php ActiveForm::end(); ?>
                                                                          
                                    </div>                           
                                </div>   
                            </div>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

