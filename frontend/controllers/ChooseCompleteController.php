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

class ChooseCompleteController extends Controller
{
       
    public function actionIndex($id)
    {      

        $company = Helpers::findCompanyCode();     
      
        if (empty($company)) {    
            return $this->goHome();
        }    
        
        $model = new Sheddule();      
        $this->layout = 'registration';   

        $filter['id'] = $id;
        $sheddule = Helpers::arraySheddule($filter, 'one');

        return $this->render('@frontend/views/client/client-booking/complete', [             
            'model' => $model, 
            'sheddule' => $sheddule,
     
        ]);

        /*

        $model->team_username = Yii::$app->request->get('team');

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {           
        
          
            $model->team_username = Yii::$app->request->get('team');
            $model->company_code = Helpers::findCompanyCode();
            $model->location_code = Yii::$app->request->get('location');
            $model->service_code = Yii::$app->request->get('service');
            $model->date = (Yii::$app->request->get('day') == '*') ? date('Y-m-d') : date('Y-m-d', (Yii::$app->request->get('day')));
            $model->time = date('H:i', Yii::$app->request->get('time'));

            $model->client_username = ((isset(Yii::$app->user->identity->guid)) ? Yii::$app->user->identity->guid : '*');       
            $model->service_name = Helpers::getServiceName( $model->service_code);
      
            if($model->validate()){
                $model->save();
            }

            print"<pre>";
            print_r($model);
            die();
         
            
            print"<pre>";
            print_r($model);
            die();

            die();
          

            return $this->redirect(['/choose-services',                
                'location' => Yii::$app->request->get('location'),
                'code' => Yii::$app->request->get('code'),  
                'team' => $model->team_username,               
                'service' => Yii::$app->request->get('service'),
                'schedule' => Yii::$app->request->get('schedule')
                ]
            );       
                      
        }            
    
        return $this->render('@frontend/views/client/client-booking/complete', [             
            'model' => $model, 
            'publish' => Helpers::checkPublish(Yii::$app->request->get('code'), $this)
        ]);
   */ 

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
                $modelServices = Services::find()->select(['page_code_title'])->where(['service_code' => $modelSheddule->service_code])->one();
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

    public function actionSignup()
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
 

}
