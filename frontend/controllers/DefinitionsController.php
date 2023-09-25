<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\User;
use common\models\UserSearch;
use common\models\LoginForm;
use common\models\TicketsSearch;
use common\models\Tickets;
use Yii;
use common\models\Events;
use yii\db\Query;

//Yii::$app->language = 'en-EN';

class DefinitionsController extends Controller
{
    public function actionIndex()
    {
        $this->layout = 'adminLayout';
     
        $searchModel = new UserSearch();

        $arrFilter = [
            'company_code'=> Yii::$app->user->identity->company_code,
            //'active'=> 1,
            'status'=> 10,
            'level' => 'client'
            //'type'=> 'trial',
        ];

        $dataProvider = $searchModel->search($arrFilter);

        return $this->render('/definitions/index', [
            'searchModel' => $searchModel,
            'dataProvider' =>  $dataProvider,
        ]);

    }

}
