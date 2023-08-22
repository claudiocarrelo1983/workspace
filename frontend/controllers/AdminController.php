<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\User;
use common\models\Sheddule;
use common\models\LoginForm;
use common\models\TicketsSearch;
use common\models\Tickets;
use Yii;
use common\models\Events;
use yii\db\Query;

//Yii::$app->language = 'en-EN';

class AdminController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionMyAction()
    { 
        $query = new Query;
        $eventsArr = $query->select('*')
                            ->from(['events'])
                            ->where(['username' => Yii::$app->user->identity->username]) 
                            ->all();

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        return $eventsArr;

    }

  /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        $this->layout = 'adminLayout';
  
        return $this->render('calendar', [
            'model' => $model,
        ]);
        
    }    
    
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionDashboard()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        if (Yii::$app->user->identity->level != 'admin') {
            return $this->goHome();
        }  

        $this->layout = 'adminLayout';

        $company = Yii::$app->user->identity->company_code;
        $username = Yii::$app->user->identity->username;

        $model = User::findOne(['username' => $username,'company_code' => $company]);
      
        $countBooking =  Sheddule::find()->andFilterWhere([
            'company_code' => $company,
            'confirm' => 1,
            'date' => date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))))
        ])->count();   

        $countCancelations =  Sheddule::find()->andFilterWhere([
            'company_code' => $company,
            'canceled' => 1,
            'date' => date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))))
        ])->count(); 

        $countClients =  User::find()->andFilterWhere([
            'company_code' => $company,
            'level' => 'client'
        ])->count();   


        $countTeam =  User::find()->andFilterWhere([
            'company_code' => $company,
            'level' => 'admin'
        ])->count();  

        $countResellers =  User::find()->andFilterWhere([
            'company_code' => $company,
            'level' => 'resseler'
        ])->count();         

        return $this->render('dashboard',
        [
            'model' => $model,
            'countClients' => $countClients,
            'countTeam' => $countTeam,
            'countResellers' => $countResellers,
            'countBooking' => $countBooking,          
            'countCancelations' => $countCancelations
        ]
        );
    }

        /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionDashboardCalendar()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'adminLayout';

        return $this->render('dashboard-calendar');
    }

    public function actionWebsite()
    {
        $this->layout = 'adminLayout';

        return $this->render('website');
    }


    public function actionFoods()
    {
        $this->layout = 'adminLayout';

        return $this->render('foods');
    }

    public function actionRecipes()
    {
        $this->layout = 'adminLayout';

        return $this->render('recipes');
    }

    public function actionQuestionList()
    {
        $this->layout = 'adminLayout';

        return $this->render('question-list');
    }

    public function actionPricing()
    {
        $this->layout = 'publicLayout';

        return $this->render('pricing');
    }

    public function actionTrainingList()
    {
        $this->layout = 'adminLayout';

        return $this->render('training-list');
    }

    

    public function actionNotifications()
    {
  
        $this->layout = 'adminLayout';
        
        if (Yii::$app->user->identity->level != 'admin') {
            return $this->goHome();
        }  

        return $this->render('notifications');
    }

    public function actionNotificationsList()
    {
        $this->layout = 'adminLayout';

        if (Yii::$app->user->isGuest) {    
            return $this->goHome();
        }
        
        if (Yii::$app->user->identity->level != 'admin') {
            return $this->goHome();
        }  

        $searchModel = new TicketsSearch();

        $arrFilter = [
            'company_code'=> Yii::$app->user->identity->company_code,
            //'active'=> 1,
            //'status'=> 10,
            //'level' => 'client'
            //'type'=> 'trial',
        ];

        if(isset($this->request->queryParams['TicketsSearch'])){
            $arrFilter = array_merge($arrFilter, $this->request->queryParams['TicketsSearch']);
        
            $dataProvider = $searchModel->search([
                $searchModel->formName()=> $arrFilter
            ]);
        }else{
            $dataProvider = $searchModel->search([
                $searchModel->formName()=> $arrFilter
            ]);
        }
     

        return $this->render('/notifications-list/index', [
            'searchModel' => $searchModel,
            'dataProvider' =>  $dataProvider,
        ]);   
    }

    public function actionFaqs()
    {
        $this->layout = 'adminLayout';

        return $this->render('faqs');
    }

    public function actionSetForms()
    {
        $this->layout = 'adminLayout';
        return $this->render('set-forms');
    }


    public function actionCreateTask()
    {
        $this->layout = 'adminLayout';
        return $this->render('set-forms');
    }

    public function actionSettings()
    {
        $this->layout = 'adminLayout';

        return $this->render('settings');
    }

    public function actionTodolist()
    {
        $this->layout = 'adminLayout';

        return $this->render('todolist');
    }

    public function actionSchedule()
    {
        $this->layout = 'adminLayout';

        return $this->render('schedule');
    }
  
    public function actionProfile()
    {
        $this->layout = 'adminLayout';
        
        if (Yii::$app->user->identity->level != 'admin') {
            return $this->goHome();
        }  

        return $this->render('profile');
    }

    public function actionClients()
    {
        $this->layout = 'adminLayout';
        
        return $this->render('clients-list');
    }   

    
    public function actionCalendar()
    {
        $this->layout = 'adminLayout';
        
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
        $eventsArr = $query->select('*')
                    ->from(['events'])
                    ->where(
                        [
                            'username' => Yii::$app->user->identity->username,
                            'active' => true
                        ]) 
                    ->all();

        $myDataArr = [];

        foreach($eventsArr as $event){
            $myDataArr[] = [                
                'title' => (Yii::t('app', $event['page_code'])),
                'className' => $event['color_code'],
                'start' => $event['start'],
                'end' => $event['end']                        
            ];
        }
     
    
        return $this->render('calendar', [
            'modelEvents' => $modelEvents,
            'myData' => json_encode($myDataArr)      
         
        ]);
    }


    public function actionMachines()
    {
        $this->layout = 'adminLayout';
        
        return $this->render('machines');
    }


    public function actionGoals()
    {
        $this->layout = 'adminLayout';
        
        return $this->render('goals');
    } 
    
    public function actionWebadmin()
    {
        $this->layout = 'adminLayout';

        
        if (Yii::$app->user->identity->level != 'admin') {
            return $this->goHome();
        }  
        
        return $this->render('website');
    }
 
    public function actionNewClient()
    {
        $this->layout = 'adminLayout';
        
        return $this->render('new-client');
    }

    protected function findModelEvents($id)
    {
        if (($model = Events::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionLanguage()
    {       

       if(isset($_POST['lang'])){          
            Yii::$app->language = $_POST['lang'];   
            $cookies = new \yii\web\Cookie([
                'name' => 'lang',
                'value' => $_POST['lang'],
            ]);

            Yii::$app->getResponse()->getCookies()->add($cookies);
       }
    }

}
