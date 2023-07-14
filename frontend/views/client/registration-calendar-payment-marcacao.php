<?php

/*
require __DIR__ . '/../../web/ajax/loadCalendar.ajax.php';

die('___');


use yii\db\Query;

$query = new Query;
$eventsArr = $query->select('*')
    ->from(['calendar'])
    ->where(['username' => Yii::$app->user->identity->username]) 
    ->all();


*/


//use talma\widgets\FullCalendar;

/* @var $this yii\web\View */


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use edofre\fullcalendar\Fullcalendar;
use yii\web\JsExpression;
use yii\helpers\Url;
use kartik\date\DatePicker;

use yii\db\Query;

$query1 = new Query;
$query2 = new Query;
$query3 = new Query;

/*
$teamArr = $query1->select('*')
            ->from(['team'])
            ->where(
                [
                   'company_code' => Yii::$app->request->get('company'),
                   'active' => 1              
                ])         
            ->all();
            */
       

           
         

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;


$servicesCatArr = $query2->from(['sc' => 'services_category'])
        ->select([
            'sc.category_code',
            'page_code_sc_title'  => 'sc.page_code_title',
            'services_category_title' => 'sc.page_code_title',
            ])
        ->where(['sc.company' => Yii::$app->request->get('company')])
        ->orderBy(['sc.order'=>SORT_ASC])
        ->all();

$myData = '';


$timeCalendar = [
    [
        ['hour' => '8:00', 'valid' => 1],
        ['hour' => '8:00', 'valid' => 0],
        ['hour' => '8:00', 'valid' => 1],
        ['hour' => '8:00', 'valid' => 1],
        ['hour' => '8:00', 'valid' => 0],
        ['hour' => '8:00', 'valid' => 1],
        ['hour' => '8:00', 'valid' => 1],     
    ],
    [
        ['hour' => '9:00', 'valid' => 1],
        ['hour' => '9:00', 'valid' => 0],
        ['hour' => '9:00', 'valid' => 1],
        ['hour' => '9:00', 'valid' => 0],
        ['hour' => '9:00', 'valid' => 0],
        ['hour' => '9:00', 'valid' => 1],
        ['hour' => '13:00', 'valid' => 1],
 
    ],

    [
        ['hour' => '9:00', 'valid' => 1],
        ['hour' => '9:00', 'valid' => 0],
        ['hour' => '9:00', 'valid' => 0],
        ['hour' => '9:00', 'valid' => 0],
        ['hour' => '9:00', 'valid' => 0],
        ['hour' => '9:00', 'valid' => 0],
        ['hour' => '13:00', 'valid' => 1],
 
    ],
];


$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>

<div id="location-teamsomeone" style="display:none">
    <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-0">Faça a Marcação</h4>                                 
    <div class="row mb-5">
        <div class='col-lg-4 col-md-12' >                       
            <div class="card border-radius-0 bg-color-light border-0 box-shadow-1  mt-3" style="height:135px">
                <div class="card-body p-0 border">
                    <div class="testimonial testimonial-style-4 border-0 box-shadow-none m-0 p-0">
                        <div class="testimonial-author">                                                
                            <input type="radio" name="imgbackground" id="choice-all" class="d-none imgbgchk" onclick="displayServices(this);">                                       
                            <label for="choice-all" style="width: 100%;"> 
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
        </div>  
        <?php       

            $teamArr1 = [];

            foreach($teamArr as $team){
                $teamArr1[$team['location']][] = $team;
            }

            foreach($teamArr1 as $location => $teams): 

        ?>    
            <?php foreach($teams as $key => $team): ?>            
                    <div class='col-lg-4 col-md-12' id="location-team-<?= $location.'-'. $team['username']  ?>" style="display:none">                       
                        <div class="card border-radius-0 bg-color-light border-0 box-shadow-1  mt-3 team-card-white">
                            <div   class="card-body p-0 border ">
                                <div class="testimonial testimonial-style-4 border-0 box-shadow-none m-0 p-0">
                                    <div class="testimonial-author">                                                
                                        <input type="radio" name="imgbackground" id="choice-<?= $team['username'] ?>" class="d-none imgbgchk input-display-services" onclick="displayServices(this);">                                       
                                        <label for="choice-<?= $team['username'] ?>" style="width: 100%;"> 
                                            <div class="testimonial-author pb-3">
                                                <div class="testimonial-author-thumbnail">
                                                    <?= Html::img($team['path'].'250x250/'.$team['image'], ['class' => 'img-fluid rounded-circle ', 'style' => 'width:80px; height:80px;']) ?>  
                                                </div>
                                                    <p  class="pl-3">
                                                    <strong class="font-weight-bold">     
                                                        <?= $team['full_name'] ?>
                                                        </strong>
                                                    <span>     
                                                        <?= Yii::t('app',$team['page_code_title']) ?> 
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

    foreach($teamArr as $key => $team):

        foreach($servicesCatArr as $serviceCat){
            $servicesArr = $query3->from(['s' => 'services'])
                ->select([   
                    's.username',
                    's.category_code',
                    's.service_code',
                    's.price',         
                    'services_title'  => 's.page_code_title',        
                    'services_text'  => 's.page_code_text',
                    ])
                ->where(
                    [
                        's.company' => Yii::$app->request->get('company'),
                        's.username' => $team['username'],
                        's.category_code' => $serviceCat['category_code']
                    ]
                )->orderBy(['s.order'=>SORT_ASC])->all();

            
            if(!empty($servicesArr)){
                $arrServices[$serviceCat['page_code_sc_title']] =  $servicesArr;
            }                                
        }

?>

    <div class="pb-5" id="services-choice-<?= $team['username'] ?>" style="display:none">                                
        <?php foreach($arrServices as $keyCat => $services): ?>                               
            <div class="pt-2">    
                <?php foreach($services as $key => $service): ?>  
                    <?php   
                        if($service['username'] == $team['username']){ 
                    ?>
                    <?php 
                        if($key == 0){
                    ?>                             
                        <div class="my-3"></div>
                        <h4 class="text-color-dark font-weight-bold positive-ls-1 mb-0 text-3">
                            <?= Yii::t('app',$keyCat) ?>
                        </h4>
                        <hr class="bg-color-grey-scale-2 mt-2 mb-4">
                    <?php
                        }
                    ?>
                
                    <div class="price-menu-item">
                        <div class="price-menu-item-details">
                            <div class="price-menu-item-title">
                                <h5 class="custom-secondary-font text-transform-none font-weight-semibold text-3 mb-0">
                                    <?= $service['services_title'] ?>  (€<?= $service['price'] ?>)
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
                                        <?= $service['services_text'] ?>                                    
                                    </p>
                                </div>
                                <div clasS="col">
                                    <div class="text-right">                                        
                                        <input class="form-check-input btn-lg" type="radio" name="imgbackground" data-today="<?= strtotime(date('Y-m-d'));   ?>" <?= $service['service_code'] ?>" data-service-code="<?= $service['service_code'] ?>" data-username="<?= $service['username'] ?>"  onclick="checkRadioButtonServices(this);">   
                                    </div>
                                </div>
                            </div>                         
                        </div>
                    </div>
                    <?php }; ?> 
                <?php endforeach; ?> 
            </div>                            
        <?php endforeach; ?> 
    </div>
<?php endforeach; ?>  
