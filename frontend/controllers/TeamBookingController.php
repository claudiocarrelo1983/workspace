<?php

namespace frontend\controllers;


use common\models\ShedduleSearch;
use frontend\Models\ClientsSearch;
use yii\web\Controller;
use common\models\LoginForm;
use yii\db\Query;
use yii\helpers\Url;
use common\models\Clients;
use common\models\User;
use common\Helpers\Helpers;
use common\models\Events;
use common\models\Sheddule;
use common\models\Services;
use common\models\GeneratorJson;
use frontend\models\SignupClientForm;
use yii\web\NotFoundHttpException;

use Yii;
//Yii::$app->language = 'en-EN';

class TeamBookingController extends Controller
{
       

    public function actionIndex()
    { 

        if (Yii::$app->user->isGuest) {

            //return $this->goHome();
            $companyCode = Yii::$app->request->get('code');
                     
            return $this->redirect(['/'.$companyCode]);   
        }       

        $modelSheddule = new Sheddule();      
        $this->layout = 'registration';  
        Yii::$app->session->setFlash('valid', null);   

        //$dateGet = Yii::$app->request->get('day');
        //$date = ((empty($dateGet)) ? strtotime(date('Y-m-d')) : $dateGet);
        $day = ((isset($this->request->post()['date'])) ? date("Y-m-d", strtotime($this->request->post()['date'])) : date('Y-m-d'));

        $modelSheddule->team_username = Yii::$app->user->identity->guid;
        //searchs for date
        //$this->actionShedduleSearch();    


        if ($this->request->isPost && $modelSheddule->load($this->request->post())) {    
     
            $modelSheddule->canceled = 0;
            $modelSheddule->confirm = 0;
            $modelSheddule->missed = 0;
            $modelSheddule->booking_code = 'b'.Helpers::generateRandowHumber(3);
            $modelSheddule->company_code = Helpers::findCompanyCode();      

            switch ($modelSheddule->type) {
                case 1:              
                        //Cancel
                        $modelSheddule->canceled = 1;
                        $day =  $modelSheddule->date; 
                        $this->actionShedduleCancel($modelSheddule);                        
                    break;
                case 2:
                        //Confirm
                        $modelSheddule->confirm = 1;
                        $day =  $modelSheddule->date; 
                        $this->actionShedduleCheck($modelSheddule);                    
                    break;
                case 3:
                        //Missed
                        $modelSheddule->missed = 1;
                        $day =  $modelSheddule->date;                        

                        $this->actionShedduleMissed($modelSheddule);                      
                    break;
                default:

                    //Create  
                    if(empty($modelSheddule->id)){    

                        $modelSheddule->client_username = '*'; //'c'.Helpers::generateRandowHumber();
                        $modelSheddule->company_code = Yii::$app->user->identity->company_code; 
                        $modelSheddule->location_code = Yii::$app->user->identity->location_code;
                        $modelSheddule->service_name = Helpers::findServiceName($modelSheddule->service_code);

                        $this->actionShedduleCreate($modelSheddule);

                    }else{                   
                        $this->actionShedduleEdit($modelSheddule);                      
                    }       

                    break;
            }                      
        }         
            
       
        return $this->render('/client/team-booking/index', [    
            'model' => $modelSheddule,
            'day' =>  $day,
            'username' => Yii::$app->user->identity->guid,
            'time' => Yii::$app->request->get('time'),
            'code' => Yii::$app->request->get('code'),     
        ]);
    }

    public function actionShedduleSearch()
    {
        if($this->request->isPost && isset($this->request->post()['date'])) {
            $date = strtotime($this->request->post()['date']);            
       
            return $this->redirect(['/sheddule-organizer', 'day' => $date]);
        }    
    }

    public function actionShedduleEdit($modelSheddule)
    {
        
        $errorMessage = Yii::t('app', 'occupied_error_message', [
            'time' => date('H:i', strtotime($modelSheddule->time)),
        ]);     
        
        if($modelSheddule->validate()){
                $modelSheddule->save();
        }else{
                Yii::$app->session->setFlash('valid', $errorMessage);  
        }

        /*

        if ($this->request->isPost && $modelSheddule->load($this->request->post())) {
           

            if(!empty($modelSheddule->id)){

                if($modelSheddule->canceled ==  0 && $modelSheddule->confirm ==  0){                      
        
                    $modelSheddule->time = date('H:i:s',strtotime($modelSheddule->time));   

                    Yii::$app->db->createCommand("UPDATE sheddule SET 
                        full_name=:full_name, 
                        contact_number=:contact_number,
                        canceled=:canceled,
                        price_advanced=:price_advanced,
                        email = :email,
                        nif = :nif,         
                        time = :time,
                        date = :date
                    WHERE id=:id")
                    ->bindValue(':full_name', $modelSheddule->full_name)
                    ->bindValue(':contact_number', $modelSheddule->contact_number)
                    ->bindValue(':email', $modelSheddule->email)
                    ->bindValue(':nif', $modelSheddule->nif)
                    //->bindValue(':service_cat', $modelSheddule->service_cat) 
                    ->bindValue(':canceled', $modelSheddule->canceled)   
                    ->bindValue(':price_advanced', (empty($modelSheddule->price_advanced) ? 0 : $modelSheddule->price_advanced))           
                    ->bindValue(':time', $modelSheddule->time)
                    //->bindValue(':date', $modelSheddule->date)
                    ->bindValue(':date', date('Y-m-d', strtotime(Yii::$app->request->post()['date'])))
                    ->bindValue(':id', $modelSheddule->id)
                    ->execute();                   
                    

                }
            }
        }
        */
    }

   
    public function actionShedduleCreate($modelSheddule)
    {
      
        if ($this->request->isPost && $modelSheddule->load($this->request->post())) {
           
            if(empty($modelSheddule->id)){

                $modelSheddule->date = ((isset($this->request->post()['date'])) ? date('Y-m-d', strtotime($this->request->post()['date'])): $modelSheddule->date);
              
                $modelSheddule->client_username = 'c'.Helpers::generateRandowHumber();
                $modelSheddule->company_code = Yii::$app->user->identity->company_code; 
                $modelSheddule->location_code = Yii::$app->user->identity->location_code; 
                $modelSheddule->service_name = Helpers::findServiceName($modelSheddule->service_code);
                $serviceFound = Services::findOne(['service_code' => $modelSheddule->service_code]);

                if(!empty($serviceFound)){
                    $modelSheddule->price = $serviceFound->price;
                    $modelSheddule->price_range = $serviceFound->price_range;
                    $modelSheddule->currency = $serviceFound->currency;
                }
              
      
               if($modelSheddule->validate()){
                    $modelSheddule->save();
               }else{
                    Yii::$app->session->setFlash('valid', Yii::t('app','occupied_error_message_datetime',
                        [                         
                            'time' => date('H:i', strtotime($modelSheddule->time)),
                            'date' => date('Y-m-d', strtotime($modelSheddule->date)),
                        ]
                    ));                  
               }
            
            }
        }

    }
   

    public function actionShedduleCancel($modelSheddule)
    {

        if ($this->request->isPost && $modelSheddule->load($this->request->post())) {
           
            if(!empty($modelSheddule->id)){

                if($modelSheddule->canceled ==  1){                 
                    Yii::$app->db->createCommand("DELETE 
                    FROM sheddule 
                    WHERE id=:id")                
                    ->bindValue(':id', $modelSheddule->id)
                    ->execute();

                }
            }
        }

    }

    public function actionShedduleMissed($modelSheddule)
    {
        if ($this->request->isPost && $modelSheddule->load($this->request->post())) {
           
            if(!empty($modelSheddule->id)){

                if($modelSheddule->missed ==  1){       
                                         
                    Yii::$app->db->createCommand("UPDATE sheddule SET 
                        missed=:missed
                    WHERE id=:id")
                    ->bindValue(':missed', '1') 
                    ->bindValue(':id', $modelSheddule->id)
                    ->execute();

                }
            }
        }
    }
    
    public function actionShedduleCheck($modelSheddule)
    {
        if ($this->request->isPost && $modelSheddule->load($this->request->post())) {
           
            if(!empty($modelSheddule->id)){

              if($modelSheddule->confirm ==  1) {
                 
                    Yii::$app->db->createCommand("UPDATE sheddule SET 
                        confirm=:confirm
                    WHERE id=:id")
                    ->bindValue(':confirm', $modelSheddule->confirm) 
                    ->bindValue(':id', $modelSheddule->id)
                    ->execute();
                    
                }
            }
        }
    }

    public function actionGetUserServicesAndHour()
    {      

        $resultArr = [           
            'services' => $this->actionGetUserServices(1),
            'hour' => $this->actionGetUserHours(),
        ];

        echo  json_encode($resultArr);  

    }

    public function actionGetUserHours(){
        
        $day = strtotime((isset($_POST['day'])? $_POST['day'] : date("Y-m-d")));
        $username  = (isset($_POST['username'])? $_POST['username'] : '');
        
        $arrSheddule = [];
        $days = array('sunday', 'monday', 'tuesday', 'wednesday','thursday','friday', 'saturday');

        $filter['guid'] = $username;
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

        return  Helpers::dropdownSheddulleSortArrHours($arrSheddule);
        
    }
    public function actionGetUserServices($array = 0)
    {

        $username = (isset($_POST['username'])? $_POST['username'] : '*');
        $type = (isset($_POST['type'])? $_POST['type'] : '*');

        $userArr = Helpers::dropdownServices(['username'  => $username]);
        $userArr = array_merge(['' => Yii::t('app', 'select_services')],  $userArr);

        if($array == 1){
            return $userArr;
        }

        $resultArr = [           
            'services' => $userArr,
            'type' => $type
        ];   

        $myJSON = json_encode($resultArr);
        
     
        echo $myJSON;

    }

    public function actionGetTeamScheddule()
    {            

        $model = new Sheddule();
       
        $coin = (isset($_POST['coin'])? $_POST['coin'] : '€');
        $url = (isset($_POST['url'])? $_POST['url'] : '');
        $username = (isset($_POST['username'])? $_POST['username'] : '*');
        $date = (isset($_POST['date']) ? strtotime($_POST['date']) : strtotime(date('Y-m-d')));   

        $model->team_username= $username;
        
        $arrSheddule = [];
        $days = array('sunday', 'monday', 'tuesday', 'wednesday','thursday','friday', 'saturday');

        $arrTeam = Helpers::arrayTeam(['guid' => $username]);
        $day = date('Y-m-d', ($date));   
        $oneLessDay = date('d-m-Y', strtotime($day. '-1 day'));
        $oneMoreDay = date('d-m-Y', strtotime($day. '+1 day'));
        
        foreach($arrTeam as $member){
        
            $arrWeek = ((is_array(json_decode($member['sheddule_array'],true))) ? json_decode($member['sheddule_array'], true) : []);
        
            $resultWeekDays = $arrWeek[$days[date('w', $date)]];
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
                   
                    $dayHour = date('Y-m-d H:i',strtotime(date('Y-m-d',$date).' '.date('H:i',$hour)));
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


        
        $filterSheddule = []; 

        $filterSheddule['team_username'] = $username;
        $filterSheddule['date'] = date('Y-m-d',$date);

        $arrSheddules = Helpers::arraySheddule($filterSheddule);  

        foreach($arrSheddules as $key => $value){

            unset($arrSheddule[$key]);
        }

            $userShedduleArr = [];

            ksort($arrSheddule);

            foreach($arrSheddule as $key => $arrValues) {

                foreach($arrValues as $guid => $value) {

                    $explod = explode('-',$key);

                    $hourKey = $explod[0];
                    $hour = date('H', $hourKey);

                    if(date('Y-m-d H:i',$hourKey) > date('Y-m-d H:i')){

                        if($hour <= 12){  
                            $userShedduleArr['morning'][$hourKey] = $arrValues;
                        }

                        if($hour > 12 && $hour <= 18 ){    
                            $userShedduleArr['afternoon'][$hourKey] = $arrValues;
                        }

                        if($hour > 18 && $hour <= 24){  
                            $userShedduleArr['night'][$hourKey] = $arrValues;
                        }  
                    }
                }
            }   
   
        return $this->renderAjax('@frontend/views/client/team-booking/schedule_details', 
        [  
            'model' => $model,
            'day' => $date,
            'coin' => $coin,
            'url' => $url,
            'username' => $username,
            'oneLessDay' => $oneLessDay,
            'oneMoreDay' => $oneMoreDay,
            'closed' => $closed,
            'userShedduleArr' => $userShedduleArr         
        ]);


    }

    public static function findModel($id)
    {
        if (($model = Sheddule::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
