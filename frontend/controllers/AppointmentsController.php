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

class AppointmentsController extends Controller
{
       

    
    /**
     * Displays a single Blogs model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = 'registration';

        $companyArr = Helpers::myCompanyArr();

        return $this->render('/client/client-appointments/view', [
            'model' => $this->findModel($id),
            'companyArr' => $companyArr
        ]);
    }


    /**
     * Updates an existing Blogs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $this->layout = 'registration';

        $companyArr = Helpers::myCompanyArr();

        $model = $this->findModel($id);
    
        $model->id = $id;

        if ($this->request->isPost && $model->load($this->request->post())) {

            $filter = [
                'service_code' => $model->service_code,
                'company_code' =>  $model->company_code
            ];

            $arrServices = Helpers::arrayServices($filter, 'one');

            $model->service_name = (isset($arrServices['page_code_title']) ? $arrServices['page_code_title'] : '');
            $model->price = (isset($arrServices['price']) ? $arrServices['price'] : 0);        
            $model->price_range = (isset($arrServices['price_range']) ? $arrServices['price_range'] : 0);

            if($model->save()){             
                return $this->redirect(['/client-appointments/view',           
                    'id' => $model->id,
                    'code' => Yii::$app->request->get('code')
                ]);
            }
        }

        return $this->render('/client/client-appointments/update', [
            'model' => $model,
            'companyArr' => $companyArr
        ]);
    }
    

    public function actionCancel($id)
    {
        if (Yii::$app->user->isGuest) {    
            //return $this->goHome();
        }       

        /*
        $timeFrame = 3;
        $newDate = date('Y-m-d H:i:s', strtotime(' -'. $timeFrame.' hours'));

        print_R($newDate);
        die();

        print"<pre>";
        print_r($this->findModel($id));
        die();

        */

        //$this->findModel($id)->delete();

    
        return $this->redirect(['/client-appointments/index',          
            'code' => Yii::$app->request->get('code')
        ]);

        return $this->refresh();
    }

    public function actionIndex()
    {   

        if(Yii::$app->user->isGuest == true){     
            return $this->goHome();
        } 

        $this->layout = 'registration';
       
        $model = new Sheddule();
        $searchModel = new ShedduleSearch();     
        
        /*
        echo Yii::$app->user->identity->guid;
        echo Yii::$app->user->identity->level;
        die();
         $model->load($this->request->post())

                print"<pre>";
        print_r($searchModel);
        die();

        */


        switch (Yii::$app->user->identity->level) {
            case "client":
                $arrFilter = [
                    'company_code'=> Yii::$app->user->identity->company_code,
                    'client_username'=> Yii::$app->user->identity->guid,
                    'date' => '2024-02-08'
                ];
                break;
            case "team":
                $arrFilter = [
                    'company_code'=> Yii::$app->user->identity->company_code,
                    'team_username'=> Yii::$app->user->identity->guid,
                    'date' => '2024-02-08'
                ];
              break;    break;          
            default:
                $arrFilter = [
                    'company_code'=> Yii::$app->user->identity->company_code,
                    'client_username'=> Yii::$app->user->identity->guid,
                    'date' => '2024-02-08'
                ];
            break;
        }   
    

        if(isset($this->request->queryParams['ShedduleSearch'])){
            $arrFilter = array_merge($arrFilter, $this->request->queryParams['ShedduleSearch']);
        }


        $dataProvider = $searchModel->search([
            $searchModel->formName()=> $arrFilter
        ]);
   
        /*
        $dataProvider = $searchModel->search($this->request->queryParams);
   
        if(isset($this->request->queryParams['UserSearch'])){
            $arrFilter = array_merge($arrFilter, $this->request->queryParams['UserSearch']);
        
           
        }else{
            $dataProvider = $searchModel->search([
                $searchModel->formName()=> $arrFilter
            ]);
        }

        */

 
        //$dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('/client/client-appointments/index', [             
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'publish' => Helpers::checkPublish(Yii::$app->request->get('code'), $this)
        ]);

    } 



    protected function findModel($id)
    {
        if (($model = Sheddule::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /*

        Get Services by Team Members Users

    */

    public function actionGetUserServices()
    {

        $username = (isset($_POST['username'])? $_POST['username'] : '*');     
        $company = (isset($_POST['company'])? $_POST['company'] : '*');   

        $userArr = Helpers::dropdownServices(['username'  => $username, 'company_code'  => $company]);
        $userArr = array_merge(['' => Yii::t('app', 'select_services')],  $userArr);

        $resultArr = [           
            'services' => $userArr
        ];

        $myJSON = json_encode($resultArr);
        
     
        echo $myJSON;

    }

    public function actionGetDateSchedule()
    {
        $date = (isset($_POST['date'])? $_POST['date'] : '*');
        $username = (isset($_POST['username'])? $_POST['username'] : '*');

        $userArr = Helpers::dropdownUserTimeWindowAvailable($date, $username);
        $userArr = array_merge(['' => Yii::t('app', 'select_time')], $userArr);
        $myJSON = json_encode($userArr);

        echo $myJSON;

        /*
        $username = (isset($_POST['username'])? $_POST['username'] : '*');

        $userArr = Helpers::dropdownServices(['username'  => $username]);
        $userArr = array_merge(['' => Yii::t('app', 'select_services')],  $userArr);
        $myJSON = json_encode($userArr);
        
        echo $myJSON;

        $date = (isset($_POST['date'])? $_POST['date'] : '*');
        $username = (isset($_POST['username'])? $_POST['username'] : '*');

        $userArr = Helpers::dropdownUserTimeWindow($date, $username);
        $userArr = array_merge(['' => Yii::t('app', 'select_hours')], 
        $userArr);
        $myJSON = json_encode($userArr);
        
        echo $myJSON;
        */

    }

}
