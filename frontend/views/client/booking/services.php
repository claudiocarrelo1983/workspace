<?php
use common\Helpers\Helpers;

$filter['username'] =  Yii::$app->request->get('team');
$filter['location_code'] = Yii::$app->request->get('location');

$arrServices = Helpers::getServicesArr();
?>


    <?php if(count($arrServices) > 0){ ?>
        <?php foreach($arrServices as $key => $services): ?>     
            <h4 class="text-color-dark font-weight-bold positive-ls-3 mb-0  px-3">
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
                            <div class="row">
                    
                                <div class="price-menu-item   pt-0 " >                                                                                   
                                    <label class="text-color-dark m-0" id="choice-service-<?= $service['service_code'] ?>"  for="choice-service-<?= $service['service_code'] ?>" style="width: 100%;" onclick="checkTeamTick(this)">                                                  
                                        <div id="text-choice-service-<?= $service['service_code'] ?>" class="price-menu-item-details text-color-hover-primary">  
                                        <div class="col-lg-12"> 
                                            <div class="row ">  
                                                                                        
                                                <div class="col-8">                                                    
                                                    <div class="price-menu-item-title">
                                                        <p class="custom-secondary-font text-transform-none font-weight-semibold text-3 mb-0">                             
                                                            <?=  Yii::t('app', $service['services_title']) ?> <?php  //Yii::t('app', $service['time']) ?> 
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-right ">                                                                   
                                                    <div class="row">
                                                        <div class="col-9 text-right"> 
                                                            <span class="price-menu-item-price  ">                                                          
                                                                <strong class="custom-font-secondary text-3 positive-ls-3 my-2">
                                                                    <?php  
                                                            
                                                                        if(isset($companyArr['coin'])){
                                                                            $coin = Yii::t('app',Helpers::getCurrencyName($companyArr['coin']));
                                                                        } 
                                                                    ?>

                                                                    <?php if(empty($service['price_range'])){ ?>
                                                                        <?= $coin.$service['price'] ?>
                                                                    <?php  }else{ ?>
                                                                        <?= $coin.$service['price'] ?>/<?= $coin.$service['price_range'] ?>
                                                                    <?php  } ?>  
                                                                                            
                                                                </strong>                                                                  
                                                            </span> 
                                                        </div>
                                                        <div class="col-3 text-right"> 
                                                            <?= $form->field($model, 'service_code', 
                                                                ['template' => '{input}'],
                                                                
                                                                )->radio(
                                                                [
                                                                    //'class' => 'd-none imgbgchk input-display-services p-0 m-0',
                                                                    'uncheck' => null,
                                                                    'label' => '',
                                                                    'options' => ['tag' => false],
                                                                    'template' => '{input}',
                                                                    'value' => $service['service_code'],
                                                                    'id' => 'choice-service-'.$service['service_code'],
                                                                    'class' => 'mt-2',
                                                                    'onclick' => 'this.form.submit()',
                                                                    //'separator'=>''
                                                                ],
                                                                )->label(false)
                                                            ?>  
                                                        </div>
                                                    </div>                                                                  
                                                </div>
                                            </div>
                                        </label>

                                        <div class="price-menu-item-line opacity-4 "></div>                                                   
                                    </div> 
                                    </div>                        
                                    <div class="price-menu-item-desc">
                                        <p class="text-2 line-height-4 pb-4 px-3">                                  
                                            <?php if(!empty($service['text_pt']) || !empty($service['text_en']))  { ?>                                    
                                                <?=  Yii::t('app', $service['services_text']) ?>   
                                            <?php }  ?>                                
                                        </p>
                                    </div>
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
        }else{
        ?>        
        <div class="row">
            <div class="col my-5 text-center">
                <h4>
                    <?= Yii::t('app', 'no_services') ?>
                </h4>
            </div>                              
        </div>
        <?php
        }
        ?> 