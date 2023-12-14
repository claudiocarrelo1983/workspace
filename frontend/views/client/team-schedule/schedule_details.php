<?php

use frontend\controllers\TeamScheduleController;
use yii\db\Query;
use common\Helpers\Helpers;


$filter = [];
$arrSheddule = [];
$days = array('sunday', 'monday', 'tuesday', 'wednesday','thursday','friday', 'saturday');

$filter['guid'] = Yii::$app->user->identity->guid;
$arrTeam = Helpers::arrayTeam($filter);

foreach($arrTeam as $member){

    $arrWeek = ((is_array(json_decode($member['sheddule_array'],true))) ? json_decode($member['sheddule_array'], true) : []);

    $resultWeekDays = $arrWeek[$days[date('w', $day)]];
    $closed = $resultWeekDays['closed'];
    $start = strtotime($resultWeekDays['start']); //9:00
    $end = strtotime($resultWeekDays['end']); //18:00
    $lunchFrom = $resultWeekDays['break_start']; //13:00
    $lunchTo = $resultWeekDays['break_end']; //14:00

    $startAfterLunch = $start;
   
    $serviceTimeMin = (empty($member['time_window']) ? '60' : $member['time_window']);    
   
    $i = 0;
    while ($start < $end) {
     
        $hour = $start;

        if($hour >= strtotime($lunchTo)){
            if($i == 0){
                $start = strtotime($lunchTo);
                $hour = $start;
                $i++;
            }        
        }        

        $sum = (60*$serviceTimeMin);
    
        if ($hour < strtotime($lunchFrom) || $hour >= strtotime($lunchTo)){  
           
            $dayHour = date('Y-m-d H:i',strtotime(date('Y-m-d',$day).' '.date('H:i',$hour)));
            $arrSheddule[strtotime($dayHour)] = [
                'hour' => date('Y-m-d H:i',$hour),
                'full_name' => $member['full_name'],
                'guid' => $member['guid'],
                'type' => 1,
                'id' => 0,
                'confirm' => 0
            ];
    
        }     
    
        $start += $sum;
    
    }
}


$filterSheddule['team_username'] = Yii::$app->user->identity->guid; 
$filterSheddule['missed'] = 0; 
$filterSheddule['date'] = date('Y-m-d',$day);
$arrSheddules = Helpers::arraySheddule($filterSheddule);

foreach($arrSheddules as $value){ 
    if(isset($arrSheddule[strtotime($value['date'].' '.$value['time'])])){
        $arrSheddule[strtotime($value['date'].' '.$value['time'])] = array_merge( $arrSheddule[strtotime($value['date'].' '.$value['time'])], ['confirm' => $value['confirm'], 'type' => 2, 'id' => $value['id']]); 
    }
}


    $userShedduleArr = [];

    ksort($arrSheddule);

    foreach($arrSheddule as $hourKey => $arrValues) {

        foreach($arrValues as $guid => $value) {

            $hour = date('H', $hourKey);
            $current = strtotime(date("Y-m-d"));
            $date    = strtotime(date('Y-m-d',strtotime($arrValues['hour'])));

          
            if(strtotime(date('Y-m-d',$day)) == strtotime(date('Y-m-d'))){           
                $datediff = $date - $current;
                $difference = floor($datediff/(60*60*24));
                if($difference==0){                
                    if (strtotime($arrValues['hour']) < strtotime(date('H:i',time()))){      
                        
                        $active = 1;

                        //actual time makes it red
                        foreach($arrSheddules as $value){          
                            if(strtotime($value['date'].' '.$value['time']) == $hourKey){                              
                                $arrValues = array_merge($arrValues, ['type' => 2]);                           
                                $active = 0;  
                                break;                         
                            }                          
                        }   

                        //changes to edit
                        if($active == 1){
                            $arrValues = array_merge($arrValues, ['type' => 0]); 
                        }                                        
                    }               
                }
            }
           

            if($hour <= 12){  
                $userShedduleArr['morning'][$hourKey] = $arrValues;
            }

            if($hour > 12 && $hour <= 18 ){    
                $userShedduleArr['afternoon'][$hourKey] = $arrValues;
            }

            if($hour > 18 && $hour <= 24){  
                $userShedduleArr['night'][] = $arrValues;
            }  
        }
    }     


    $inc = 0;    

    /*
    print"<pre>";
    print_r($userShedduleArr);
    die();

    */

 ?>


<div class="row">
    <?php if($closed == 'true'){  ?>

        <h4 class="text-10 text-center py-5">
            <?= Yii::t('app', 'Closed') ?>
        </h4> 

    <?php } else { ?>         

        <?php if (Yii::$app->session->getFlash('valid') !== NULL){ ?>      
            <div class="col-12 py-3">
                <div id="alert-block" class="alert alert-danger">  
                    <div class="row"> 
                        <div class="col">
                            <?=  Yii::$app->session->getFlash('valid'); ?>
                        </div>
                        <div class="col text-right">
                            <button type="button" class="btn-close" onclick="jQuery('#alert-block').hide();"></button>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php  foreach($userShedduleArr as $keyDay => $arrServices): ?> 

            <div class="col text-center pt-2" >
                <div class="row" >
                <h4>
                    <?= Yii::t('app', $keyDay) ?>
                </h4>               

                <?php  foreach($arrServices as $dayHour => $values): ?>
                    <div class="col-lg-6" >
                        <?php

                            switch ($values['type']) {
                                //done
                                case 0:
                                    echo '<button data-bs-toggle="modal" data-bs-target="#client-create-'.$inc.'" class="btn w-100 btn-danger btn-lg btn-s rounded-0 mb-2 mt-2" >
                                                '.date('H:i',$dayHour).'
                                            </button>';
                                    break;
                                //available
                                case 1:
                                    echo '<button data-bs-toggle="modal" data-bs-target="#client-create-'.$inc.'" class="btn w-100 btn-modern btn-lg btn-success rounded-0 mb-2 mt-2" >
                                                '.date('H:i',$dayHour).'
                                            </button>';                             
                                    break;
                     
                                //booked
                                case 2:

                                    if(isset($values['confirm']) && $values['confirm'] == '1'){
                                        echo '<div data-bs-toggle="modal"  class=" w-100 text-4 rounded-0 mb-2 mt-2" >
                                                <s>
                                                    '.date('H:i',$dayHour).'
                                                </s>
                                             </div>';
                                    }else{
                                        echo '<button data-bs-toggle="modal" data-bs-target="#client-view-'.$inc.'" class="btn w-100 btn-modern btn-lg btn-dark rounded-0 mb-2 mt-2" >
                                                '.date('H:i',$dayHour).'
                                              </button>';
                                    }                            
                          
                            
                                    $modelEdit =  TeamScheduleController::findModel($values['id']);
                            
                                    echo    $this->render('@frontend/views/client/team-schedule/modals/schedule_modal_view', 
                                    [
                                        'model' => $modelEdit,                           
                                        'inc' => $inc,    
                                        'date' => $day,    
                                        'dayHour' => $dayHour,                        
                                    
                                    ]); 
                                
                                    echo    $this->render('@frontend/views/client/team-schedule/modals/schedule_modal_confirm', 
                                    [
                                        'model' => $modelEdit,                           
                                        'inc' => $inc,    
                                        'date' => $day,    
                                        'dayHour' => $dayHour,                        
                                    
                                    ]); 

                                    echo    $this->render('@frontend/views/client/team-schedule/modals/schedule_modal_cancel', 
                                    [
                                        'model' => $modelEdit,                           
                                        'inc' => $inc,    
                                        'date' => $day,    
                                        'dayHour' => $dayHour,                        
                                    
                                    ]); 


                                    echo    $this->render('@frontend/views/client/team-schedule/modals/schedule_modal_missed', 
                                    [
                                        'model' => $modelEdit,                           
                                        'inc' => $inc,    
                                        'date' => $day,    
                                        'dayHour' => $dayHour,                        
                                    
                                    ]); 

                                    echo $this->render('@frontend/views/client/team-schedule/modals/schedule_modal_edit', 
                                    [
                                        'model' => $modelEdit,                           
                                        'inc' => $inc,    
                                        'date' => $day,    
                                        'dayHour' => $dayHour,                      
            
                                    ]);                            
                            
                                    break;
                                case 3:
                                    echo '<button data-bs-toggle="modal" data-bs-target="#client-create-'.$inc.'" class="btn w-100 btn-modern btn-lg btn-success rounded-0 mb-2 mt-2" >
                                                '.date('H:i',$dayHour).'
                                            </button>';                             
                                    break;
                            }      

                      
                            echo $this->render('@frontend/views/client/team-schedule/modals/schedule_modal_create', 
                            [
                                'model' => $model,                           
                                'inc' => $inc,    
                                'date' => $day,    
                                'dayHour' => $dayHour,                      

                            ]);       

                        ?>
                </div>
            <?php  
                $inc++;        
     
                $keyDay++;

                
                endforeach;       
            ?>
             </div>
        </div>
    <?php
            
            endforeach;
        };

    ?>   
</div>
