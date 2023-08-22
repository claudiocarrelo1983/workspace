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
    
        if (Yii::$app->user->isGuest) {     
            return $this->goHome();
        }

   
        $model = $this->findModel($id);     
      
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->render('view', [
                'model' => $this->findModel(),
            ]);  
        }
     
        return $this->render('reply', [
            'model' => $model,
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
