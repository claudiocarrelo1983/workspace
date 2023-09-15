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

class NotificationsListController extends Controller
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

        $searchModel = new TicketsSearch();

        $arrFilter = [
            'company_code'=> Yii::$app->user->identity->company_code,
            'type'=> 'message',       
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
