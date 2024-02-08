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


use Yii;
//Yii::$app->language = 'en-EN';

class BookingController extends Controller
{
       
    public function actionIndex()
    {       

        $company = Helpers::findCompanyCode();     

        $display = 0; 
        $day = date('Y-m-d');   
        $oneLessDay = date('d-m-Y', strtotime($day. '-1 day'));
        $oneMoreDay = date('d-m-Y', strtotime($day. '+1 day'));
       
        if (empty($company)) {    
            return $this->goHome();
        }    

        if(isset(Yii::$app->user->identity->level) && Yii::$app->user->identity->level == 'team'){
            return $this->redirect(['/team-booking',                 
                'code' => Yii::$app->request->get('code')
            ]);   
        }
        
        $requestLogin = Helpers::booleanRequestLogin();

        if($requestLogin == true && Yii::$app->user->isGuest == true){               
            return $this->redirect(['page/login',                 
                'code' => Yii::$app->request->get('code')
            ]);       
        }

        $requestLogin = Helpers::booleanRequestLogin();

        if($requestLogin == true && Yii::$app->user->isGuest == true){       
            //return $this->redirect(['/'.$companyCode.'/login']);   ~
            return $this->redirect(['page/login',                 
                'code' => Yii::$app->request->get('code')
            ]);       
        }

        $model = new Sheddule(); 

        $companyCode = Helpers::findCompanyCode();
  
        $this->layout = 'registration';              
        
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {   

            $display = 1; 
            $day = date('Y-m-d', strtotime($model->date));   
            $oneLessDay = date('d-m-Y', strtotime($day. '-1 day'));
            $oneMoreDay = date('d-m-Y', strtotime($day. '+1 day'));

           

            //$write = Helpers::checkIfBookingExists($model->booking_code, date('Y-m-d', strtotime($model->date)), $model->time, $model->team_username, $companyCode);

            $username = Helpers::bookingRandowUsername($model->team_username, $model->time, date('Y-m-d', strtotime($model->date)), $companyCode);

            if(!(empty($username))){

                $model->team_username = $username;
                $model->booking_code = 'b'.Helpers::generateRandowHumber(3);
                $model->company_code = $companyCode;
                $model->client_username = ((isset(Yii::$app->user->identity->guid)) ? Yii::$app->user->identity->guid : '*');  

                $model->date = date('Y-m-d', strtotime($model->date));

                $filter = [
                    'service_code' => $model->service_code,
                    'company_code' =>  $model->company_code,
                    
                ];

                $arrServices = Helpers::arrayServices($filter, 'one');

                $model->service_name = (isset($arrServices['page_code_title']) ? $arrServices['page_code_title'] : '');
                $model->price = (isset($arrServices['price']) ? $arrServices['price'] : 0);
                $model->service_name = (isset($arrServices['page_code_title']) ? $arrServices['page_code_title'] : '');
                $model->currency = (isset($arrServices['currency']) ? $arrServices['currency'] : '€');

                if($model->validate()){    

                    $displayTimespan = Helpers::validationScheduleTimespan(strtotime($model->date.' '.$model->time), $companyCode);

                   
                    if(empty($model->time)){
                        $display = 1; 
                        Yii::$app->session->setFlash('error', Yii::t('app','please_choose_a_time'));   
                    }else{
                        if($displayTimespan){

                            Helpers::sendEmail($model,'confirmation');

                            Helpers::sendSms($model, 'confirmation');

                            $model->save();
                            return $this->redirect(['/booking-complete',               
                                'code' => Yii::$app->request->get('code'),  
                                'model' => $model,
                                'booking_code' => $model->booking_code
                                ]
                            ); 
                        }else{
                            Yii::$app->session->setFlash('error', Yii::t('app','timespan_validation'));  
                        }
                    }  
                    
                               
                }
            
            }else{    
                
              

                Yii::$app->session->setFlash('error', Yii::t('app','occupied_error_message_datetime',
                    [
                        'time' => $model->time,
                        'date' => date('Y-m-d', strtotime($model->date))
                    ]
                ));             
            }       
        }

        $filter = [
            'location_code' => $model->location_code,
            'guid' => $model->team_username,
        ];
  

        $result = $this->calculateUserShedduleArr($filter, strtotime($day), $companyCode);

         
        return $this->render('@frontend/views/client/booking/index', [             
            'model' => $model, 
            'day' => $day,
            'oneLessDay' => $oneLessDay,
            'oneMoreDay' => $oneMoreDay,
            'display' => $display,
            'companyCode' => $companyCode,
            'closed' => $result['closed']    ,
            'userShedduleArr' => $result['userShedduleArr'],  
            'publish' => Helpers::checkPublish(Yii::$app->request->get('code'), $this)
        ]);

    }

    public function actionUser($username)
    {  
        $company = Helpers::findCompanyCode();  
        $display = 0; 
        $day = date('Y-m-d');   
        $oneLessDay = date('d-m-Y', strtotime($day. '-1 day'));
        $oneMoreDay = date('d-m-Y', strtotime($day. '+1 day'));       

        $userArray = Helpers::arrayTeam(['username' => $username, 'company_code' => $company],'one');    

        $filter = [];

        if(empty($userArray)){             
            $this->redirect(['booking/index', 
                 'code' =>  Yii::$app->request->get('code')    
             ]);  
         }else{
            $filter['location_code'] = $userArray['location_code'];
         }    

        $companyLocations = Helpers::arrayCompanyLocations($filter, 'one');

        if(empty($companyLocations)){     
            
           $this->redirect(['booking/individual/index', 
                'code' =>  Yii::$app->request->get('code')    
            ]);  
        }
      

        $companyCode = Helpers::findCompanyCode();   
       
        if (empty($companyCode)) {    
            return $this->goHome();
        }    
        
        $requestLogin = Helpers::booleanRequestLogin();

        if($requestLogin == true && Yii::$app->user->isGuest == true){               
            return $this->redirect(['page/login',                 
                'code' => Yii::$app->request->get('code')
            ]);       
        }

        $requestLogin = Helpers::booleanRequestLogin();

        if($requestLogin == true && Yii::$app->user->isGuest == true){       
            //return $this->redirect(['/'.$companyCode.'/login']);   ~
            return $this->redirect(['page/login',                 
                'code' => Yii::$app->request->get('code')
            ]);       
        }

        $model = new Sheddule(); 

        $model->location_code = '*';

        $this->layout = 'registration';  
        $display = 0;    
    
        
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {   

            
            $display = 1; 
            $day = date('Y-m-d', strtotime($model->date));   
            $oneLessDay = date('d-m-Y', strtotime($day. '-1 day'));
            $oneMoreDay = date('d-m-Y', strtotime($day. '+1 day'));     
                
          
            $username = Helpers::bookingRandowUsername($model->team_username, $model->time, date('Y-m-d', strtotime($model->date)), $companyCode);

            if(!(empty($username))){
              
                $model->booking_code = 'b'.Helpers::generateRandowHumber(3);
                $model->company_code = $companyCode;
                $model->client_username = ((isset(Yii::$app->user->identity->guid)) ? Yii::$app->user->identity->guid : '*'); 
                $model->date = date('Y-m-d', strtotime($model->date));

                $filter = [
                    'service_code' => $model->service_code,
                    'company_code' =>  $model->company_code
                ];

                $arrServices = Helpers::arrayServices($filter, 'one');

                $model->service_name = (isset($arrServices['page_code_title']) ? $arrServices['page_code_title'] : '');
                $model->price = (isset($arrServices['price']) ? $arrServices['price'] : 0);
                $model->service_name = (isset($arrServices['page_code_title']) ? $arrServices['page_code_title'] : '');
                $model->currency = (isset($arrServices['currency']) ? $arrServices['currency'] : '€');



                if($model->validate()){                     
               
                    $displayTimespan = Helpers::validationScheduleTimespan(strtotime($model->date.' '.$model->time), $companyCode);
                   
                    if(empty($model->time)){
                        $display = 1; 
                        Yii::$app->session->setFlash('error', Yii::t('app','please_choose_a_time'));   
                    }else{
                        if($displayTimespan){

                            Helpers::sendEmail($model,'confirmation');

                            Helpers::sendSms($model, 'confirmation');

                            $model->save();
                            return $this->redirect(['/booking-complete',               
                                'code' => Yii::$app->request->get('code'),  
                                'model' => $model,
                                'booking_code' => $model->booking_code
                                ]
                            ); 
                        }else{
                            Yii::$app->session->setFlash('error', Yii::t('app','timespan_validation'));  
                        }
                    }  
                }
            
            }else{   
                $display = 1;   
                Yii::$app->session->setFlash('error', Yii::t('app','occupied_error_message_datetime',
                    [
                        'time' => $model->time,
                        'date' => date('Y-m-d', strtotime($model->date))
                    ]
                ));             
            }

        }

        $filter = [
            'location_code' => $model->location_code,
            'guid' => $model->team_username,
        ];
  

        $result = $this->calculateUserShedduleArr($filter, strtotime($day), $companyCode);
         
        return $this->render('@frontend/views/client/booking/individual/index', [             
            'model' => $model, 
            'day' => $day,
            'oneLessDay' => $oneLessDay,
            'oneMoreDay' => $oneMoreDay,
            'userArray' => $userArray,
            'display' => $display,
            'companyCode' => $companyCode,
            'companyLocations' => $companyLocations,       
            'closed' => $result['closed']    ,
            'userShedduleArr' => $result['userShedduleArr'], 
            'publish' => Helpers::checkPublish(Yii::$app->request->get('code'), $this)
        ]);

    }


    /*

    Gets Dropdown Services By Location on radio 

    */

    public function actionBookingGetServices($returnArr = '0')
    {
        $locationCode = (isset($_POST['location'])? $_POST['location'] : '*');        
        $companyCode = (isset($_POST['company_code'])? $_POST['company_code'] : '*');   
        $coin = (isset($_POST['coin'])? $_POST['coin'] : '');   

        //'username'  => $username, 
        
        $query = new Query;
  
        $serviceArr = $query->select([
            'service_code', 
            'page_code_title',     
            'title_pt',  
            'title_en',  
            'price'
        ])
        ->from('services')    
        ->andWhere([
            'company_code' => $companyCode
        ])
        ->andWhere('location_code LIKE CONCAT("%|'.$locationCode.'|%")')
        ->all();

        $arrServices = [];       
        
        foreach($serviceArr as $value){
            $arrServices[$value['service_code']] = $value['title_'.Yii::$app->language].' ('.$coin.$value['price'].')';
        }

        $arrServices = array_merge(['' => Yii::t('app', 'select_services')],  $arrServices);

        if($returnArr){
            return $arrServices;
        }    

        return $this->renderAjax('@frontend/views/client/booking/dropdowns/services', 
        [  
            'arrServices' => $arrServices, 
        ]);
    }


    /*

    Gets User By Services on Booking for Dropdown

    */
    public function actionBookingGetTeam($returnArr = '0')
    {     

        $query = new Query;

        $service = (isset($_POST['service'])? $_POST['service'] : '*');  
        $location = (isset($_POST['location'])? $_POST['location'] : '*');  
        $company = (isset($_POST['company_code'])? $_POST['company_code'] : '*');  

        $serviceArr = $query->select([
            'username',
            'service_code', 
            'page_code_title',     
        ])
        ->from('services')    
        ->where([
            'service_code'  => $service,
            'company_code'  => $company
        ])
        ->one();  

        $serviceArr = ((isset($serviceArr['username'])) ? explode('|',$serviceArr['username']) : []);
        
        $teamMembers = [];

        foreach($serviceArr as $username){
            if(!empty($username)){
                $teamArr = $query->select('*')
                ->from('user')    
                ->where([
                    'guid'  => $username,
                    'location_code' => $location,
                    'company_code' => $company
                ])
                ->one();

                if (isset($teamArr['first_name'])){
                    $teamMembers[$teamArr['guid']] =  $teamArr['first_name'].' '.$teamArr['last_name'];
                }
            }         
        }           
     
        $defaultKey = '|';

        foreach($teamMembers as $key => $value){
            $defaultKey .= $key.'|';
        }

        $teamMembers = array_merge([$defaultKey => Yii::t('app', 'any_teammember')],  $teamMembers);

        if($returnArr){
            return $teamMembers;
        }    

        return $this->renderAjax('@frontend/views/client/booking/dropdowns/team', 
        [  
            'teamMembers' => $teamMembers, 
        ]);   

    }


   /*

    Gets Date Search By Team Dropdown

    */
    public function actionBookingGetDateSearch()
    {              
     
        $date = (isset($_POST['date'])? strtotime($_POST['date']) : strtotime(date('Y-m-d')));         
        $filter['location_code'] = (isset($_POST['location'])? $_POST['location'] : '*'); 
        $filter['company_code'] = (isset($_POST['company_code'])? $_POST['company_code'] : ''); 
       
        if(isset($_POST['username']) && $_POST['username'] != '*'){
            $filter['guid'] = (isset($_POST['username'])? $_POST['username'] : '');  
        }else{    
            $filterServices['location_code'] = (isset($_POST['location'])? $_POST['location'] : '*'); 
            $filterServices['service_code'] = (isset($_POST['service'])? $_POST['service'] : '*'); 
            $values = Helpers::getJustServicesArr($filterServices,'one');    
            
      
            $filter['guid'] =  $values['username']; 
        }   

        $day = date('Y-m-d', ($date));   
        $oneLessDay = date('d-m-Y', strtotime($day. '-1 day'));
        $oneMoreDay = date('d-m-Y', strtotime($day. '+1 day')); 

      
        $result = $this->calculateUserShedduleArr($filter, strtotime($day), $filter['company_code']);
      
        return $this->renderAjax('@frontend/views/client/booking/schedule-ajax', 
        [  
            'day' => $day,
            'display' => 1,
            'companyCode' => $filter['company_code'],
            'oneLessDay' => $oneLessDay,
            'oneMoreDay' => $oneMoreDay,
            'closed' => $result['closed'],
            'userShedduleArr' => $result['userShedduleArr']      
        ]);
    }    


    /*

    Gets Date Search By Services Dropdown on Booking Individual

    */
  
    public function actionBookingIndividualGetDateSearch()
    {              
     
        $date = (isset($_POST['date'])? strtotime($_POST['date']) : strtotime(date('Y-m-d')));         
        $filter['location_code'] = (isset($_POST['location'])? $_POST['location'] : '*');       
        $filter['company_code'] = (isset($_POST['company_code'])? $_POST['company_code'] : '*'); 
        $filter['guid'] = (isset($_POST['username'])? $_POST['username'] : ''); 
  
    
        $day = date('Y-m-d', ($date));         
        $oneLessDay = date('d-m-Y', strtotime($day. '-1 day'));
        $oneMoreDay = date('d-m-Y', strtotime($day. '+1 day')); 


       $result = $this->calculateUserShedduleArr($filter, strtotime($day), $filter['company_code']);

        return $this->renderAjax('@frontend/views/client/booking/individual/schedule-ajax', 
        [  
            'day' => $day,
            'display' => 1,
            'companyCode' => $filter['company_code'],
            'oneLessDay' => $oneLessDay,
            'oneMoreDay' => $oneMoreDay,
            'closed' => $result['closed'],
            'userShedduleArr' => $result['userShedduleArr']      
        ]);
    }

    
    /*

    Generates Sheddulle Board and Date Search

    */
    
    public function calculateUserShedduleArr($filter, $date, $companyCode){

        $arrTeam = Helpers::arrayTeam($filter);  

        $closed = 0;
        $arrSheddule = [];
        $days = array('sunday', 'monday', 'tuesday', 'wednesday','thursday','friday', 'saturday');

        foreach($arrTeam as $member){
        
            $arrWeek = ((is_array(json_decode($member['sheddule_array'],true))) ? json_decode($member['sheddule_array'], true) : []);

            $resultWeekDays = $arrWeek[$days[date('w', $date)]];

            $closed = $resultWeekDays['closed'];
            $start = strtotime($resultWeekDays['start']); //9:00
            $end = strtotime($resultWeekDays['end']); //18:00
            $lunchFrom = $resultWeekDays['break_start']; //13:00
            $lunchTo = $resultWeekDays['break_end']; //14:00

            //$startAfterLunch = $start;
        
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
                    $arrSheddule[strtotime($dayHour).'-'.$member['guid']][] = [
                        //'hour' => date('H:i',$hour),
                        'full_name' => $member['full_name'],
                        'guid' => $member['guid'],                   
                    ];
            
                }     
            
                $start += $sum;
            
            }

        }

        $filterSheddule = []; 

        if(isset($_POST['username']) && $_POST['username'] != '*'){  
            $filterSheddule['team_username'] = $filter['guid'];
        }
        
        $filterSheddule['location_code'] = $filter['location_code'];
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
                   
                    $display = Helpers::validationScheduleTimespan($hourKey, $companyCode);

                    if($display){
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
        }    
   

        return [
            'closed' => $closed,
            //'services' => $this->actionBookingGetServices(1),
            //'team' => $this->actionBookingGetTeam(1),
            'userShedduleArr' => $userShedduleArr
        ];

    }




































   




    public function actionBookingDetailsAjax(){
               

        $code = (isset($_POST['code'])? $_POST['code'] : '');    

        $model = new Sheddule();

        if ($model->load(Yii::$app->request->post())) { 
            
        }
        $resultArr = [           
            'render' => Yii::$app->request->post()
        ];
        

        $myJSON = json_encode($resultArr);

        echo $myJSON;
        die();

        return $this->redirect(['/'.$code.'/booking-details']);  

      
        if ($model->load(Yii::$app->request->post())) {   


            $resultArr = [           
                'render' => Yii::$app->request->post()
            ];
            
    
            $myJSON = json_encode($resultArr);
    
            echo $myJSON;

            return $this->redirect(['/'.$code.'/booking-details']);    
        }
       
            $resultArr = [           
                'render' =>'error'
            ];
            
    
            $myJSON = json_encode($resultArr);
    
            echo $myJSON;

        /*
            return $this->redirect(['/booking/booking-details', 
                'code' => Yii::$app->request->get('code'),  
            ]);    
        */
    }



}
