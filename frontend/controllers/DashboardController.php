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

class DashboardController extends Controller
{
    public function actionIndex(){
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

        return $this->render('/admin/dashboard',
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

}
