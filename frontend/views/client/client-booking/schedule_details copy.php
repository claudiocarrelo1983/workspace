<?php

use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\db\Query;
use yii\helpers\Url;
use yii\helpers\Html;
use common\Helpers\Helpers;

$query = new Query;

$filter = [];
$companyLocationArr = [];
$arrServices = [];

if(!empty(Yii::$app->request->get('location'))){
    if(Yii::$app->request->get('location') != 'l'){
        $filter['location_code'] = Yii::$app->request->get('location');
    }  
}


$arrayCompanyLocations = Helpers::arrayCompanyLocations($filter);


foreach($arrayCompanyLocations as $companyLocations){
    $companyLocationArr[$companyLocations['location_code']] = $companyLocations;

    $arrWeek = ((is_array(json_decode($companyLocations['sheddule_array'],true))) ? json_decode($companyLocations['sheddule_array'], true) : []);


    $days = array('sunday', 'monday', 'tuesday', 'wednesday','thursday','friday', 'saturday');       


    $resultWeekDays = $arrWeek[$days[date('w', strtotime(date('Y-m-d')))]];
    $closed = $resultWeekDays['closed'];
    $start = strtotime($resultWeekDays['start']); //9:00
    $end = strtotime($resultWeekDays['end']); //18:00
    $lunchFrom = $resultWeekDays['break_start']; //13:00
    $lunchTo = $resultWeekDays['break_end']; //14:00
    $serviceTimeMin = '60';

    
    $arrServices = [];
    
    
    while ($start < $end) {
      
        $hour = $start;         
    
        $sum = (60*$serviceTimeMin);
    
        if ($hour < strtotime($lunchFrom) || $hour > strtotime($lunchTo)){      
        
            $arrServices[date('H:i',$hour)] = [
                'location_code' => '',
                'team_username' => '',
                'category' => 'cat_2',
                'canceled' => '1',
                'confirm' => 0,
                'full_name' => 'Cláudio Carrelo',
                'contact_number' => '967235820',
                'email' => 'claudio@gmail.com',
                'nif' => '224076736',
                'date' => date('Y-m-d'), 
                'modal_code' => '2', //strtotime(date('H:i',$hour))
            ];
    
        }
     
    
        $start += $sum;
    
    }
   
}







//$arrSheddule = Helpers::arraySheddule();

$arrSheddule = $query->select('*')
            ->from(['sheddule'])
            ->where(
                [
                    'company_code' => Yii::$app->user->identity->company_code,
                    //'team_username' => $usernameValue, 
                    //'date' => date('Y-m-d', $date),           
                    //'canceled' => 0, 
                ])         
            ->all();


    $arrServices2 = [];

    foreach($arrSheddule as $value){
        $value['time'] = date('H:i', strtotime($value['time']));
        $arrServices2[date('H:i', strtotime($value['time']))] = $value;
    }


    $arrServices = array_merge($arrServices, $arrServices2);


    
 

    foreach($arrServices as $key => $value){
        if(isset($value['confirm']) && $value['confirm'] == 0){
            $arrHourDropdown[strtotime($key)] = $key;   
        }       
    }

    //Dropdown Hour
    //$arrHourDropdown[$start] = date('H:i',$start);
    //order by key
    ksort($arrServices);

    $teamArr = $query->select('*')
                ->from(['team'])
                ->where(
                    [
                    'company_code' => Yii::$app->request->get('company'),
                    'active' => 1              
                    ])         
                ->all();

    $this->title = 'About';
    $this->params['breadcrumbs'][] = $this->title;


    $servicesCatArr = $query->from(['sc' => 'services_category'])
            ->select([
                'sc.category_code',
                'page_code_sc_title'  => 'sc.page_code_title',
                'services_category_title' => 'sc.page_code_title',
                ])
            //->where(['sc.company' => Yii::$app->request->get('company')])
            ->orderBy(['sc.order'=>SORT_ASC])
            ->all();


    $userShedduleArr = [];

    foreach($arrServices as $hour => $schedule) {

        $schedule['hour'] = $hour;

        if($hour <= 12){  
            $userShedduleArr['morning'][] = $schedule;
        }

        if($hour > 12 && $hour <= 18 ){    
            $userShedduleArr['afternoon'][] = $schedule;
        }

        if($hour > 18 && $hour <= 24){  
            $userShedduleArr['night'][] = $schedule;
        }   
    }     



 

    /*
   


    */

    $inc = 0;    
    $closed = false;
 ?>


    <?php if($closed == 'true'){  ?>

        <h4 class="text-10 text-center py-4">
            <?= Yii::t('app', 'Closed') ?>
        </h4> 

    <?php }else{ ?>               

        <?php  foreach($userShedduleArr as $keyDay => $arrServices): ?> 

            <div class="col text-center pt-5" >
                
                <h4>
                    <?= Yii::t('app', $keyDay) ?>
                </h4> 

                <?php  foreach($arrServices as $key => $values): ?>

            
                    <?php

                        //buttons
                        echo $this->render('@frontend/views/client/client-booking/schedule_buttons_hours', 
                        [
                            'values' => $values   
                                            
                        
                        ]); 
        
                        echo $this->render('@frontend/views/client/client-booking/modals/schedule_modal_create', 
                        [
                            'values' => $values,
                            'model' => $modelShedduleSearch,       
            
                        ]); 

                    ?>
                     
            
                    <?php  if(isset($value['canceled']) && $values['canceled'] == 0){ 

                          /*

                        $this->render('@frontend/views/client/client-booking/modals/schedule_modal_create', 
                        [
                            'modelShedduleSearch' => $model,                          

                        ]); 
                                        

                      
                        //view
                        $this->render('@frontend/views/client/client-booking/schedule_modal_view', 
                        [
                            'modelShedduleSearch' => $model,                          
                        
                        ]); 

                        //edit                      
                        $this->render('@frontend/views/client/client-booking/schedule_modal_edit', 
                        [
                            'modelShedduleSearch' => $model,                          
                        
                        ]); 
                        //cancel  
                        $this->render('@frontend/views/client/client-booking/schedule_modal_cancel', 
                        [
                            'modelShedduleSearch' => $model,                          
                        
                        ]); 

                        $this->render('@frontend/views/client/client-booking/schedule_modal_confirm', 
                        [
                            'modelShedduleSearch' => $model,                          

                        ]); 
            
                        */

                    

                    }else{  
                        /*
                        $this->render('@frontend/views/client/client-booking/schedule_modal_info', 
                        [
                            'modelShedduleSearch' => $model,                          

                        ]);   
                        */    
                    }  

                $inc++;        
     
                $keyDay++;

                
                endforeach;       
            ?>
        </div>
    <?php
            
            endforeach;
        };

    ?>   


