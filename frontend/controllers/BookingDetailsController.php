<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\Helpers\Helpers;
use common\models\Sheddule;
use common\models\ShedduleSearch;

use Yii;
//Yii::$app->language = 'en-EN';

class BookingDetailsController extends Controller
{
       
    public function actionIndex()
    {       

        print_r(Yii::$app->request->post());
        die();
        $company = Helpers::findCompanyCode();     
       
        if (empty($company)) {    
            return $this->goHome();
        }    
        
        $requestLogin = Helpers::booleanRequestLogin();

        if($requestLogin == true && Yii::$app->user->isGuest == true){               
            return $this->redirect(['page/login',                 
                'code' => Yii::$app->request->get('code')
            ]);       
        }

        $model = new Sheddule(); 

        $model->location_code = '*';

        $this->layout = 'registration';         
         
        die('___');
  

    }

}
