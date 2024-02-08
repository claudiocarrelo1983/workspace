<?php

use common\Helpers\Helpers;


$arrServices = Helpers::getServicesArr();

if(count($arrServices) > 0){

?>

<section class="section section-height-4 section-with-shape-divider border-0 mt-5  lazyloaded" id="services" data-bg-src="img/parallax/parallax-2.jpg" style="background-image: url(&quot;img/parallax/parallax-2.jpg&quot;);">
    <div class="shape-divider" style="height: 385px;">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2000 385" preserveAspectRatio="none">
            <circle fill="#F7F7F7" opacity="0.2" cx="57" cy="181" r="161"></circle>
            <circle fill="#F4F4F4" opacity="0.3" cx="75.5" cy="158.5" r="169.5"></circle>
            <path fill="#FFFFFF" opacity="0.5" d="M-35,226c17.66,1.2,43.63,2.44,75,2c83.48-1.18,144.86-13.49,188-22c224.54-44.3,165.12-27.27,310-59
                c133.16-29.16,128.14-31.45,223-52c206.26-44.68,317.22-68.72,460-68c97.61,0.49,73.58,11.86,293,25c164.22,9.83,250.54,7.83,279,7
                c102.76-2.99,187.96-12.01,248-20c0-24.69,0-49.37,0-74.06c-694.67,0-1389.33,0-2084,0C-40.33,51.96-37.67,138.98-35,226z"></path>
            <path fill="#FFFFFF" d="M-37,185c17.21,1.44,42.06,3.17,72,4c81.96,2.26,170.2-3.07,325-30c54.07-9.4,98.99-18.41,221-45
                c255.1-55.59,223.26-53.86,287-64c57.13-9.09,228.37-36.32,423-18c36.66,3.45,96.62,10.63,187,14c16.19,0.6,75.77,2.66,156,1
                c90.18-1.87,157.94-7.44,248-15c46.95-3.94,99.2-8.84,156-15c0-12.82,0-25.65,0-38.47c-692.67,0-1385.33,0-2078,0
                C-39,47.35-38,116.18-37,185z"></path>
        </svg>
    </div>
    <div class="container"> 
        <div class="row  my-5 ">
            <div class="col">  
                <div class="heading text-primary heading-border pt-5">   
                    <h1 class="font-weight-normal">
                        <?=  Yii::t('app', 'menu_services') ?>
                    </h1>           
                </div> 
            </div>
        </div> 
        <?php foreach($arrServices as $key => $services): ?>  
            <div class="my-5"></div>
            <h4 class="text-color-dark font-weight-bold positive-ls-3 mb-0">
                <?=  Yii::t('app', $key) ?>
            </h4>
            <hr class="bg-color-grey-scale-2 mt-2 mb-4">
            <div class="pt-2"> 
                <?php
                    $number = bcdiv(count($services),2,2);    
                    $number = round($number);        
                    $check = (count($services) > 8) ? 1 : 0;
                ?>
                <div class="row  mb-5">
                    <?php $i = 0 ?>
                    <?php foreach($services as $key => $service): ?>   
                        <?php if($i== 0 && $check == 1){ ?> 
                            <div class="col-lg-6">
                        <?php }  ?>  
                        <?php if($number == $i && $check == 1){ ?> 
                            </div>
                            <div class="col-lg-6">
                        <?php }  ?>  
                                
                            <div class="price-menu-item">
                                <div class="price-menu-item-details">
                                    <div class="price-menu-item-title">
                                        <h5 class="custom-secondary-font text-transform-none font-weight-semibold text-3 mb-0">                             
                                            <?=  Yii::t('app', $service['services_title']) ?>   <?= ((empty($service['time'])) ? '' : '('.$service['time'].'min)') ?>
                                        </h5>
                                    </div>
                                    <div class="price-menu-item-line opacity-4"></div>
                                    <div class="price-menu-item-price">
                                        <strong class="custom-font-secondary text-color-dark text-3 positive-ls-3">
                                            <?php                                            
                                                if(isset($companyArr['coin'])){
                                                    $coin = Yii::t('app',Helpers::getCurrencyName($companyArr['coin']));
                                                } 
                                            ?>

                                            <?php if(empty($service['price_range'])){ ?>
                                                <?=  $coin.$service['price'] ?>
                                            <?php  }else{ ?>
                                                <?= $coin.$service['price'] ?>/<?= $coin.$service['price_range'] ?>
                                            <?php  } ?>
                                            
                                        </strong>
                                    </div>
                                </div>
                                <div class="price-menu-item-desc">
                                    <p class="text-3 line-height-4">  
                                        <?php if(!empty($service['text_pt']) || !empty($service['text_en']))  { ?>
                                            
                                            <?=  Yii::t('app', $service['services_text']) ?>   
                                        <?php }  ?>                                            
                                    </p>
                                </div>
                            </div>                 
                            <?php                      
                                $i++;
                            ?>           
                            <?php endforeach; ?>                    
                        </div>
                    </div>
                <?php endforeach; ?> 
            </div>
        <?php 
        } 
        ?> 
    </div> 

</section>