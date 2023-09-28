<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\User;
use common\models\Subjects;
use common\models\SubjectsSearch;
use common\models\Tickets;
use Yii;
use common\models\Events;
use yii\db\Query;

//Yii::$app->language = 'en-EN';

class NotificationsSubjectController extends Controller
{
    public function actionIndex()
    {
        $this->layout = 'adminLayout';

        if (Yii::$app->user->isGuest) {    
            return $this->goHome();
        }

        if (Yii::$app->user->identity->level != 'admin') {
            return $this->goHome();
        }  

        $searchModel = new SubjectsSearch();
        $model = new Subjects();

        $arrFilter = [
            'company_code'=> Yii::$app->user->identity->company_code,
            'type'=> 'message',       
            //'active'=> 1,
            //'status'=> 10,
            //'level' => 'client'
            //'type'=> 'trial',
        ];
       
        if(isset($this->request->queryParams['SubjectsSearch'])){
            $arrFilter = array_merge($arrFilter, $this->request->queryParams['SubjectsSearch']);

            $dataProvider = $searchModel->search([
                $searchModel->formName()=> $arrFilter
            ]);
        }else{
            $dataProvider = $searchModel->search([
                $searchModel->formName()=> $arrFilter
            ]);
        }
     

        return $this->render('/notifications-subject/index', [
            'searchModel' => $searchModel,
            'dataProvider' =>  $dataProvider,
            'model' => $model
        ]);   
    }
    
     /**
     * Creates a new Clients model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {

        if (Yii::$app->user->isGuest) {    
            return $this->goHome();
        }

        $model = new Subjects();
        $code = 'contacts_label_choose_subject_1';
        
        $count = $model::find('id')->orderBy("id desc")->limit(1)->one();

        if(!empty($count->id)){
            $code = 'contacts_label_choose_subject_'.bcadd($count->id, 1);
        }

        if (Yii::$app->user->identity->level != 'admin') {
            return $this->goHome();
        }  

        $this->layout = 'adminLayout';  

        $model = new Subjects();

        if ($this->request->isPost) {                       

            if ($model->load($this->request->post())) {

                $model->page_code = $code;
                $model->company_code = Yii::$app->user->identity->company_code;
                $model->type = 'client';
                $model->active = '1';
                $model->position = 'contact_us'; 

                if($model->save()){
                    return $this->refresh();
                }

 
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'code' => $code,
        ]);
    }

    public function actionReply($id)
    {
        $this->layout = 'adminLayout';      
        $searchModel = new TicketsSearch();
        
        $values = Tickets::findOne(['id' => $id]);


   
        if (Yii::$app->user->isGuest) {     
            return $this->goHome();
        }

        $arrFilter = [
            'company_code'=> Yii::$app->user->identity->company_code,
            'ticket_parent'=> $values->ticket_parent,
            //'type'=> 'message', 
            //'status'=> 10,
            //'level' => 'client'
            //'type'=> 'trial',
        ];

        $dataProvider = $searchModel->searchReply([
            $searchModel->formName()=> $arrFilter
        ]);
   
        $modelUpdate = $this->findModel($id);  
        
        $model = new Tickets();
        
        if ($this->request->isPost && $modelUpdate->load($this->request->post())){
            
            $model->ticket_parent =  $modelUpdate->ticket_number;
            $model->company_code =  $modelUpdate->company_code;
            $model->username_code =  $modelUpdate->username_code;
            $model->type =  'message_reply';             
            $model->text =  $modelUpdate->text;      
            $model->closed_ticket =  0;  
            switch($modelUpdate->closed_ticket){
                case 'close':                  
                    $modelUpdate->closed_ticket = 0;
                    if($modelUpdate->save()) {
                        $this->refresh();           
                    }
                    break;
                case 'open':                
                    $modelUpdate->closed_ticket = 1;
                    if($modelUpdate->save()) {
                        $this->refresh();           
                    }
                    break;
                default:         
                    if($model->save()) {
                        $this->refresh();           
                    }
                    break;
            }   
        }


        return $this->render('reply', [
            'model' => $modelUpdate,
            'dataProvider' =>  $dataProvider,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Tickets::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
