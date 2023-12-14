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

class TeamScheduleController extends Controller
{
       
    public function actionStats()
    {
        $this->layout = 'training';
        
        $foodIntake = Helpers::getFoodIntake('carrelo1983');

        return $this->render('stats', [
            'foodIntake' =>  $foodIntake
        ]);
    }

    public function actionWeight()
    {
        $this->layout = 'training';
        
        return $this->render('weight');
    }

    public function actionNutricion()
    {
        $this->layout = 'training';
        
        return $this->render('nutricion');
    }

    public function actionClientProfile()
    {
        $this->layout = 'registration';
        
        return $this->render('client-profile');
    }

    public function actionClientInvoices()
    {
        $this->layout = 'registration';
        
        return $this->render('client-invoices');
    }

    public function actionClientMenu()
    {
        $this->layout = 'publicLayoutDark';
        
        return $this->render('client-menu');
    }

    public function actionRegistration()
    {
        $this->layout = 'registration';

        $blogQuery = new Query;
        $request = Yii::$app->request;

        $user = $blogQuery->select('*')
            ->from(['user'])
            ->where(['company_code_url' => $request->get('code')]) 
            ->one();
            
        $model = new User();     

        if ($this->request->isPost) {          

            $data = Yii::$app->request->post();     

            $model->name = $data['Clients']['first_name'].' '.$data['Clients']['last_name'];
            $model->company = Yii::$app->user->identity->company;
            $model->level = 'student';

            $model->created_date = date('Y-m-d H:i:s');

            if ($model->load($this->request->post()) && $model->save()) { 
               
                return $this->redirect(['registration', 'code' => $request->get('code')]);
            }

        } else {
            $model->loadDefaultValues();
        }


        return $this->render('registration', [     
            'user' => $user,       
            'model' => $model,
            'code' => $request->get('code')
        ]);
    }    

    public function actionClientBooking()
    {    

        $this->layout = 'registration';

        $query2 = new Query;

        $companyArr = $query2->select([
            'c.page_code_team_title',
            'c.page_code_team_text',
            'c.color',
            'c.coin' ,
            'c.path' ,
            'c.image' ,
            'c.company_code' ,
            'c.company_code_url' ,
            'c.company_name' ,
            'c.page_code_text',
            'l.address_line_1',
            'l.address_line_2',
            'l.city',
            'l.postcode',
            'l.country',
            'c.website',
            'c.facebook',
            'c.pinterest',
            'c.instagram',
            'c.twitter',
            'c.tiktok',   
            'c.linkedin',
            'c.youtube',
            'l.google_location',
            'l.contact_number',   
            'l.email',   
            'l.location_code',
            'l.location',
            'l.sheddule_array'
        ])
        ->from(['c' => 'company'])
        ->leftJoin(['l' => 'company_locations'], 'c.company_code = l.company_code')
        ->where(['c.company_code_url' => Yii::$app->request->get('code')])
        ->all();
        
        if (empty($companyArr)) {
            //return $this->goHome();
        }    

     

        $modelSheddule = new Sheddule();      
        $this->layout = 'registration';      

        $dateGet = Yii::$app->request->get('day');
        $date = ((empty($dateGet)) ? strtotime(date('Y-m-d')) : $dateGet);

        //searchs for date
        $this->actionShedduleSearch();    

        if ($this->request->isPost && $modelSheddule->load($this->request->post())) {
           
            if(empty($modelSheddule->id)){

            //creates
                $this->actionShedduleCreate($modelSheddule);

                if($modelSheddule->save()){
                    $this->refresh();
                }

            }else{                 

                $modelSheddule->time = date('H:i',$modelSheddule->time);          

                if($modelSheddule->canceled ==  1){    

                    //Cancel
                    $this->actionShedduleCancel($modelSheddule);
                }elseif ($modelSheddule->confirm ==  1) {     

                    //Confirm
                    $this->actionShedduleCheck($modelSheddule);
                    
                } else{

                    //edit
                    $this->actionShedduleEdit($modelSheddule);

                }

                $this->refresh();
            }
        }
      



        if (Yii::$app->user->isGuest) {

            $modelLogin = new LoginForm();

            return $this->render('login/login_client', [
                'model' => $modelLogin,
                'companyArr' => $companyArr
            ]);
            
            return $this->render('client-booking', [   
                'date' => $date,   
                'model' => $modelSheddule,
                'companyArr' => $companyArr
            ]);
    
            return $this->goHome();
        }  
      
       
        return $this->render('client-booking', [   
            'date' => $date,   
            'model' => $modelSheddule,
            'companyArr' => $companyArr
        ]);

        return $this->render('registration-calendar-payment',[
                'companyArr' => $companyArr
            ]
        );

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

        if ($this->request->isPost && $modelSheddule->load($this->request->post())) {
           
            if(!empty($modelSheddule->id)){

                if($modelSheddule->canceled ==  0 && $modelSheddule->confirm ==  0){                       
            
                    $modelSheddule->time = date('H:i',$modelSheddule->time);   

                    Yii::$app->db->createCommand("UPDATE sheddule SET 
                        full_name=:full_name, 
                        contact_number=:contact_number,
                        canceled=:canceled,
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
                    ->bindValue(':time', $modelSheddule->time)
                    ->bindValue(':date', $modelSheddule->date)
                    //->bindValue(':date', date('Y-m-d', strtotime(Yii::$app->request->post()['date'])))
                    ->bindValue(':id', $modelSheddule->id)
                    ->execute();
                    
                    $this->refresh();

                }
            }
        }
    }

    public function actionShedduleCreate($modelSheddule)
    {

        if ($this->request->isPost && $modelSheddule->load($this->request->post())) {
           
            if(empty($modelSheddule->id)){
   

                $modelSheddule->client_username = 'c'.Helpers::generateRandowHumber();
                $modelSheddule->company_code = Yii::$app->user->identity->company_code; 
                $modelSheddule->location_code = Yii::$app->user->identity->location_code; 
                $modelSheddule->service_name = 'Service Name';    
                $serviceFound = Services::findOne(['service_code' => $modelSheddule->service_code]);

                if(!empty($serviceFound)){
                    $modelSheddule->price = $serviceFound->price;
                    $modelSheddule->price_range = $serviceFound->price_range;
                    $modelSheddule->currency = $serviceFound->currency;
                }
              
                /*
               

                $modelSheddule->client_username = 'client_username_'.Helpers::generateRandowHumber();
                $modelSheddule->team_username = Yii::$app->user->identity->username;
                $modelSheddule->company_code = Yii::$app->user->identity->company_code;     
                $modelServices = $modelSheddule->service_code;
                $modelSheddule->service_name = $modelServices->page_code_title;                         
                $modelSheddule->date = date('Y-m-d',$modelSheddule->date);       
                $modelSheddule->time = date('H:i',strtotime($modelSheddule->time));  
            
             
                  print"<pre>";
                print_r($modelSheddule);
                die();
                */
                
               if($modelSheddule->validate()){
                   
               }

                if($modelSheddule->save()){
                    $this->refresh();
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

    
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
    
        if (!Yii::$app->user->isGuest) {
            return $this->render('home/index');
        }     

        $query2 = new Query;

        $companyArr = $query2->select([
            'c.page_code_team_title',
            'c.page_code_team_text',
            'c.color',
            'c.coin' ,
            'c.path' ,
            'c.image' ,
            'c.company_code' ,
            'c.company_code_url' ,
            'c.company_name' ,
            'c.page_code_text',
            'l.address_line_1',
            'l.address_line_2',
            'l.city',
            'l.postcode',
            'l.country',
            'c.website',
            'c.facebook',
            'c.pinterest',
            'c.instagram',
            'c.twitter',
            'c.tiktok',   
            'c.linkedin',
            'c.youtube',
            'l.google_location',
            'l.contact_number',   
            'l.email',   
            'l.location_code',
            'l.location',
            'l.sheddule_array'
        ])
        ->from(['c' => 'company'])
        ->leftJoin(['l' => 'company_locations'], 'c.company_code = l.company_code')
        ->where(['c.company_code_url' => Yii::$app->request->get('code')])
        ->all();

 
        $model = new LoginForm();
 
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            return $this->render('home/index', [
                'model' => $model,
           
            ]);
        }

      
        $model->password = '';
        $this->layout = 'registration';

        
        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        $user = User::findOne(['username' => $model->username]);

        if (Yii::$app->user->isGuest && $maintenance == true && $user->level !== 'admin') {

            $this->layout = 'maintenance';

            return $this->render('login/login_maintenance', [
                'model' => $model,
            ]);
        }
     
        return $this->render('login/login_client', [
            'model' => $model,
            'companyArr' => $companyArr
        ]);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */

    public function actionSignup1()
    {
        $model = new SignupClientForm();

        $query2 = new Query();

        $companyArr = $query2->select([
            'c.page_code_team_title',
            'c.page_code_team_text',
            'c.color',
            'c.coin' ,
            'c.path' ,
            'c.image' ,
            'c.company_code' ,
            'c.company_code_url' ,
            'c.company_name' ,
            'c.page_code_text',
            'l.address_line_1',
            'l.address_line_2',
            'l.city',
            'l.postcode',
            'l.country',
            'c.website',
            'c.facebook',
            'c.pinterest',
            'c.instagram',
            'c.twitter',
            'c.tiktok',   
            'c.linkedin',
            'c.youtube',
            'l.google_location',
            'l.contact_number',   
            'l.email',   
            'l.location_code',
            'l.location',
            'l.sheddule_array'
        ])
        ->from(['c' => 'company'])
        ->leftJoin(['l' => 'company_locations'], 'c.company_code = l.company_code')
        ->where(['c.company_code_url' => Yii::$app->request->get('code')])
        ->all();


        $this->layout = 'registration';
        
        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        $connection = new Query;

        $request = Yii::$app->request;

        $level = $connection->select([
            'level' 
            ])
        ->from('user')   
        ->where(['username' => $request->post('username')]) 
        ->one();
   

        if (Yii::$app->user->isGuest && $maintenance == true && $level !== 'admin') {

            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }

        $submitEmail = '';

        $model->guid = Helpers::GUID();
      
        if ($model->load(Yii::$app->request->post())) {             

            $model->signup();         
           
            $submitEmail = 'success';

            $modelLogin = new LoginForm();

            return $this->render('login/login', [
                'model' => $modelLogin,
                'submitEmail' => $submitEmail
            ]);
        }

        //$this->layout = 'publicDark';

        return $this->render('login/signup', [
            'modelSignupForm' => $model,
            //'submitEmail' => $submitEmail,
            'companyArr' => $companyArr
        ]);
    }

    public function actionLogout()
    {      
        Yii::$app->user->logout();        
      
        $this->layout = 'public';

        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {

            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }

        return $this->redirect(['client/site', 'code' =>  Yii::$app->request->get('code')    
        ]);     
    }
    public function actionIndex()
    { 
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }       

        $modelSheddule = new Sheddule();      
        $this->layout = 'registration';  
        Yii::$app->session->setFlash('valid', null);   

        //$dateGet = Yii::$app->request->get('day');
        //$date = ((empty($dateGet)) ? strtotime(date('Y-m-d')) : $dateGet);
        $day = ((Yii::$app->request->get('day') == '*') ? strtotime(date("Y-m-d")) : Yii::$app->request->get('day'));
      
        $modelSheddule->team_username = Yii::$app->user->identity->guid;
        //searchs for date
        //$this->actionShedduleSearch();    

        if ($this->request->isPost && $modelSheddule->load($this->request->post())) {    

            $modelSheddule->canceled = 0;
            $modelSheddule->confirm = 0;
            $modelSheddule->missed = 0;
            $modelSheddule->company_code = Helpers::findCompanyCode();             

            switch ($modelSheddule->type) {
                case 1:              
                        //Cancel
                        $modelSheddule->canceled = 1;
                        $this->actionShedduleCancel($modelSheddule);
                        $this->refresh();
                    break;
                case 2:
                        //Confirm
                        $modelSheddule->confirm = 1;
                        $this->actionShedduleCheck($modelSheddule);
                        $this->refresh();
                    break;
                case 3:
                        //Missed
                        $modelSheddule->missed = 1;
                        $this->actionShedduleMissed($modelSheddule);
                        $this->refresh();
                    break;
                default:
                
                    //Create Edit 
                    if(empty($modelSheddule->id)){    
                                
                        if($modelSheddule->validate()){   
                            $this->actionShedduleCreate($modelSheddule);
                            $this->refresh();                       
                        }else{    
                            Yii::$app->session->setFlash('valid', $modelSheddule->time. " - The time window is not longer available.");  
                      
                            //$this->refresh();   
                        }
                        /*
                        if($modelSheddule->validate()){     
                                
                            $this->actionShedduleCreate($modelSheddule);
                            $this->refresh(); 
                        }else{                          
                           Yii::$app->session->setFlash('valid', "Your message to display.");
                        }      
                        */  
                        //$this->refresh(); 
                    }else{
                        //edit
                        $this->actionShedduleEdit($modelSheddule);
                        $this->refresh();
                    }                    
                    break;
            }              
        }  

        

        return $this->render('/client/team-schedule/index', [   
            'day' => ((isset(Yii::$app->request->post()['date'])) ? strtotime(Yii::$app->request->post()['date']) : $day),   
            'model' => $modelSheddule,
            'time' => Yii::$app->request->get('time'),
            'code' => Yii::$app->request->get('code'),     
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
