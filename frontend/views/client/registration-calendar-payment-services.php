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

$query = new Query;

/*
$teamArr = $query->select('*')
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


$servicesCatArr = $query->from(['sc' => 'services_category'])
        ->select([
            'sc.category_code',
            'page_code_sc_title'  => 'sc.page_code_title',
            'services_category_title' => 'sc.page_code_title',
            ])
        ->where(['sc.company' => Yii::$app->request->get('company')])
        ->orderBy(['sc.order'=>SORT_ASC])
        ->all();


$fullArrShdeddule = [

    'carrelo198133' => [
        'cat_2' => [
            '2023-06-30' => [
                '08:00',
                '09:00',
                '10:00',
                      
            ],
            '2023-07-02' => [
                '08:00',
                '09:00',
                '10:00',
                '11:00',
                '13:00',
                     
            ],
            '2023-07-03' => [
                '08:00',
                '09:00',
                '12:30',
              
            ]
        ],  
        'cat_1' => [
            '2023-06-30' => [
                '08:00',
                '09:00',
                        
            ],
            '2023-07-01' => [
                '08:00',
                '09:00',
                '10:00',
             
                
            ],
            '2023-07-03' => [
                '08:00',
                '09:00',
                '10:00',
                
                
            ]
        ]  
    ],
    'carrelo19831' => [

        'cat_2' => [
            '2023-06-29' => [
                        '08:00',
                        '09:00',
                        '10:00',
                        '11:46',
                    
                    ],
            '2023-06-30' => [
                        '08:00',
                        '09:00',
                        '10:36',
                        '11:00',
                        '13:00',
                        '14:00',
                        '15:00',
                        '16:00',
                        '17:00',
                        '22:00',      
                        '23:00',    
                    ],

            '2023-07-02' => [

                        '21:00',         
                        '22:00',
                    
                    ],  
            '2023-07-03' => [
                        '08:00',
                        '09:00',
                        '10:15',
                        '11:00',
                        '13:00',
                        '14:00',
                        '15:00',
                        '16:00',
                        '17:00',
                        '22:00',        
                    ],
    
            '2023-07-05' => [

                        '21:00',         
                        '22:00',
                    
                    ],  
                    
            '2023-07-06' => [

                '21:00',         
                '22:00',
            
            ],  
        ],
        'cat_1' => [
            '2023-06-30' => [
                '08:00',
                '09:00',
                        
            ],
            '2023-07-01' => [
                '08:00',
                '09:00',
                '10:15',
                '11:00',
                '13:00',
                '14:00',
                '15:00',
                '16:00',
                '17:00',
                '22:00',  
     
            ],
            '2023-07-02' => [
                '08:00',
                '09:00',
                '10:00',
                
            ],
            '2023-07-03' => [
                '08:00',
                '09:00',
                '10:00',
                
            ],
            '2023-07-04' => [
                '08:00',
                '09:00',
                '10:00',
                
            ],
            '2023-07-05' => [
                '08:00',
                '09:00',
                '10:00',
                
            ],
            '2023-07-06' => [
                '08:00',
                '09:00',
                '10:00',
                
            ]
        ]  
    
    ]  

];

/*

print"<pre>";
print_r($arrWeek);
die();

foreach($fullArrShdeddule as $username => $arrServices){ 
    foreach($arrServices as $service => $availableSchedule) {  
        foreach($availableSchedule as $day => $hours) {              
            foreach($hours as $day => $hour) {
                $x = strtotime($hour);
                $h = date('H:i',$x);
                print_r($hour);
                die();
            }          
        }        
    }
}

*/




$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

?>

<input id="qty1" type="hidden" value="<?= date('d') ?>" data-min="<?= date('d') ?>" data-max="<?= strtotime(date('Y-m-d'). ' + 20 day')?>" class="qty"/>    
<style>

.background-date-choice{
    border-left: 1px solid #dee2e6 !important;
    border-right: 1px solid #dee2e6 !important;
    border-bottom: 4px solid #8c9092 !important;
    background: #eaeaea !important;
}
.text-hour{
    font-size:13px;
    background: transparent !important;
}
.text-hour:hover{
    border-bottom: 2px solid #0088cc !important;
  
    text-decoration: none !important;
}
.text-hour-column{
    background:#fafafa !important;
    border-left: 1px solid #dee2e6 !important;
    border-right: 1px solid #dee2e6 !important;
}
@media screen and (max-width: 800px) {
    .display-values-for-mobile{
        display:none;
    }
}
@media screen and (min-width: 800px) {
    .display-values-for-desktop{
        display:none;
    }
}
</style>


<div class="px-3"> 
    <div class="justify-content-center">



        <!-- Desktop Start -->
        <?php
            $arrValues = [];;  
            $maxValueArr = [];

            $serviceStr = '';

            foreach($fullArrShdeddule as $username => $arrServices){    
                foreach($arrServices as $service => $availableSchedule) {  
                    $maxRows = 0;
                    foreach($availableSchedule as $key => $line){  
                        if($maxRows < count($line)){
                            $maxRows = count($line);               
                        }  

                        $maxValueArr[$username][$service] = $maxRows;              
                    }  
                } 
            }        


            foreach($fullArrShdeddule as $username => $arrServices){ 
                foreach($arrServices as $service => $availableSchedule) {  

                    $maxRows = ((isset($maxValueArr[$username][$service])) ? $maxValueArr[$username][$service] : 0);

                    for($row = 0; $row < $maxRows; $row ++){
                        for($x = 0; $x < 7; $x ++){         
                            $fullDate = date("Y-m-d", strtotime("+".$x." day")); 
                            $day = strtotime($fullDate); 
                
                            if(isset($availableSchedule[$fullDate][$row])){
                                $arrValues[$username][$service][$row][] = $availableSchedule[$fullDate][$row];
                            } else{
                                $arrValues[$username][$service][$row][] = '';
                            }   
                        }                                                             
                    }    
                }
            }  

        
            foreach($arrValues as $username => $dataPerUsername){ 
                foreach($dataPerUsername as $service => $arrServices) {  
                
        ?>  
                    <table id="table-services-<?= $service ?>-<?= $username ?>" class="table px-5 mb-5" style="display:none">
                        <thead>                             
                            <tr class="border">
                                <th class="prev text-center py-3" style="font-size: 30px;">
                                    <a onclick="goToPreviousPage()">«</a>
                                </th>
                                <th colspan="5" class="datepicker-switch text-center  py-3 text-4" >
                                    June 2023           
                                </th>
                                <th class="nex text-center  py-3" style="font-size: 30px;">
                                    <a  onclick="goToNextPage()">»</a>                       
                                </th>
                            </tr>
                            <tr>
                                <?php
                                    $days = array('sun', 'mon', 'tue', 'wed','thu','fri', 'sat');                                
                                    $date1 = strtotime('2022-04-01');
                                    $date2 = strtotime('2022-05-10');
                                    $diff = $date2 - $date1;
                                    $days1 = floor($diff / (60 * 60 * 24));                              
                                    
                                    $dayOfWeek = date('w');                     
                                                                    
                                ?>
                                <?php
                                    for($x = 0; $x < 7; $x ++){                      
                                        $dw = date('w', strtotime(date('Y-m-d'). ' + '.$x.' day'));               
                                ?>
                                    <th class=" dow text-center text-3 border">
                                        <?= Yii::t('app',$days[$dw]) ?>
                                    </th>
                                <?php
                                    }
                                ?>                              
                            </tr>                        
                        </thead>
                        <tbody>
                            <tr class="p-2 ">
                                <?php         
                                
                                    $i = 0;
                                    for($x = 0; $x < 7; $x ++){                                                 
                                        $fullDate = date("Y-m-d", strtotime("+".$x." day")); 
                                        $dayStrTime = strtotime($fullDate);                            
                                        $day = date('d', $dayStrTime);                          
                                        $classToday = '';
                                        if($x == 0){
                                            $classToday = 'background-date-choice';
                                        }
                                ?>                           
                                    <td class="text-center border <?= $classToday ?> day-<?= $dayStrTime ?>-<?= $username ?> "> 
                                        <a class="text-hour text-4" onclick="goToThisPage(this)" data-this-data=<?= $dayStrTime ?> data-username=<?= $username ?> data-service-code=<?= $service ?>>
                                            <?= $day ?>
                                        </a>         
                                    </td>
                                <?php
                                    }
                                ?>                       
                            </tr>
                            <?php 
                                foreach($arrServices as $key => $line){  
                            ?>     
                            <tr class="" id="tabel">                             
                                <?php                      
                                
                                    $i = 0;

                                    foreach($line as $key2 => $hour){ 

                                        $fullDate = date("Y-m-d", strtotime("+".$i." day")); 
                                        $dayStrTime = strtotime($fullDate);   
                                ?>
                                    <td class="text-center  display-values-for-mobile day-column-<?= $dayStrTime ?>-<?= $username ?> border <?= ($key2 == 0) ? 'text-hour-column' : '' ?>" >
                                        <a class="btn ">
                                            <?= $hour ?>
                                        </a>
                                    </td>   
                                <?php 
                                    $i++;
                                    }
                                
                                }
                                ?>                                                  
                            </tr> 
                        </tbody>
                    </table>   
            <?php  

                    }
                }
            ?>
           <!-- End Desktop  -->



            <!-- Mobile Start -->
            
            <?php


                $userShedduleArr = [];

                foreach($fullArrShdeddule as $username => $arrServices) {

                    foreach($arrServices as $service => $availableSchedule) {
                            
                        foreach($availableSchedule as $key => $valuesDay) {
                    
                            foreach($valuesDay as $values){
                            
                                $hour = explode(':',$values);

                                if(isset($hour[0]) && $hour[0] <= 12){  
                                    $userShedduleArr[$username][$service][$key]['morning'][] = $values;
                                }

                                if(isset($hour[0]) && $hour[0] >= 12 && $hour[0] <= 18 ){    
                                    $userShedduleArr[$username][$service][$key]['afternoon'][] = $values;
                                }

                                if(isset($hour[0]) && $hour[0] >= 18 && $hour[0] <= 24){  
                                    $userShedduleArr[$username][$service][$key]['night'][] = $values;
                                }            
                            }
                        }  
                    }  
                }  

                ?>

            <?php 
                $tableOnlyOnFirst = '';               
                $currentDay = 0;
                $inc = 0;
            ?>

            <?php foreach($userShedduleArr as $username => $valueHoursArr): ?> 

                <?php foreach($valueHoursArr as $services => $arrServices): ?> 
                    
                    <?php foreach($arrServices as $dayKey => $valuesDay): ?>  

                        <div class="row" id="mobile-hours-<?=$services ?>-<?= $username ?>-<?= strtotime($dayKey) ?>"  style="display:none">
                        <?php 
                        $str = '';
                            
                            foreach($valuesDay as $keyDay => $values){                    

                            $str .='<div class="col text-center display-values-for-desktop" >';
                            $str .= '<h4>'.Yii::t('app', $keyDay).'</h4>';

                            foreach($values as $hour)  {   

                                $str .= '<div>';

                                    switch($keyDay){
                                        case 'morning':                                
                                            $str .= '<a href="#" class="btn btn-modern btn-lg btn-light rounded-0 mb-2 mt-2">'
                                                .$hour
                                                .'</a>';
                                            break;
                                        case 'afternoon':
                                            $str .= '<a href="#" class="btn btn-modern btn-lg btn-light rounded-0 mb-2 mt-2">'
                                            .$hour
                                            .'</a>';
                                            break;
                                        case 'night':
                                            $str .= '<a href="#" class="btn btn-modern btn-lg btn-light rounded-0 mb-2 mt-2">'
                                            .$hour
                                            .'</a>';
                                            break;
                                        default:
                                            $str .= '';
                                        break;
                                    }

                                $str .= '</div>';
                            }     

                            $str .='</div>';
                            } 

                            echo $str;

                        
                        ?>                                               
                    </div>       
                    <?php $tableOnlyOnFirst = $username ?>   
                    <?php endforeach; ?>    
                <?php endforeach; ?>    
            <?php endforeach; ?> 

        <!-- End Mobile Start -->                       
       
    </div>
</div>
