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

class ChooseDetailsController extends Controller
{
       
    public function actionIndex()
    {      

       
       
        $company = Helpers::findCompanyCode();     
      
        if (empty($company)) {    
            return $this->goHome();
        }   
        
        $model = new Sheddule();      
        $this->layout = 'registration';    

        /*

        $active = Helpers::booleanExistTeam();

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
        */
        
        $model->team_username = Yii::$app->request->get('team');

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {           
        
          
            $model->booking_code = 'b'.Helpers::generateRandowHumber(3);
            $model->team_username = Yii::$app->request->get('team');
            $model->company_code = Helpers::findCompanyCode();
            $model->location_code = Helpers::findCompanyLocationCode($model->company_code);
            $model->service_code = Yii::$app->request->get('service');
            $model->date = (Yii::$app->request->get('day') == '*') ? date('Y-m-d') : date('Y-m-d', (Yii::$app->request->get('day')));
            $model->time = date('H:i', Yii::$app->request->get('time'));

            $model->client_username = ((isset(Yii::$app->user->identity->guid)) ? Yii::$app->user->identity->guid : '*');   
       
           
            $filter = [
                'service_code' => $model->service_code,
                'company_code' =>  $model->company_code
            ];

            $arrServices = Helpers::arrayServices($filter, 'one');

            $model->service_name = (isset($arrServices['page_code_title']) ? $arrServices['page_code_title'] : '');
            $model->price = (isset($arrServices['price']) ? $arrServices['price'] : 0);

            /*
            print"<pre>";
            print_r($model);
            die();

      
            if(!empty($arrServices)){

            }else{

            }
            
            print"<pre>";
            print_r(Helpers::arrayServices($filter, 'one'));
            die();
          
            $model->service_name = Helpers::getServiceName( $model->service_code);
            */
          
            
            if($model->validate()){
               
                $model->save();

                return $this->redirect(['/choose-complete',               
                    'code' => Yii::$app->request->get('code'),  
                    'model' => $model,
                    'id' => $model->id
                    ]
                ); 
            }
                 
        }            
    
        return $this->render('@frontend/views/client/client-booking/details', [             
            'model' => $model, 
            'publish' => Helpers::checkPublish(Yii::$app->request->get('code'), $this)
        ]);
  

    }
    

}
