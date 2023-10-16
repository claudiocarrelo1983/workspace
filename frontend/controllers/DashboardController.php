<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\User;
use common\models\Sheddule;
use common\Helpers\Helpers;
use Yii;


//Yii::$app->language = 'en-EN';

class DashboardController extends Controller
{
    public function actionIndex(){      

        if (Yii::$app->user->isGuest) {    
            return $this->goHome();
        }

     
        $error = Helpers::accessAccountAdmin(Yii::$app->user->identity);  
        
        if($error > 0){   
            return $this->redirect(['site/login']);
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
     
        return $this->render('/dashboard/index',
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
