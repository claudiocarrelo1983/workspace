<?php

use common\Helpers\Helpers;

$coin = '';      

if(isset($companyArr['coin'])){
    $coin = Yii::t('app',Helpers::getCurrencyName($companyArr['coin']));
} 

?>
<div class="heading text-primary heading-border  pt-3">   
    <h4 class="font-weight-bold">
        <?= Yii::t('app', 'choose_location') ?>   
    </h4>           
</div>  
<?php if(count($companyLocations) != 0){ ?>   
    <?php foreach($companyLocations as $key => $location):  ?>  
        <div class='col-lg-4 col-md-6 pt-3' >  
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
                                    'data-company' => Helpers::findCompanyCode(),     
                                    'data-coin' => $coin,                             
                                    'onChange' => 'getBookingGetServices()'
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