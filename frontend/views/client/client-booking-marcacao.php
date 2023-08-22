<?php

use yii\helpers\Html;
use yii\db\Query;

$query1 = new Query;
$query2 = new Query;
$query3 = new Query;



$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;


$servicesCatArr = $query2->from(['sc' => 'services_category'])
        ->select([
            'sc.category_code',
            'page_code_sc_title'  => 'sc.page_code_title',
            'services_category_title' => 'sc.page_code_title',
            ])
        ->where(['sc.company_code' => $code])
        ->orderBy(['sc.order'=>SORT_ASC])
        ->all();


$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;



?>

<div id="location-teamsomeone" style="display:none">
    <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-0">Escolha o Profissional</h4>                                 
    <div class="row mb-5">
        <div class='col-lg-4 col-md-12' > 
            <?php foreach($companyLocations as $keyLocation => $location):   ?>
                <div class="card border-radius-0 bg-color-light border-0 box-shadow-1  mt-3 team-card-white" id="display-choice-all-<?= $location['location_code'] ?>" style="display:none">
                    <div   class="card-body p-0 border py-2">
                        <div class="testimonial testimonial-style-4 border-0 box-shadow-none m-0 p-0">
                            <div class="testimonial-author">                                                
                                <input type="radio" name="team-choice" id="choice-all-<?= $location['location_code'] ?>" class="d-none imgbgchk input-display-services" onclick="displayServices(this);">                                       
                                <label for="choice-all-<?= $location['location_code'] ?>" style="width: 100%;"> 
                                    <div class="testimonial-author pb-3 pt-1">
                                        <div class="testimonial-author-thumbnail">
                                            <i class="fas fa-user-circle fa-lg"></i>
                                        </div>
                                        <p  class="pl-3">
                                            <strong class="font-weight-bold">     
                                                Alguem disponível
                                            </strong>                                     
                                        </p>
                                    </div>                                       
                                    <div class="tick_container">
                                        <div class="tick"><i class="fa fa-check"></i></div>
                                    </div>	                                                             
                                </label>
                            </div>                                                                                               
                        </div>                                            								
                    </div>
                </div>                         
            <?php endforeach; ?>                                                                                  
        </div>  
        <?php     

        $teamArr1 = [];

        foreach($teamArr as $team){
            $teamArr1[$team['location']][] = $team;
        }      

        foreach($teamArr1 as $location => $teams): 

        ?>    
            <?php foreach($teams as $key => $team):
                
                $checked = ((Yii::$app->request->get('username') == $team['username_code']) ? 'checked' : '');
                ?>            
                <div class='col-lg-4 col-md-12' id="location-team-<?= $location.'-'. $team['username_code']  ?>" style="display:none">                       
                    <div class="card border-radius-0 bg-color-light border-0 box-shadow-1  mt-3 team-card-white">
                        <div   class="card-body p-0 border ">
                            <div class="testimonial testimonial-style-4 border-0 box-shadow-none m-0 p-0">
                                <div class="testimonial-author">                                                
                                    <input type="radio" name="team-choice" id="choice-<?= $team['username_code'] ?>" class="d-none imgbgchk input-display-services" onclick="displayServices(this);" <?= $checked ?>>                                       
                                    <label for="choice-<?= $team['username_code'] ?>" style="width: 100%;"> 
                                        <div class="testimonial-author pb-3">
                                            <div class="testimonial-author-thumbnail">
                                                <?= Html::img($team['path'].'250x250/'.$team['image'], ['class' => 'img-fluid rounded-circle ', 'style' => 'width:80px; height:80px;']) ?>  
                                            </div>
                                                <p  class="pl-3">
                                                <strong class="font-weight-bold">     
                                                    <?= $team['first_name'] ?>
                                                    </strong>
                                                <span>     
                                                    <?= Yii::t('app', $team['page_code_title']) ?> 
                                                </span>
                                            </p>
                                        </div>                                            
                                        <div class="tick_container">
                                            <div class="tick"><i class="fa fa-check"></i></div>
                                        </div>	                                                             
                                    </label>
                                </div>                                                                                               
                            </div>                                            								
                        </div>
                    </div>                                                                              
                </div>  
            <?php endforeach; ?>           
        <?php endforeach; ?>
    </div>
</div>

<?php


    $arrServices = [];
    $arrAllServices = [];

    $servicesArr = $query3->from(['s' => 'services'])
        ->select([ 
            's.location_code',  
            's.time', 
            's.username',
            's.category_code',
            's.service_code',
            's.price',    
            's.page_code_title',
            's.page_code_text', 
            'services_title'  => 's.page_code_title',        
            'services_text'  => 's.page_code_text',
            ])
        ->where(
            [
                's.company' => $code,                
            ]
        )
        ->orderBy(['s.order'=>SORT_ASC])->all(); 


    //Services By User
    foreach($teamArr as $key => $team){        
            foreach($servicesCatArr as $catKey =>  $serviceCat){   
                foreach($servicesArr as $values){ 
            
                if(!empty($servicesArr)){  
                    $exArr = explode(',', $values['username']);

                    foreach($exArr as $username){
                        if($username ==  $team['username_code']){                     
                            if($values['category_code'] == $serviceCat['category_code']){
                                $arrServices[$team['username_code']][$serviceCat['page_code_sc_title']][] =  $values; 

                                $arrAllServices[$values['location_code']][$serviceCat['page_code_sc_title']][$values['page_code_title']] = $values;                                
                              
                            }     
                        }
                    }       
                }     
            }                           
        }
    }

?>


                            
<?php 

$inc = '0';

foreach($companyLocations as $keyLocation => $location):  
    
    if(isset($arrAllServices[$location['location_code']])){  

        $inc = (($location['location_code'] != $inc) ? 0 : $location['location_code']); 
        if($inc == 0){
            ?>            
                <div class="pb-5 px-2" id="services-choice-all-<?= $location['location_code'] ?>" style="display:none">              
            <?php       
        }
        
        foreach($arrAllServices[$location['location_code']] as $keyCat => $servicesArr):     
 
        ?>                               
        <div class="pt-2">    
            <div class="my-3"></div>
                <h4 class="text-color-dark font-weight-bold positive-ls-1 mb-0 text-3">
                    <?= Yii::t('app',$keyCat) ?>
                </h4>
                <hr class="bg-color-grey-scale-2 mt-2 mb-4">
            <?php foreach($servicesArr as $key => $service): ?>  
          
                  
                    <div class="price-menu-item">
                        <div class="price-menu-item-details">
                            <div class="price-menu-item-title">
                                <h5 class="custom-secondary-font text-transform-none font-weight-semibold text-3 mb-0">
                                    <?= Yii::t('app', $service['page_code_title']) ?>   ( <?= $service['time'] ?> min )
                                </h5>
                            </div>
                            <div class="price-menu-item-line opacity-4"></div>
                            <div class="price-menu-item-price">
                                <span class="text-color-dark text-4">
                                    €<?= $service['price'] ?>
                                </span>                          
                            </div>
                        </div>
                        <div class="price-menu-item-desc">
                            <div class="row">
                                <div clasS="col">
                                    <p class="text-2-5 line-height-4">
                                        <?= Yii::t('app', $service['page_code_text']) ?>                                   
                                    </p>
                                </div>                       
                            </div>                         
                        </div>
                    </div>            
       
            <?php endforeach; ?> 
        
        </div>    
                           
    <?php endforeach; 

        if($inc == 0){
            echo '</div> ';
        }

        }else{
            //echo Yii::t('app','no_services_available');
        }
         
      
    endforeach;
    ?> 

<?php  $inc = 0; ?>

<?php foreach($teamArr as $key => $team): ?>
    <div class="pb-5 px-2" id="services-choice-<?= $team['username_code'] ?>" style="display:none">                                
        <?php 
 
            if(isset($arrServices[$team['username_code']])){             
            
               // $inc = (($location['location_code'] != $inc) ? 0 : $location['location_code']); 
        ?>                               
             
                <?php foreach($arrServices[$team['username_code']] as $keyCat => $services): ?>                    
                    
                    <?php                     
                   
                        $inc = (($keyCat != $inc) ? 0 : $keyCat); 

                        if($inc == 0){
                    ?>       
                      <div class="pt-2">                       
                        <div class="my-3"></div>
                        <h4 class="text-color-dark font-weight-bold positive-ls-1 mb-0 text-3">
                            <?= Yii::t('app',$keyCat) ?>
                        </h4>
                        <hr class="bg-color-grey-scale-2 mt-2 mb-4">
                    <?php
                        }                     
                    ?>
                
                    <?php foreach($services as $keyCat => $service): ?> 
                        <div class="price-menu-item">
                            <div class="price-menu-item-details">
                                <div class="price-menu-item-title">
                                    <h5 class="custom-secondary-font text-transform-none font-weight-semibold text-3 mb-0">
                                        <?= Yii::t('app', $service['page_code_title']) ?>    ( <?= $service['time'] ?> min )
                                    </h5>
                                </div>
                                <div class="price-menu-item-line opacity-4"></div>
                                <div class="price-menu-item-price">
                                    <span class="text-color-dark text-4">
                                        €<?= $service['price'] ?>
                                    </span>                          
                                </div>
                            </div>
                            <div class="price-menu-item-desc">
                                <div class="row">
                                    <div clasS="col">
                                        <p class="text-2-5 line-height-4">
                                            <?= Yii::t('app', $service['page_code_text']) ?>                                   
                                        </p>
                                    </div>                               
                                </div>                         
                            </div>
                        </div>
                    <?php endforeach; ?> 
                    <?php                    
                    if($inc == 0){
                        ?> 
                            </div>
                        <?php
                    }
                    ?>
                <?php endforeach; ?> 
                                       
        <?php 
            }else{
                echo Yii::t('app','no_services_available');
            }
        ?> 
    </div>
<?php endforeach; ?> 
