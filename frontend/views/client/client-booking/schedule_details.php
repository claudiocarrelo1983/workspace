<?php


use yii\db\Query;
use yii\helpers\Url;
use yii\helpers\Html;
use common\Helpers\Helpers;
use yii\widgets\ActiveForm;

$query = new Query;

$filter = [];
$closed = 0;
$arrSheddule = [];
$days = array('sunday', 'monday', 'tuesday', 'wednesday','thursday','friday', 'saturday');

$filter['guid'] = Yii::$app->request->get('team');
$filter['location_code'] = Yii::$app->request->get('location');
$date = (Yii::$app->request->get('day') == '*') ? strtotime(date('Y-m-d')) : Yii::$app->request->get('day');
//$filter['service_code'] = Yii::$app->request->get('service');

$arrTeam = Helpers::arrayTeam($filter);

/*
print"<pre>";
print_r($filter);
print_r($arrTeam);
die();

*/

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
            $arrSheddule[strtotime($dayHour)][] = [
                //'hour' => date('H:i',$hour),
                'full_name' => $member['full_name'],
                'guid' => $member['guid'],
            ];
    
        }     
    
        $start += $sum;
    
    }

   
}


    $filterSheddule['team_username'] = Yii::$app->request->get('team');
    $filterSheddule['location_code'] = Yii::$app->request->get('location');
    $filterSheddule['date'] = date('Y-m-d',$day);
    $arrSheddules = Helpers::arraySheddule($filterSheddule);

    foreach($arrSheddules as $value){

        unset($arrSheddule[strtotime($value['time'])]);
    }

    $userShedduleArr = [];

    ksort($arrSheddule);

    foreach($arrSheddule as $hourKey => $arrValues) {

        foreach($arrValues as $guid => $value) {

            $hour = date('H', $hourKey);

            if(date('Y-m-d H:i',$hourKey) > date('Y-m-d H:i')){

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
    }     


    $inc = 0;    


 ?>

<?php $form = ActiveForm::begin(); ?>  

<div class="row">
    <?php if($closed == 'true'){  ?>

        <h4 class="text-10 text-center py-5">
            <?= Yii::t('app', 'Closed') ?>
        </h4> 

    <?php }else{ ?>   

        <?php if(Yii::$app->session->hasFlash('error')):?>
            <div class="col-lg-12" >
                <div class="alert alert-danger alert-dismissible mt-5" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>
                        <?= Yii::$app->session->getFlash('error')  ?>
                    </strong> 
                </div> 
            </div> 
        <?php endif; ?>
        
        <?php  foreach($userShedduleArr as $keyDay => $arrServices): ?> 

            <div class="col text-center pt-5" >
                <div class="row" >
                <h4>
                    <?= Yii::t('app', $keyDay) ?>
                </h4> 

                <?php  foreach($arrServices as $dayHour => $values): ?>
                    
                    <div class="col-lg-6" >
                        <?php                    

                            echo $form->field($model, 'time', 
                                    ['template' => '{input}']
                                )->radio(
                                [
                                    'class' => 'd-none imgbgchk input-display-services p-0 m-0', //d-none imgbgchk 
                                    'uncheck' => null,
                                    'label' => '',
                                    'radioTemplate' => '{input}', 
                                    'value' => $dayHour,
                                    'id' => 'choice-schedule-'.$dayHour,
                                    'onclick' => 'this.form.submit()'
                                ]);                     

                        ?>
                        <label type="button" id="choice-schedule-<?= $dayHour ?>" for="choice-schedule-<?= $dayHour ?>" class="btn w-100 btn-modern btn-lg btn-success rounded-0 mb-2 mt-2" data-bs-toggle="modal" data-bs-target="#client-create-09:00" onclick="checkScheduleTick(this)">
                            <?= date('H:i',$dayHour) ?>
                        </label>
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

<?php ActiveForm::end(); ?> 