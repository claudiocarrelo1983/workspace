<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\base\Event;

$inc = 0;
$arrFaqs = [];

foreach ($faqs as $key => $value):
    $arrFaqs[$value['category']][] = $value;
endforeach;  
?>

<!-- start page title --> 
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18 pb-4 pt-4">
                <?= Html::encode(Yii::t('app', 'menu_faqs')) ?>
            </h4>  
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript: void(0);">
                            <?= Yii::t('app', 'menu_admin_my_application') ?> 
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                    <?= Yii::t('app', 'menu_faqs') ?> 
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>  


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
                        
                        <div class="tab-pane fade" id="v-pills-support" role="tabpanel" aria-labelledby="v-pills-support-tab">
                            <h4 class="card-title mb-5">
                                <?= Yii::t('app', 'support') ?>
                            </h4>
                        
                            <div class="faq-box d-flex mb-4">
                                <div class="flex-shrink-0 me-3 faq-icon">
                                    <i class="bx bx-help-circle font-size-20 text-success"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="font-size-15">Email:</h5>
                                    <p class="text-muted">jelpdesk@mycalendar.com</p>
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

