<?php

namespace frontend\controllers;


use common\models\ShedduleSearch;

use common\models\Tickets;
use yii\web\Controller;
use common\models\LoginForm;
use yii\db\Query;
use common\models\User;
use common\Helpers\Helpers;
use common\models\Events;
use common\models\Sheddule;
use common\models\Services;
use common\models\GeneratorJson;
use frontend\models\SignupForm;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use Yii;
//Yii::$app->language = 'en-EN';

class PageController extends Controller
{

    public function behaviors()
    {   
        
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup','language'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
       
    public function actionStats()
    {
        $this->layout = 'training';
        
        $foodIntake = Helpers::getFoodIntake('carrelo1983');

        return $this->render('stats', [
            'foodIntake' =>  $foodIntake
        ]);
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

    
    
    public function actionSite($code)
    {        
     
        $this->layout = 'registration';

        $query2 = new Query;

        $companyArr = $query2->select([
            'c.page_code_team_title',
            'c.page_code_team_text',
            'c.color',
            'c.path' ,
            'c.coin' ,
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
        ->where(
            [
            'c.company_code_url' => Yii::$app->request->get('code')           
            ])
        ->all();
     
 
        /*
        print_r($companyArr);
        die();
        */

        if(empty($companyArr)){
            //return $this->goHome();
        }    

        $modelEvents = new Events();          

        if(isset($this->request->post()['Events']['id']) && $this->request->post()['Events']['id'] > 0){
            $modelEvents = $this->findModelEvents($this->request->post()['Events']['id']); 
        }
      

        if($this->request->isPost && isset($this->request->post()['Events'])){
            $modelEvents->start = (isset($this->request->post()['start'])) ? $this->request->post()['start'] : '';
            $modelEvents->end = (isset($this->request->post()['end'])) ? $this->request->post()['end'] : '';       
            $modelEvents->username = Yii::$app->user->identity->username; 
        }
        
        if ($this->request->isPost && $modelEvents->load($this->request->post())) {
            
            $modelEvents->save();
            return $this->refresh();
        }        

        $query = new Query;
        $eventsArr = [];

        if(isset(Yii::$app->user->identity->username)){
            $eventsArr = $query->select('*')
                ->from(['events'])
                ->where(
                    [
                        'username' => Yii::$app->user->identity->username,
                        'active' => true
                    ]) 
                ->all();
        }
    

        $myDataArr = [];

        foreach($eventsArr as $event){
            $myDataArr[] = [                
                'title' => (Yii::t('app', $event['page_code'])),
                'className' => $event['color_code'],
                'start' => $event['start'],
                'end' => $event['end']                        
            ];
        }
     
        $company = (isset($companyArr[0]) ? $companyArr[0]['company_code'] : '');
    
        if (empty($company)) {    
            return $this->goHome();
        }

        return $this->render('site', [
            'modelEvents' => $modelEvents,
            'companyArr' =>  $companyArr,
            'company' =>  $company,
            'myData' => json_encode($myDataArr)      
         
        ]);


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


        $modelEvents = new Events();  

        return $this->render('site', [     
            'user' => $user,       
            'modelEvents' => $modelEvents,
            'code' => $request->get('code')
        ]);
    }    

    public function actionSheddule()
    {

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
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
      
       
        return $this->render('sheddule', [   
            'date' => $date,   
            'model' => $modelSheddule
        ]);
    }

    public function actionShedduleSearch()
    {
        if($this->request->isPost && isset($this->request->post()['date'])) {
            $date = strtotime($this->request->post()['date']);            
       
            return $this->redirect(['sheddule', 'day' => $date]);
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
                        service_cat= :service_cat,
                        time = :time,
                        date = :date
                    WHERE id=:id")
                    ->bindValue(':full_name', $modelSheddule->full_name)
                    ->bindValue(':contact_number', $modelSheddule->contact_number)
                    ->bindValue(':email', $modelSheddule->email)
                    ->bindValue(':nif', $modelSheddule->nif)
                    ->bindValue(':service_cat', $modelSheddule->service_cat) 
                    ->bindValue(':canceled', $modelSheddule->canceled)           
                    ->bindValue(':time', $modelSheddule->time)
                    ->bindValue(':date', date('Y-m-d', strtotime(Yii::$app->request->post()['date'])))
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

                $modelSheddule->client_username = 'client_username_'.Helpers::generateRandowHumber();
                $modelSheddule->team_username = Yii::$app->user->identity->username;
                $modelSheddule->company_code = Yii::$app->user->identity->company_code;     
                $modelServices = Services::find()->select(['page_code_title'])->where(['service_code' => $modelSheddule->service_cat])->one();
                $modelSheddule->service_name = $modelServices->page_code_title;                         
                $modelSheddule->date = date('Y-m-d',$modelSheddule->date);       
                $modelSheddule->time = date('H:i',strtotime($modelSheddule->time));  

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
                    Yii::$app->db->createCommand("UPDATE sheddule SET 
                        canceled=:canceled
                    WHERE id=:id")
                    ->bindValue(':canceled', $modelSheddule->canceled) 
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
    
        $model = new LoginForm();
        $this->layout = 'registration';
    
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['/page', 
                'code' => Yii::$app->request->get('code')]
            );           
        }          


        if ($model->load(Yii::$app->request->post())) {

            $userModel = new User();   
            $userResult = $userModel::find('id')->orderBy("id desc")->where(['username' => $model->username, 'active' => 1])->limit(1)->one();

            if($model->login() && $userResult->level == 'client'){
               
                return $this->redirect(['/client-booking', 
                    'code' => Yii::$app->request->get('code')]
                );
            }

            if($model->login() && $userResult->level == 'team'){
               
                $dateGet = Yii::$app->request->get('day');
                $date = ((empty($dateGet)) ? strtotime(date('Y-m-d')) : $dateGet);

                return $this->redirect(['/sheddule-organizer', 
                    'code' => Yii::$app->request->get('code'),
                    'day' => $date
                ]
                );
            }
            
        }
   
      
       //$model->password = '';
  
      

        
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
            
        return $this->render('/client/login/login_client', [
            'model' => $model,
            //'companyArr' => $companyArr
        ]);
    }     


    /**
     * Signs user up.
     *
     * @return mixed
     */

    public function actionSignup()
    {
        $model = new SignupForm();

        $this->layout = 'registration';

        $this->loginValidation();

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
     
        //$submitEmail = '';
        $date = '';

        $model->guid = Helpers::GUID();           

        if ($model->load(Yii::$app->request->post())) {             
   
            $model->company =  'Client';
            $model->company_code = Yii::$app->request->get('code');
            $model->privacy =  $model->terms_and_conditions;
            $model->role = 'Client';
            $model->coin = 'EUR';
            $model->voucher = 'null';
            $date = (empty(Yii::$app->request->post()['dob']) ? '' : date('Y-m-d', strtotime(Yii::$app->request->post()['dob']))); 
            $model->dob = $date;         

            if($model->validate()){
                
                $model->signUpClient($model);            
  
                //$submitEmail = 'success';
    
                //$modelLogin = new LoginForm();
                $request = Yii::$app->request;
    
                $modelLogin = new LoginForm();
                if ($modelLogin->load(Yii::$app->request->post()) && $modelLogin->login()) {
                    return $this->redirect(['/client-booking', 
                        'code' => Yii::$app->request->get('code')]
                    );
                }

                return $this->redirect(['/page/login', 
                'code' => Yii::$app->request->get('code')]
            );
           
            }     
      
        }

        //$this->layout = 'publicDark';

        return $this->render('/client/login/signup', [
            'modelSignupForm' => $model,           
            'date' =>  $date,
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

        return $this->redirect(['/page', 'code' =>  Yii::$app->request->get('code')    
        ]);     
    }


    
    public function actionIndex($code)
    {              
      
        $publish = Helpers::checkPublish($code, $this);
    

        $this->layout = 'registration';
        
        $query2 = new Query;
        $model = new Tickets;

        $companyArr = $query2->select([
            'c.page_code_team_title',
            'c.page_code_team_text',
            'c.color',
            'c.path' ,
            'c.coin' ,
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
        ->where(
            [
            'c.company_code_url' => Yii::$app->request->get('code')           
            ])
        ->all();
     
 
        /*
        print_r($companyArr);
        die();
        */

        if(empty($companyArr)){
            //return $this->goHome();
        }    

        $modelEvents = new Events();          

        if(isset($this->request->post()['Events']['id']) && $this->request->post()['Events']['id'] > 0){
            $modelEvents = $this->findModelEvents($this->request->post()['Events']['id']); 
        }
      

        if($this->request->isPost && isset($this->request->post()['Events'])){
            $modelEvents->start = (isset($this->request->post()['start'])) ? $this->request->post()['start'] : '';
            $modelEvents->end = (isset($this->request->post()['end'])) ? $this->request->post()['end'] : '';       
            $modelEvents->username = Yii::$app->user->identity->username; 
        }
        
        if ($this->request->isPost && $modelEvents->load($this->request->post())) {
            return $this->refresh();
        }      
        
        if ($this->request->isPost && $model->load($this->request->post()) && $model->validate()) {

            $model->ticket_number = 'tk'.date('YdmHis').Helpers::generateRandowHumber(3);
            if($model->save() && $model->sendEmail($model)){
                return $this->refresh();
            }            
        }
     

        $query = new Query;
        $eventsArr = [];

        if(isset(Yii::$app->user->identity->username)){
            $eventsArr = $query->select('*')
                ->from(['events'])
                ->where(
                    [
                        'username' => Yii::$app->user->identity->username,
                        'active' => true
                    ]) 
                ->all();
        }
    

        $myDataArr = [];

        foreach($eventsArr as $event){
            $myDataArr[] = [                
                'title' => (Yii::t('app', $event['page_code'])),
                'className' => $event['color_code'],
                'start' => $event['start'],
                'end' => $event['end']                      
            ];
        }
     
        $company = (isset($companyArr[0]) ? $companyArr[0]['company_code'] : '');
    
        if (empty($company)) {    
            return $this->goHome();
        }
        
    
        return $this->render('../client/page', [
            'modelEvents' => $modelEvents,
            'companyArr' =>  $companyArr,
            'company' =>  $company,
            'model' =>  $model,
            'myData' => json_encode($myDataArr),
            'publish' => $publish   
         
        ]);


    }   
    

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {  
        Yii::$app->db->createCommand("UPDATE clients SET status=:status WHERE verification_token=:token")
        ->bindValue(':status', User::STATUS_ACTIVE)
        //->bindValue(':username', $user->username)
        ->bindValue(':token', $token)
        ->execute();
      
        $model = new LoginForm(); 

        return $this->redirect(['/page', 'code' => Yii::$app->request->get('code')]);


        
        try {                
            $model = new VerifyEmailForm($token);             
        } catch (InvalidArgumentException $e) {            
            throw new BadRequestHttpException($e->getMessage());
        }
        
        if (($user = $model->verifyEmail()) ) {    
            
                //Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->render('login');
           
            /*
            if(Yii::$app->user->login($user)){
                die('__1');
                //Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }    
            */  
        }

        
        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }
    
    public function loginValidation(){

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

    }

    protected function findModelByCode($company_code_url)
    {
        if (($model = Company::findOne(['company_code_url' => $company_code_url])) !== null) {      
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
