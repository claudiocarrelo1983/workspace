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

class ClientProfileController extends Controller
{
       
    public function actionIndex()
    {        
        if(Yii::$app->user->isGuest == true){     
            return $this->goHome();
        } 
        
        $this->layout = 'registration';

        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/page', 
                'code' => Yii::$app->request->get('code')]
            );           
        }   
      
        $model =  $this->findModel(Yii::$app->user->identity->id);
        
        return $this->render('/client/client-profile/index', [    
            'model' => $model,
            'publish' => Helpers::checkPublish(Yii::$app->request->get('code'), $this) 
        ]);
    
    }

        /**
     * Finds the Clients model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Clients the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
