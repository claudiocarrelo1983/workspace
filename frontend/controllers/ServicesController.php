<?php

namespace frontend\controllers;

use common\models\Services;
use common\models\ServicesCategory;
use common\models\ServicesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use common\Helpers\Helpers;
use common\models\GeneratorJson;

/**
 * ServicesController implements the CRUD actions for Services model.
 */
class ServicesController extends Controller
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
     * Lists all Services models.
     *
     * @return string
     */
    public function actionIndex()
    {

        if (Yii::$app->user->isGuest) {    
            return $this->goHome();
        }

       
        $this->layout = 'adminLayout';  

        $searchModel = new ServicesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

     

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Services model.
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
     * Creates a new Services model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {       
     
        if (Yii::$app->user->isGuest) {    
            return $this->goHome();
        }      

        $this->layout = 'adminLayout';  
    
        $model = new Services();
        $modelCat = new ServicesCategory();
        
        $countCat = $modelCat::find('id')->orderBy("id desc")->limit(1)->one();    
 
        if ($this->request->isPost) {            
       
            if ($model->load($this->request->post())) {

                $model->username = '';
                $model->location_code = '';
              
                if (!empty($_POST['Services']['usernameArr'])) {
        
                    $model->username = implode(',', $_POST['Services']['usernameArr']);
                }    
                
                if (!empty($_POST['Services']['locationCodeArr'])) {    
                    $model->location_code = implode(',', $_POST['Services']['locationCodeArr']);
                }  

                $title = 'service_title_1';     
                $text = 'service_text_1';      
            
                $count = $model::find('id')->orderBy("id desc")->limit(1)->one();
        
               if(!empty($count->id)){
                    $title = 'service_title_'.bcadd($count->id, 1);   
                    $text = 'service_text_'.bcadd($count->id, 1);              
                }
              
                $model->company = Yii::$app->user->identity->company_code;
                $model->service_code = 'service_'.Helpers::generateRandowHumber(); 
                $model->page_code_title = $title;    
                $model->page_code_text = $text;     

                if($model->save()){
                    $model->updateServices('services', $model);
                    GeneratorJson::generatejson();                  
                    return $this->redirect(['view', 'id' => $model->id]);
                }     

            }

        } else {
            $model->loadDefaultValues();
        }

    

        $model->usernameArr = explode(',', $model->username);
        $model->locationCodeArr = explode(',', $model->location_code);

        return $this->render('create', [
            'model' => $model,
            'modelCat' => $modelCat,
            'countCat' => $countCat,
        ]);
    }

    /**
     * Updates an existing Services model.
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
     
        $this->layout = 'adminLayout';  

        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())){

            $model->username = '';
            $model->location_code = '';

            if (!empty($_POST['Services']['usernameArr'])) {    
                $model->username = implode(',', $_POST['Services']['usernameArr']);
            }        

            if (!empty($_POST['Services']['locationCodeArr'])) {    
                $model->location_code = implode(',', $_POST['Services']['locationCodeArr']);
            }   
      
            if($model->save()) {
                $model->updateServices('services', $model);
                GeneratorJson::generatejson();   
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
       
        $model->usernameArr = explode(',', $model->username);
        $model->locationCodeArr = explode(',', $model->location_code);


        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Services model.
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
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Services model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Services the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Services::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
