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
//$teamArr = Helpers::arrayTeam($filter);


?>


<?= $this->render('@frontend/views/client/client-booking/header', ['headerTransparent' => 1, 'model' => $model, 'companyArr' => $companyArr]); ?>

<div id="examples" class="container  pb-5">

    <?= $this->render('@frontend/views/client/client-booking/links'); ?>

    <?= $this->render('@frontend/views/client/client-booking/steps', ['type' => 'location']); ?>

    <div class="px-3">
        <?php //$this->render('/client/page/services', ['companyArr' => $companyArr]); ?>
    </div>

    <div class="row ">   
        <div class="col  text-center"> 
            <div class=" box-content featured-box  text-start mt-0">        
                <div class=" p-3">
                    <?php $form = ActiveForm::begin([
                            'id' => 'submit-location',
                            //'validateOnSubmit' => true,
                            //'type' => ActiveForm::TYPE_VERTICAL,
                        ]); ?>  
                
                        <div class="row">
                            <div class="col">  
                                <div class="heading text-primary heading-border pt-4">   
                                    <h3 class="font-weight-normal">
                                        <?= Yii::t('app', 'choose_location') ?>   
                                    </h3>           
                                </div> 
                            </div>   
                        </div>                                  
                        <div class="row">   
                            <?php if(count($companyLocations) != 0){ ?>   
                                <?php foreach($companyLocations as $key => $location):  ?>  
                                    <div class='col-lg-4 col-md-12 pt-4' >  
                                        <div class="card card-border card-border-top card-border-hover bg-color-light box-shadow-6 box-shadow-hover anim-hover-translate-top-10px transition-3ms">
                                            <div class="card-body p-0 border ">
                                                <div class="testimonial testimonial-style-4 border-0 box-shadow-none0">
                                                    <div class="testimonial-author">     
                                                        <?= $form->field($model, 'location_code', 
                                                            ['template' => '{input}']
                                                            )->radio(
                                                            [
                                                                'class' => 'd-none imgbgchk input-display-services',
                                                                'uncheck' => null,
                                                                'label' => '',
                                                                'value' => $location['location_code'],
                                                                'id' => 'choice-location-'.$location['location_code'],
                                                                'onclick' => 'this.form.submit()'
                                                            ]) 
                                                        ?>                                                              
                                                        <label id="choice-location-<?= $location['location_code'] ?>"  for="choice-location-<?= $location['location_code'] ?>" style="width: 100%;" onclick="checkTeamTick(this)"> 
                                                            <div class="col-lg-12 ">
                                                                <h4>
                                                                    <?= $location['full_name'] ?> (<?= $location['city'] ?>)
                                                                </h4>                                                             
                                                                <ul class="list list-icons list-icons-style-3 ">
                                                                    <li>
                                                                        <i class="fas fa-map-marker-alt top-6"></i><?= $location['address_line_1'] ?> , <?= $location['address_line_2'] ?>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fas fa-map-marker-alt top-6"></i><?= $location['city'] ?> , <?= $location['postcode'].' ('.Helpers::getCountryName($location['country']).')' ?>
                                                                    </li>                                                                      
                                                                </ul>     
                                                            </div>      
                                                            <div class="text-center">     
                                                                <div id="tick-choice-location-<?= $location['location_code'] ?>" class="tick_container-location" style="display:none">
                                                                    <div class="tick-location"><i class="fa fa-check"></i></div>
                                                                </div>	
                                                            </div>                                                             
                                                        </label>
                                                    </div>                                                                                               
                                                </div>                                            								
                                            </div>
                                        </div>     
                                    </div>  
                                <?php endforeach; ?>       
                                <?php 
                                    }else{
                                    ?>        
                                    <div class="row">
                                        <div class="col my-5 text-center">
                                            <h4>
                                                <?= Yii::t('app', 'no_company_locations') ?>
                                            </h4>
                                        </div>                              
                                    </div>
                                    <?php
                                    }
                                ?>                                                                       
                            </div>          
                            <?php ActiveForm::end(); ?>                        
                        </div>                               
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>





   