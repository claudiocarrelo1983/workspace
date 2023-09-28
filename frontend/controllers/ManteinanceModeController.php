<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Company;
use common\models\UserSearch;
use common\models\LoginForm;
use common\models\TicketsSearch;
use common\models\Tickets;
use Yii;
use common\models\Events;
use yii\db\Query;

//Yii::$app->language = 'en-EN';

class ManteinanceModeController extends Controller
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
        
        $model = new Company();
        $searchModel = new UserSearch();

        $model = $this->findModel(Yii::$app->user->identity->id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {           
            return $this->refresh();
        }     

        $arrFilter = [
            'company_code'=> Yii::$app->user->identity->company_code,
            //'active'=> 1,
            'status'=> 10,
            'level' => 'client'
            //'type'=> 'trial',
        ];

        $dataProvider = $searchModel->search($arrFilter);

        return $this->render('/manteinance-mode/index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' =>  $dataProvider,
        ]);

    }

    protected function findModel($id)
    {
        if (($model = Company::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
