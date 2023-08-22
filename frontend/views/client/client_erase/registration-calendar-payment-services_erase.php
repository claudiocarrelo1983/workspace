<?php

use yii\db\Query;
use yii\helpers\Html;
use yii\helpers\Url;

$daysWeek = array( 'sun','mon', 'tue', 'wed','thu','fri', 'sat');       

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;


$begginingDate = '';

//finds Monday
for($y = 0; $y < 7; $y ++){   
    $weekNumberToFind = date("w", strtotime("-".$y." day")); 
    $d = date("Y-m-d", strtotime("-".$y." day")); 
    if(1 == $weekNumberToFind){
        $begginingDate =  $d;
        break;                           
    }                                
}

if(!empty(Yii::$app->request->get('week'))){
    if(Yii::$app->request->get('week') > strtotime(date("Y-m-d"))){
        $begginingDate = date("Y-m-d", Yii::$app->request->get('week')); 
    } 
}

$monthName = date("M", strtotime($begginingDate));
$year = date("Y", strtotime($begginingDate));
$sheddulleArr = [];
$maxLines = 0;

foreach($companyArr as $location){

    $sheddulleJson = json_decode($location['sheddule_array']);
    $intervalTime = '00:60:00';
    $time = '60';

    foreach($sheddulleJson as $key => $value) {    

        $start = strtotime($value->start);
        $end = strtotime($value->end);   
        $breakStart =  strtotime($value->break_start);           
        $breakEnd = strtotime($value->break_end);
        $diff = $end - $start;
        $hours = $diff / ( 60 * $time );         
    
        for($y = 0; $y <= 8; $y ++){              
            if($value->closed ==  'false') {             

                $hoursDay = strtotime($value->start."+".$y." hour");            
                if ($hoursDay <  $breakStart || $hoursDay >  $breakEnd) {
                    if($hoursDay < $end){
                        $sheddulleArr[substr($key, 0, 3)][] =  date("H:i", $hoursDay); 
                    }              
                }                        
            }                
        }    
    }  
}
    
$sheddulle = (array) $sheddulleArr;

foreach($sheddulle as $value){
    $maxLines = (count($value) > $maxLines) ? count($value) : $maxLines;
}



$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

?>

<input id="qty1" type="hidden" value="<?= date('d') ?>" data-min="<?= date('d') ?>" data-max="<?= strtotime(date('Y-m-d'). ' + 20 day')?>" class="qty"/>    

<div class="px-3"> 
    <div class="justify-content-center">
        <table id="table-services" class="table px-5 mb-5" style="display:none">
            <thead>                             
                <tr class="border">
                    <th class="prev text-center py-3" style="font-size: 30px;">               
                        <?= Html::a(
                            '«',                                             
                            Url::toRoute(['client/registration-calendar-payment',
                            'code' => $code, 
                            'week' => strtotime(date('d-m-Y',date(strtotime("-7 day", strtotime($begginingDate))))) ])
                        ) ?> 
                    </th>
                    <th colspan="5" class="datepicker-switch text-center  py-3 text-4" >                   
                            <?php 
                                echo Yii::t('app', strtolower($monthName));    
                                echo ' '.$year; 
                            ?> 
                            <span class="mx-5"></span>
                            <?= Html::a(
                                'Today',                                             
                                Url::toRoute(['client/registration-calendar-payment',    'code' => $code]),
                                [     
                                    'class' => 'btn btn-modern btn-primary btn-outline btn-arrow-effect-1 hidden-sm'                                             
                                ]
                            ) ?> 
                       
                    </th>
                    <th class="nex text-center  py-3" style="font-size: 30px;">                  
                        <?= Html::a(
                            '»',                                             
                            Url::toRoute(['client/registration-calendar-payment',
                            'code' => $code, 
                            'week' => strtotime(date('d-m-Y',date(strtotime("+7 day", strtotime($begginingDate))))) ])
                        ) ?>                 
                    </th>
                </tr>
                <tr>           
                    <?php
                        //$week = date("Y-m-d", strtotime($begginingDate."+".$x." day")); 
                        $daysWeekStartingMond = array('mon', 'tue', 'wed','thu','fri', 'sat', 'sun');    
                        foreach($daysWeekStartingMond  as  $day){                   
                    ?>
                        <th class=" dow text-center text-3 border">
                            <?= Yii::t('app', $day) ?>
                        </th>
                    <?php
                        }
                    ?>                              
                </tr>                        
            </thead>
            <tbody>      
                <tr class="p-2 ">
                    <?php       

                        foreach($daysWeek as $x =>  $value){   
                            
                            $i = 0;                                                                         
                            $fullDate = date("Y-m-d", strtotime($begginingDate."+".$x." day"));  
                            $day = date('d', strtotime($fullDate));                           
                            $weekNumber = date('W', strtotime($fullDate)); 
                            
                            $classToday = '';

                            if(strtotime(date("Y-m-d")) ===  strtotime($fullDate)){
                                $classToday = 'background-date-choice';
                            }                       
                    
                    ?>                           
                        <td class="text-center border <?= $classToday ?> day-<?= strtotime($fullDate) ?>-"> 
                            <a class="text-hour text-4" onclick="goToThisPage(this)">
                                <?= $day ?>
                            </a>         
                        </td>
                    <?php
                        }
                    ?>                       
                </tr>
                <?php
                foreach ($companyLocations  as $locationT){
                    foreach ($servicesArr  as $serviceT){
                        foreach ($teamArr  as $valueT){
                            for($line = 0; $line < $maxLines; $line ++){ 
                    
                ?>
                                <tr>   
                                    <?php for($col = 0; $col < 7; $col ++){ ?>            
                                        <td id="column-<?= $locationT['location_code'] ?>-<?= $serviceT['service_code'] ?>-<?= $valueT['username_code'] ?>"  class="text-center  display-values-for-mobile day-column border " style="display:none">  
                                            <?php
                                            
                                                $fullDate = date("Y-m-d", strtotime($begginingDate."+".$col." day"));  
                                                $day = date('d', strtotime($fullDate)); 
                                                $week = date('w', strtotime($fullDate));
                                                $weekDay = $daysWeek[$week];                                 

                                                if(isset($sheddulle[$weekDay][$line])){                                       
                                        
                                                    $h = $sheddulle[$weekDay][$line];
                                                    $d = $fullDate;
                                                    $username = '';
                                                    
                                                    foreach ($teamArr  as $valueTeam){
                                                        foreach ($servicesArr  as $serviceT){
                                                            if(isset($shedduleTableArr[$locationT['location_code']][$serviceT['service_code']][$valueTeam['username_code']])){
                                                                if($valueTeam['username_code'] == $valueT['username_code']){
                                                                    $username = $valueTeam['username_code'];                                                 
                                                                    break;
                                                                }                                                      
                                                            }
                                                        }
                                                    }

                                                    if(isset($shedduleTableArr[$locationT['location_code']][$serviceT['service_code']][$username][strtotime($d)][strtotime($h)])){
                                                            echo "----";
                                                    }else{
                                                        
                                                        if(strtotime($fullDate) >= strtotime(date("Y-m-d"))){
                                                            echo $sheddulle[$weekDay][$line].' '.$valueT['username_code'];
                                                        ?>
                                                            <input type="radio" name="imgbackground" > 

                                                        <?php
                                                        }else{
                                                            echo "----";
                                                        }                                
                                                    }                                
                                                
                                                }else{
                                                    echo "----";
                                                }

                                            ?>                                
                                        </td>    
                                    <?php }; ?>                                                                          
                                </tr> 
                <?php 
                            }
                        }
                    }
                }
                ?>         
            </tbody>
        </table>    
    </div>
</div>


    












