<?php

namespace frontend\controllers;

use common\models\User;
use common\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * ClientsController implements the CRUD actions for Clients model.
 */
class ClientsController extends Controller
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
     * Lists all Clients models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {    
            return $this->goHome();
        }

        if (Yii::$app->user->identity->level != 'admin') {
            return $this->goHome();
        }  

        $this->layout = 'adminLayout';  

        $searchModel = new UserSearch();

        $arrFilter = [
            'company_code'=> Yii::$app->user->identity->company_code,
            //'active'=> 1,
            'status'=> 10,
            'level' => 'client'
            //'type'=> 'trial',
        ];

        if(isset($this->request->queryParams['UserSearch'])){
            $arrFilter = array_merge($arrFilter, $this->request->queryParams['UserSearch']);
        
            $dataProvider = $searchModel->search([
                $searchModel->formName()=> $arrFilter
            ]);
        }else{
            $dataProvider = $searchModel->search([
                $searchModel->formName()=> $arrFilter
            ]);
        }
     

        //$dataProvider = $searchModel->search($this->request->queryParams);
     
        // ->andFilterWhere(['like', 'type', $this->type])
     

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' =>  $dataProvider,
        ]);
    }

     /**
     * Lists all Clients models.
     *
     * @return string
     */
    public function actionRessellerIndex()
    {
        if (Yii::$app->user->isGuest) {    
            return $this->goHome();
        }     

        $this->layout = 'adminLayout';  

        $searchModel = new UserSearch();
        
        $dataProvider = $searchModel->search([
            $searchModel->formName()=>
            [
                'company_code'=> Yii::$app->user->identity->company_code,
                'voucher_parent'=> Yii::$app->user->identity->voucher,
                'active'=> 1,
                'status'=> 10,
                'level' => 'client'
                //'type'=> 'trial',
            ]
        ]);
     
        // ->andFilterWhere(['like', 'type', $this->type])
     

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' =>  $dataProvider,
        ]);
    }

    /**
     * Displays a single Clients model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest) {    
            return $this->goHome();
        }

        $this->layout = 'adminLayout';  

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Clients model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {

        if (Yii::$app->user->isGuest) {    
            return $this->goHome();
        }

        
        if (Yii::$app->user->identity->level != 'admin') {
            return $this->goHome();
        }  

        $this->layout = 'adminLayout';  

        $model = new User();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Clients model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->isGuest) {    
            return $this->goHome();
        }        

        $model = $this->findModel($id);

        $this->layout = 'adminLayout';  

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Clients model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->isGuest) {    
            return $this->goHome();
        }

        $this->layout = 'adminLayout';  

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
