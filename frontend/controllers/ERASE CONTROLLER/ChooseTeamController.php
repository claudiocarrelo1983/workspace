<?php

namespace frontend\controllers;


use common\models\ShedduleSearch;
use frontend\Models\ClientsSearch;
use yii\web\Controller;
use common\models\LoginForm;
use yii\db\Query;
use yii\helpers\Url;
use common\models\Clients;
use common\models\User;
use common\Helpers\Helpers;
use common\models\Events;
use common\models\Sheddule;
use common\models\Services;
use common\models\GeneratorJson;
use frontend\models\SignupClientForm;


use Yii;
//Yii::$app->language = 'en-EN';

class ChooseTeamController extends Controller
{
       
    public function actionIndex()
    {            
        $company = Helpers::findCompanyCode();     
      
        if (empty($company)) {    
            return $this->goHome();
        }    
      
         /*
        $requestLogin = Helpers::booleanRequestLogin();
     
        if($requestLogin == true && Yii::$app->user->isGuest == true){     
          
            return $this->redirect(['page/login',                 
                'code' => Yii::$app->request->get('code')
            ]);    
        }
*/
        $model = new Sheddule();      
        $this->layout = 'registration';    
   
        $active = Helpers::booleanDisplayExistTeam();   
   
        if($active == false){        
           
            return $this->redirect(['/choose-services',                
                'location' => Yii::$app->request->get('location'),
                'code' => Yii::$app->request->get('code'),  
                'team' => '*',               
                'service' => Yii::$app->request->get('service'),             
                'day' => Yii::$app->request->get('day'),
                'time' => Yii::$app->request->get('time')           
                ]
            );   
        }       
     

        $model->team_username = Yii::$app->request->get('team');

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {    
         
            return $this->redirect(['/choose-services',                
                'location' => Yii::$app->request->get('location'),
                'code' => Yii::$app->request->get('code'),  
                'team' => $model->team_username,               
                'service' => Yii::$app->request->get('service'),           
                'day' => Yii::$app->request->get('day'),
                'time' => Yii::$app->request->get('time')               
                ]
            );                   
        }          

        return $this->render('@frontend/views/client/client-booking/team', [             
            'model' => $model, 
            'publish' => Helpers::checkPublish(Yii::$app->request->get('code'), $this)
        ]);
  

    }
    

 

}
