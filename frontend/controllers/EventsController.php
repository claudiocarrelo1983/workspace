<?php

namespace frontend\controllers;

use common\models\Events;
use common\models\EventsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use Yii;

/**
 * EventsController implements the CRUD actions for Events model.
 */
class EventsController extends Controller
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

    public function actionEvents()
    {
        $this->layout = 'adminLayout';
        
        $modelEvents = new Events();      
       
        if ($this->request->isPost && $modelEvents->load($this->request->post())) {
            print_r($this->request->post());
            die();
    
            die('___');
        }  
        
        
     

    
        return $this->render('@frontend/views/admin/calendar', [
            'modelEvents' => $modelEvents        
         
        ]);
    }

    
    public function actionIndex()
    {
        $this->layout = 'adminLayout';
        
        $modelEvents = new Events();          

        if(isset($this->request->post()['Events']['id']) && $this->request->post()['Events']['id'] > 0){
            $modelEvents = $this->findModelEvents($this->request->post()['Events']['id']); 
        }
      

        if($this->request->isPost && isset($this->request->post()['Events'])){
            $modelEvents->start = (isset($this->request->post()['start'])) ? $this->request->post()['start'] : '';
            $modelEvents->end = (isset($this->request->post()['end'])) ? $this->request->post()['end'] : '';       
            $modelEvents->username = Yii::$app->user->identity->username; 
        }
        
        if ($this->request->isPost && $modelEvents->load($this->request->post())) {
            
            $modelEvents->save();
            return $this->refresh();
        }        

        $query = new Query;
        $eventsArr = $query->select('*')
                    ->from(['events'])
                    ->where(
                        [
                            'username' => Yii::$app->user->identity->username,
                            'active' => true
                        ]) 
                    ->all();

        $myDataArr = [];

        foreach($eventsArr as $event){
            $myDataArr[] = [                
                'title' => (Yii::t('app', $event['page_code'])),
                'className' => $event['color_code'],
                'start' => $event['start'],
                'end' => $event['end']                        
            ];
        }
     
    
        return $this->render('/calendar/index', [
            'modelEvents' => $modelEvents,
            'myData' => json_encode($myDataArr)      
         
        ]);
    }

    /**
     * Lists all Events models.
     *
     * @return string
     */
    public function actionIndex2()
    {
        $searchModel = new EventsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Events model.
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
     * Creates a new Events model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Events();

        if ($this->request->isPost) {
            die('____');
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
     * Updates an existing Events model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Events model.
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
     * Finds the Events model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Events the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Events::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
