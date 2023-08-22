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

class ClientAppointmentsController extends Controller
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

        return $this->render('/client/client-appointments/view', [
            'model' => $this->findModel($id),
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

        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('/client/client-appointments/update', [
            'model' => $model,
        ]);
    }
    

    public function actionIndex()
    {     

        $this->layout = 'registration';

       
        $model = new Sheddule();
        $searchModel = new ShedduleSearch();               
 
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('/client/client-appointments/index', [             
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider    
        ]);

    } 


    protected function findModel($id)
    {
        if (($model = Sheddule::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
