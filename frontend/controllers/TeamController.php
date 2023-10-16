<?php

namespace frontend\controllers;

use common\models\User;
use common\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\GeneratorJson;
use common\Helpers\Helpers;
use frontend\models\SignupForm;
use yii\db\Query;
use common\models\LoginForm;

use Yii;

/**
 * TeamController implements the CRUD actions for Team model.
 */
class TeamController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Team models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {    
            return $this->goHome();
        }       
        
        $this->layout = 'adminLayout';  

        $searchModel = new UserSearch();

        $arrFilter = [
            'company_code'=> Yii::$app->user->identity->company_code,
            //'active'=> 1,
            //'status'=> 10,
            //'level' => 'client'
            //'type'=> 'trial',
            //'level' => 'team'
        ];



        if(isset($this->request->queryParams['UserSearch'])){
            $arrFilter = array_merge($arrFilter, $this->request->queryParams['UserSearch']);
        
            $dataProvider = $searchModel->search([
                $searchModel->formName()=> $arrFilter
            ]);
        }else{
            $dataProvider = $searchModel->search([
                $searchModel->formName()=> $arrFilter
            ]);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
         
        ]);
    }

    /**
     * Displays a single Team model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest) {    
            return $this->goHome();
        }       

        $this->layout = 'adminLayout';  

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Team model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {

        $model = new SignupForm();
        $this->layout = 'adminLayout'; 
        
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

        $model->guid = Helpers::GUID();
      
      
        if ($model->load(Yii::$app->request->post())) {           

            $title = 'team_title_1'; 
            $text = 'team_text_1';           

            $count = User::find('id')->orderBy("id desc")->limit(1)->one();
    
            if(!empty($count->id)){
                $title = 'team_title_'.bcadd($count->id, 1);  
                $text = 'team_text_'.bcadd($count->id, 1);                       
            }               
             
            $model->company_code = Yii::$app->user->identity->company_name;     
            $model->company_code_parent = Yii::$app->user->identity->company_code;  
            $model->company = Yii::$app->user->identity->company;   
            $model->newsletter = Yii::$app->user->identity->newsletter;     
            $model->privacy = Yii::$app->user->identity->newsletter;     
            $model->terms_and_conditions = Yii::$app->user->identity->terms_and_conditions;          
            $model->page_code_title = $title;
            $model->page_code_text = $text;        
            $model->voucher = 'null';   

            if($model->validate()){    

                $model->signUpTeam();    

                $result = User::findOne(['username' => $model->username]);  
            
                //GeneratorJson::updateTablesGeneric('translations');  
                //GeneratorJson::updateTranslationsGeneric('translations');  
                return $this->redirect(['view', 'id' => $result->id]);

            }         
        }
     
        //$this->layout = 'publicDark';

        $serviceTimeMin = (empty($model->time_window) ? '60' : $model->time_window);
        //$this->layout = 'publicDark';
        $weekDays = array('monday', 'tuesday', 'wednesday','thursday','friday', 'saturday','sunday');

        return $this->render('create', [
            'model' => $model,
            'weekDays' => $weekDays,
            'serviceTimeMin' => $serviceTimeMin
        ]);


        $model = new SignupForm();
        
        $this->layout = 'adminLayout'; 

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

        
            $title = 'team_title_1'; 
            $text = 'team_text_1'; 
            $username = 'username_1';

            $count = $model::find('id')->orderBy("id desc")->limit(1)->one();
    
            if(!empty($count->id)){
             $title = 'team_title_'.bcadd($count->id, 1);  
             $text = 'team_text_'.bcadd($count->id, 1);  
             $username = 'username_'.bcadd($count->id, 1);           
            }                

            $model->company_code = Yii::$app->user->identity->company_code;         
            $model->page_code_title = $title;
            $model->page_code_text = $text;
            $model->username = $username;

            $model->voucher = 'null';

            if($model->validate()){

                $model->signup();         
            
                $submitEmail = 'success';

                $modelLogin = new LoginForm();

                GeneratorJson::updateTablesGeneric('translations');  
                GeneratorJson::updateTranslationsGeneric('translations');  
                return $this->redirect(['view', 'id' => $model->id]);

            }         
        }
        $serviceTimeMin = (empty($model->time_window) ? '60' : $model->time_window);
        //$this->layout = 'publicDark';
        $weekDays = array('monday', 'tuesday', 'wednesday','thursday','friday', 'saturday','sunday');

        return $this->render('create', [
            'model' => $model,
            'weekDays' => $weekDays,
            'serviceTimeMin' => $serviceTimeMin
        ]);







        if (Yii::$app->user->isGuest) {    
            return $this->goHome();
        }       

        $model = new User();

        $this->layout = 'adminLayout';  
        $weekDays = array('monday', 'tuesday', 'wednesday','thursday','friday', 'saturday','sunday');


        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $title = 'team_title_1'; 
                $text = 'team_text_1'; 
                $username = 'username_1';

                $count = $model::find('id')->orderBy("id desc")->limit(1)->one();
        
                if(!empty($count->id)){
                 $title = 'team_title_'.bcadd($count->id, 1);  
                 $text = 'team_text_'.bcadd($count->id, 1);  
                 $username = 'username_'.bcadd($count->id, 1);           
                }                
    
                $model->company_code = Yii::$app->user->identity->company_code;         
                $model->page_code_title = $title;
                $model->page_code_text = $text;
                $model->username = $username;
                
              

                if($model->save()){
                    $model->updateTeam('team', $model);
                    GeneratorJson::updateTablesGeneric('translations');  
                    GeneratorJson::updateTranslationsGeneric('translations');  
                    return $this->redirect(['view', 'id' => $model->id]);
                }               
            }
        } else {
            $model->loadDefaultValues();
            Helpers::defaultSheddulle($model);
        }
    
  
        $serviceTimeMin = (empty($model->time_window) ? '60' : $model->time_window);

        return $this->render('create', [
            'model' => $model,
            'weekDays' => $weekDays,
            'serviceTimeMin' => $serviceTimeMin
        ]);
    }

    /**
     * Updates an existing Team model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->isGuest) {    
            return $this->goHome();
        }       

        $this->layout = 'adminLayout';  
        
        $model = $this->findModel($id);

        $weekDays = array('monday', 'tuesday', 'wednesday','thursday','friday', 'saturday','sunday');
        /*
        Helpers::defaultSheddulle($model);

       
    

        $arrShedulle = (empty($model->sheddule_array) ? [] : json_decode($model->sheddule_array));

        foreach($arrShedulle as $dayWeek => $arrValues){

            $sh = $dayWeek.'_starting_hour';
            $eh = $dayWeek.'_end_hour';
            $bs = $dayWeek.'_starting_break';
            $be = $dayWeek.'_end_break';
            $oc = $dayWeek.'_open_checkbox';          

            $model->$sh = strtotime($arrValues->start);
            $model->$eh = strtotime($arrValues->end);
            $model->$bs = strtotime($arrValues->break_start);
            $model->$be = strtotime($arrValues->break_end);
            $model->$oc = ($arrValues->closed == 'false') ? '1' : '0';
   
        }
        */

        if ($this->request->isPost && $model->load($this->request->post())) {  
                        
            $model->full_name = $model->first_name.' '.$model->last_name;
            /*
        
            $arrWeek = [];
        
            $str = '';

            foreach($weekDays as $value){

                $sh = $value.'_starting_hour';
                $eh = $value.'_end_hour';
                $bs = $value.'_starting_break';
                $be = $value.'_end_break';
                $oc = $value.'_open_checkbox';
           
                $arrWeek[$value] = [
                    'start' => (empty($model->$sh) ? '' : date('H:i', $model->$sh)),
                    'end' => (empty($model->$eh) ? '' : date('H:i', $model->$eh)),
                    'break_start' => (empty($model->$bs) ? '' : date('H:i', $model->$bs)),
                    'break_end' => (empty($model->$be) ? '' : date('H:i', $model->$be)), 
                    'closed' => ($model->$oc == '0') ? 'true' : 'false',                      
                ];               
            }

            $model->sheddule_array = json_encode($arrWeek);

            */
       
            if($model->save()){             
                //$model->updateTeam('team', $model);
                GeneratorJson::updateTablesGeneric('translations');  
                GeneratorJson::updateTranslationsGeneric('translations'); 
                return $this->redirect(['view', 'id' => $model->id]);
            }
 
        }
   
        $serviceTimeMin = (empty($model->time_window) ? '60' : $model->time_window);


        return $this->render('update', [
            'model' => $model,
            'weekDays' => $weekDays,
            'serviceTimeMin' => $serviceTimeMin
        ]);
    }

    /**
     * Deletes an existing Team model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->isGuest) {    
            return $this->goHome();
        }       

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Team model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Team the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
