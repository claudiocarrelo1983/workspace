<?php

use common\Helpers\Helpers;

$companyDetails =  Helpers::myCompanyDetailsArr();

?>
<div class="container"> 
    <section class="section section-height-1 bg-light position-relative border-0 m-0" id="location">
        <div class="my-5">       
            <div class="heading text-primary heading-border">       
                <h1 class="font-weight-normal">
                    <?=  Yii::t('app', 'menu_location') ?>
                </h1>        
            </div>    
            <div class="row my-5 ">  
        
                <?php foreach($companyDetails as $keyt => $companyLocations):?>     
                    <div class="col-lg-4 py-3">
                        <h4>
                            <?= $companyLocations['company_name'] ?> (<?= $companyLocations['city'] ?>)
                        </h4>
                        <h4 >
                            <?= Yii::t('app', 'our_address_title') ?>
                        </h4>
                        <ul class="list list-icons list-icons-style-3 ">
                            <li>
                                <i class="fas fa-map-marker-alt top-6"></i><?= $companyLocations['address_line_1'] ?> , <?= $companyLocations['address_line_2'] ?>
                            </li>
                            <li>
                                <i class="fas fa-map-marker-alt top-6"></i><?= $companyLocations['city'] ?> , <?= $companyLocations['postcode'].' ('.Helpers::getCountryName($companyLocations['country']).')' ?>
                            </li>
                            <li>
                                <i class="fas fa-phone top-6"></i><?= $companyLocations['contact_number'] ?> 
                            </li>
                            <li>
                                <i class="fas fa-envelope top-6"></i> <a class="btn-link" href="mailto:'<?= $companyLocations['email'] ?> .'"><?= $companyLocations['email'] ?></a> 
                            </li>
                                    
                        </ul>    
                        <h4 class="pt-2">
                            <?= Yii::t('app', 'business_hours_title') ?>
                        </h4>
                        <ul class="list list-icons list-dark mt-2">
                            <?php                           

                                $str = '';   
                                
                                $arrWeek = ((is_array(json_decode($companyLocations['sheddule_array'],true))) ? json_decode($companyLocations['sheddule_array'], true) : []);

                                foreach($arrWeek as $key => $value){
                                    $str .= '<li><i class="far fa-clock top-6"></i> ';
                                    if($value['closed'] == 'false'){
                                        $str .= Yii::t('app',$key);
                                        $str .= ((empty($value['start'])) ? '' :' - '.$value['start'] );
                                        $str .= ((empty($value['break_start'])) ? '' : ' - '.$value['break_start']);                
                                        $str .= ' & ';   
                                        $str .= ((empty($value['break_end'])) ? '' : $value['break_end']);
                                        $str .= ((empty($value['end'])) ? '' : ' - '.$value['end']);
                                                    
                                    }
                                    $str .='</li>'; 
                                }           
                                
                                
                                $closedStr = '';
                                $i = 0;

                                foreach($arrWeek as $key => $value){                               
                                    if($value['closed'] == 'true'){   
                                        $comma = ($i == 0) ? '' : ',';                              
                                        $closedStr .=  $comma.' '.Yii::t('app',$key); 
                                        $i++;
                                    }       
                                }   
                                
                                if(!empty($closedStr)){
                                    $str .= '<li><i class="far fa-clock top-6"></i> ';                           
                                    $str .= $closedStr.' - '.Yii::t('app', 'closed').'</li>';
                                }  

                                echo $str;
                                
                                ?>  

                    
                            </ul>
                    </div>
                    <?php if(count($companyDetails) <= 2){ ?>
                        <div class="col-lg-8  py-3">                  
                            <div id="googlemaps" class="google-map m-0 " style="height:450px;">
                                <?= $companyLocations['google_location'] ?>
                            </div>
                        </div>
                    <?php } ?>         
                <?php endforeach; ?> 
            </div>
        </div>
    </section>
</div>