<?php

namespace backend\controllers;

use common\models\PricingSpecs;
use common\models\PricingSpecsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PricingSpecsController implements the CRUD actions for PricingSpecs model.
 */
class PricingSpecsController extends Controller
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
     * Lists all PricingSpecs models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PricingSpecsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PricingSpecs model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PricingSpecs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new PricingSpecs();
        $code = 'pricing_specs_1';

        $count = $model::find('id')->orderBy("id desc")->limit(1)->one();

       if(!empty($count->id)){
         $code = 'pricing_specs_'.bcadd($count->id, 1);
       }

        if ($this->request->isPost) {            
            if ($model->load($this->request->post()) && $model->save()) {
                $model->savePricingSpecs('pricing_specs_text',$model);
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'code' => $code
        ]);
    }

    /**
     * Updates an existing PricingSpecs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $count = $model::find('id')->orderBy("id desc")->where(['id' => $id])->limit(1)->one();
        $code = 'pricing_specs_'.$count->id;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            $model->updatePricingSpecs('pricing_specs_text', $model);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'code' => $code,
        ]);
    }

    /**
     * Deletes an existing PricingSpecs model.
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
     * Finds the PricingSpecs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return PricingSpecs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PricingSpecs::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
