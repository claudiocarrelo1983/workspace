<?php

namespace frontend\controllers;

use common\models\Company;
use frontend\models\CompanySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * CompanyController implements the CRUD actions for Company model.
 */
class SocialController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Company models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {    
            return $$this->goHome();
        }

        $this->layout = 'adminLayout';  
        

        return $this->render('view', [
            'model' => $this->findModel(),
        ]);    
    }

    /**
     * Updates an existing Company model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate()
    {
        $this->layout = 'adminLayout';  
    
        if (Yii::$app->user->isGuest) {     
            return $this->goHome();
        }

   
        $model = $this->findModel();     
      
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->render('view', [
                'model' => $this->findModel(),
            ]);  
        }
     
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the Company model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Company the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel()
    {
        if (($model = Company::findOne(['company_code' => Yii::$app->user->identity->company_code])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
