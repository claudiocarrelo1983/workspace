<?php
use common\Helpers\Helpers;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$companyLocations = Helpers::arrayCompanyLocations();
$company = Helpers::findCompanyCode();
$companyArr = Helpers::myCompanyArr();


$companyLocationArr = [];
$arrServices = [];

$filter['location_code'] = Yii::$app->request->get('location');


$coin = '';      

if(isset($companyArr['coin'])){
    $coin = Yii::t('app',Helpers::getCurrencyName($companyArr['coin']));
} 

?>


<div style="padding-bottom:60px">

<?= $this->render('@frontend/views/client/page/header', ['headerTransparent' => 1, 'model' => $model, 'companyArr' => $companyArr]); ?>


<div id="examples" class="container" >

    <?= $this->render('@frontend/views/client/booking/steps', ['type' => 'booking']); ?>

    <div class="px-3">
        <?php //$this->render('/client/page/services', ['companyArr' => $companyArr]); ?>
    </div>

    <div class="row ">  
        <div class="col  text-center pt-5">         
            <div class=" box-content featured-box  text-start mt-4 pt-5">  
                <div class="col-lg-12 " >
                    <h1>
                        <?= Yii::t('app','booking') ?>
                    </h1>  
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
                        <!-- Start Services -->                               
                            <?= $this->render('@frontend/views/client/booking/location', ['form' => $form, 'model' => $model, 'companyLocations' => $companyLocations, 'companyArr' => $companyArr]); ?>                     
                        <!-- End Services -->                                                              
                    </div>  

                    <div class="row">
                        <div  id="render-services" class='col-lg-6 col-md-12' style="<?= (($display == 0 ) ? 'display:none' : '')?>"> 
                            <div class="heading text-primary heading-border  pt-3">   
                                <h4 class="font-weight-bold">
                                    <?= Yii::t('app', 'choose_services') ?>   
                                </h4>           
                            </div>           
                            <?= $form->field($model, 'service_code')->dropDownList(
                                    Helpers::dropdownServices(['location_code' => $model->location_code], $coin),
                                    [
                                        'id' => 'select-service',                                   
                                        'class' => 'form-control text-3 h-auto ',                                                                
                                        'onChange' => 'bookingGetTeam(this)',
                                    ]            
                                )->label(false)
                            ?>                                                                                              
                        </div>              
                
                        <div id="render-profissional" class='col-lg-6 col-md-12 ' style="<?= (($display == 0 ) ? 'display:none' : '')?>"> 
                            <div class="heading text-primary heading-border  pt-3">   
                                <h4 class="font-weight-bold">
                                    <?= Yii::t('app', 'choose_professional') ?>
                                </h4>           
                            </div>    
                            <?php $arrTeam = ((empty($model->location_code) ? [] : ['location_code' => $model->location_code])); ?>                    
                            <?=
                                $form->field($model, 'team_username')->dropDownList(
                                    Helpers::dropdownTeam($arrTeam, 'any_teammember'),
                                    [
                                        'id' => 'select-team',
                                        //'data-username' => $model->team_username,
                                        'data-day' => date('Y-m-d'),
                                        'class' => 'form-control text-3 h-auto ',
                                        //'prompt'=> Yii::t('app', 'any_teammember'),                                                                 
                                        'onClick' => 'bookingGetDateSearch(this)',                                            
                                        'separator' => '<br>'                                                              
                                        
                                    ]            
                                )->label(false)
                            ?>  
                        </div> 
                    </div>      
                    <div class="row py-2"> 
                        <div id="render-schedule">
                            <div style="<?= (($display == 0 ) ? 'display:none' : '')?>">
                                <?= $this->render('@frontend/views/client/booking/schedule-ajax', 
                                    [  
                                        'model' => $model,
                                        'day' => $day,
                                        'display' => $display,
                                        'companyCode' => $companyCode,
                                        'oneLessDay' => $oneLessDay,
                                        'oneMoreDay' => $oneMoreDay,
                                        'closed' => $closed,
                                        'userShedduleArr' => $userShedduleArr         
                                    ]);
                                ?> 
                            </div>    
                        </div>                                        
                    </div>  
                    <div id="render-submit" style="display:none"> 
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





   