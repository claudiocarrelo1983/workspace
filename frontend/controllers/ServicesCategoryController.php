<?php

namespace frontend\controllers;

use common\models\ServicesCategory;
use common\models\ServicesCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\Helpers\Helpers;
use Yii;

/**
 * ServicesCategoryController implements the CRUD actions for ServicesCategory model.
 */
class ServicesCategoryController extends Controller
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
     * Lists all ServicesCategory models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'adminLayout';  

        $searchModel = new ServicesCategorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ServicesCategory model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = 'adminLayout';  

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ServicesCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout = 'adminLayout';  

        $model = new ServicesCategory();     

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $title = 'service_category_title_1';         
        
                $count = $model::find('id')->orderBy("id desc")->limit(1)->one();
        
               if(!empty($count->id)){
                 $title = 'service_category_title_'.bcadd($count->id, 1);             
               }

                $model->company = Yii::$app->user->identity->company_code;
                $model->category_code = 'service_category_'.Helpers::generateRandowHumber();  
                $model->page_code_title = $title;

                if($model->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }         
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ServicesCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = 'adminLayout';  
        
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ServicesCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ServicesCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ServicesCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ServicesCategory::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
