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

class ClientController extends Controller
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
            'c.path_logo' ,
            'c.image_logo' ,
            'c.path_banner' ,
            'c.image_banner' ,
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


}
