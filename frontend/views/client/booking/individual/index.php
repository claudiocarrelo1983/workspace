<?php
use common\Helpers\Helpers;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;



$company = Helpers::findCompanyCode();
$companyArr = Helpers::myCompanyArr();

$coin = '';      

if(isset($companyArr['coin'])){
    $coin = Yii::t('app',Helpers::getCurrencyName($companyArr['coin']));
} 

$companyLocationArr = [];
$arrServices = [];

$guid = (isset($userArray['guid']) ? $userArray['guid'] : '');

?>

<div style="padding-bottom:60px">

    <?= $this->render('@frontend/views/client/page/header', ['headerTransparent' => 1, 'model' => $model, 'companyArr' => $companyArr]); ?>


    <div id="examples" class="container">

        <?= $this->render('@frontend/views/client/booking/steps', ['type' => 'booking']); ?>

        <div class="px-3">
            <?php //$this->render('/client/page/services', ['companyArr' => $companyArr]); ?>
        </div>

        <div class="row ">  
            <div class="col  text-center pt-5">         
                <div class=" box-content featured-box  text-start mt-4 pt-5">  
                    <div class="col-lg-12 " >
                        <div class="row pb-5">
                            <div class="col-6 ">    
                                <ul class="breadcrumb breadcrumb-dividers-no-opacity font-weight-bold text-6 w-100  ">  
                                    <li>
                                        <?=
                                            Html::a(
                                                Yii::t('app','choose_another_teammember'),                                           
                                                Url::toRoute(
                                                    array_merge(
                                                            ['/booking', 'code' => Yii::$app->request->get('code')]													
                                                        )
                                                ),
                                                ['class' =>  'input-group-text text-decoration-none text-color-dark text-color-hover-primary text-4 float-right']
                                            )
                                        ?>                          
                                    </li>   
                                </ul>
                            </div>                         
                        </div> 
                
                        <div class="d-lg-none pb-5">
                            <div class="text-8 font-weight-bold pb-3" style="color: #212529;">
                                <?= Yii::t('app','booking') ?>
                            </div> 
                            <div class="text-3">
                            <?= (isset($userArray['full_name']) ? $userArray['full_name'] : '') ?> <?= (isset($userArray['job_title']) ? '('.$userArray['job_title'].')' : '') ?>
                            </div>
                        </div>
                        <div class="d-none d-lg-block font-weight-bold">
                            <h2>
                                <?= Yii::t('app','booking') ?> - <?= (isset($userArray['full_name']) ? $userArray['full_name'] : '') ?> 
                                <?= ((isset($userArray['job_title']) && !empty($userArray['job_title'])) ? '('.$userArray['job_title'].')' : '') ?>
                            </h2>  
                        </div>
                        
                    
                        <?php if(Yii::$app->session->hasFlash('error')):?>                   
                            <div id="alert-message" class="alert alert-danger alert-dismissible mt-5" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>
                                    <?= Yii::$app->session->getFlash('error')  ?>
                                </strong> 
                            </div>                  
                        <?php endif; ?>   
                    </div>  
                    <div class=" p-3">
                        <?php $form = ActiveForm::begin([
                                'id' => 'submit-location',
                                //'validateOnSubmit' => true,
                                //'type' => ActiveForm::TYPE_VERTICAL,
                            ]);                        
                        ?>  
                    
                        <div class="row"> 
                            <div class='col-lg-4 col-md-12' >  
                                <div class="heading text-primary heading-border">   
                                    <h4 class="font-weight-bold">
                                        <?= Yii::t('app', 'location') ?>   
                                    </h4>           
                                </div>    
                                <div class="card card-border card-border-top  bg-color-light box-shadow-6 ">
                                    <div class="card-body p-0 border ">
                                        <div class="testimonial testimonial-style-4 border-0 box-shadow-none0 pt-4">
                                            <div class="testimonial-author">                                                     
                                                <div class="col-lg-12 ">
                                                    <h4>
                                                        <?= $companyLocations['full_name'] ?> (<?= $companyLocations['city'] ?>)
                                                    </h4>                                                             
                                                    <ul class="list list-icons list-icons-style-3 ">
                                                        <li>
                                                            <i class="fas fa-map-marker-alt top-6"></i><?= $companyLocations['address_line_1'] ?> , <?= $companyLocations['address_line_2'] ?>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-map-marker-alt top-6"></i><?= $companyLocations['city'] ?> , <?= $companyLocations['postcode'].' ('.Helpers::getCountryName($companyLocations['country']).')' ?>
                                                        </li>                                                                      
                                                    </ul>     
                                                </div>                                                              
                                            </div>                                                                                               
                                        </div>                                            								
                                    </div>
                                </div>                    
                            </div> 
                        </div> 
                

                        <div class="row pt-5">
                            <?= $form->field($model, 'location_code')->hiddenInput(['value'=>  $companyLocations['location_code']])->label(false) ?>
                            <?= $form->field($model, 'team_username')->hiddenInput(['value'=>  $guid])->label(false) ?>
                            <div  id="render-services" class='col-lg-6 col-md-12' > 
                                <div class="heading text-primary heading-border  pt-3">   
                                    <h4 class="font-weight-bold">
                                        <?= Yii::t('app', 'choose_services') ?>   
                                    </h4>           
                                </div>    
                                <?= $form->field($model, 'service_code')->dropDownList(
                                        Helpers::dropdownServices(['username' => $guid,'location_code'=> $companyLocations['location_code']], $coin),
                                        [
                                            'id' => 'select-service',
                                            'class' => 'form-control text-3 h-auto ',
                                            'data-team' => $guid,
                                            'data-date' => date('Y-m-d'),                                  
                                            'data-location' => $companyLocations['location_code'],                              
                                            'onChange' => 'bookingIndividualGetDateSearch()',
                                        ]            
                                    )->label(false)
                                ?>                                                                                              
                            </div>             
                        </div>      
                        <div class="row py-5"> 
                            <div id="render-schedule">
                                <div style="<?= (($display == 0 ) ? 'display:none' : '')?>">
                                    <?= $this->render('@frontend/views/client/booking/individual/schedule-ajax', 
                                        [  
                                            'model' => $model,
                                            'day' => $day,
                                            'display' => $display,
                                            'oneLessDay' => $oneLessDay,
                                            'oneMoreDay' => $oneMoreDay,
                                            'closed' => $closed,
                                            'userShedduleArr' => $userShedduleArr         
                                        ]);
                                    ?> 
                                </div>    
                            </div>                                        
                        </div>  
                        <div id="render-submit" style="<?= (($display == 0 ) ? 'display:none' : '')?>"> 
                            <div class="row py-2"> 
                                <!-- Start Services -->  
                                <?php if (Yii::$app->user->isGuest) { ?>
                                                            
                                        <?= $this->render('@frontend/views/client/booking/details', 
                                            [
                                                'form' => $form, 
                                                'model' => $model, 
                                                'companyLocations' => $companyLocations
                                            ]); 
                                        ?>                     
                                
                                <?php }else{ ?> 

                                    <?= $form->field($model, 'full_name')->hiddenInput(['value'=> Yii::$app->user->identity->full_name])->label(false); ?>
                                    <?= $form->field($model, 'contact_number')->hiddenInput(['value'=> Yii::$app->user->identity->contact_number])->label(false); ?>
                                    <?= $form->field($model, 'email')->hiddenInput(['value'=> Yii::$app->user->identity->email])->label(false); ?>
                                    <?= $form->field($model, 'nif')->hiddenInput(['value'=> Yii::$app->user->identity->nif])->label(false); ?>
                                <?php } ?>   
                                <!-- End Services -->                                                           
                            </div>   
                            <div class="row  justify-content-end py-3" >
                                <div class="col-lg-2 col-sm-12">
                                    <span  class="d-none  btn btn-primary text-3 h-auto py-2 w-100" data-code="<?= Yii::$app->request->get('code') ?>"  onclick="submitBooking(this)">
                                        <?= Yii::t('app','submit_button') ?>
                                    </span>

                                    <?= Html::submitButton(
                                            Yii::t('app','save_button'), 
                                            ['class' => 'btn btn-primary text-3 h-auto py-2 w-100']
                                    ) ?>
                                </div>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






   