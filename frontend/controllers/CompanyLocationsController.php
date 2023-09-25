<?php

namespace frontend\controllers;

use frontend\models\CompanyLocations;
use frontend\models\CompanyLocationsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\Helpers\Helpers;
use Yii;

/**
 * CompanyLocationsController implements the CRUD actions for CompanyLocations model.
 */
class CompanyLocationsController extends Controller
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
     * Lists all CompanyLocations models.
     *
     * @return string
     */
    public function actionIndex()
    {

        if (Yii::$app->user->isGuest) {     
            return $this->goHome();
        }

        $this->layout = 'adminLayout';  

        $searchModel = new CompanyLocationsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CompanyLocations model.
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
     * Creates a new CompanyLocations model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        
        if (Yii::$app->user->isGuest) {     
            return $this->goHome();
        }

        $this->layout = 'adminLayout';  

        $model = new CompanyLocations();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {   
                
                $title = 'company_location_title_1';   
                $description = 'company_location_description_1';
        
                $count = $model::find('id')->orderBy("id desc")->limit(1)->one();
        
               if(!empty($count->id)){
                 $title = 'company_location_title_'.bcadd($count->id, 1); 
                 $description = 'company_location_description_'.bcadd($count->id, 1);            
               }
                $model->company_code = Yii::$app->user->identity->company_code;
                $model->location_code = 'company_location_'.Helpers::generateRandowHumber();  
                $model->page_code_title = $title;
                $model->page_code_description = $description;

                if($model->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }   
           
            }
        } else {
            $model->loadDefaultValues();
            Helpers::defaultSheddulle($model);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CompanyLocations model.
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

        Helpers::defaultSheddulle($model);

        $weekDays = array('monday', 'tuesday', 'wednesday','thursday','friday', 'saturday','sunday');

        $arrShedulle = (empty($model->sheddule_array) ? [] : json_decode($model->sheddule_array));

        foreach($arrShedulle as $dayWeek => $arrValues){

            $sh = $dayWeek.'_starting_hour';
            $eh = $dayWeek.'_end_hour';
            $bs = $dayWeek.'_starting_break';
            $be = $dayWeek.'_end_break';
            $oc = $dayWeek.'_open_checkbox';          

            $model->$sh = strtotime($arrValues->start);
            $model->$eh = strtotime($arrValues->end);
            $model->$bs = strtotime($arrValues->break_start);
            $model->$be = strtotime($arrValues->break_end);
            $model->$oc = ($arrValues->closed == 'false') ? '1' : '0';
   
        }


        if ($this->request->isPost && $model->load($this->request->post())) {     

            $arrWeek = [];

        
            foreach($weekDays as $value){

                $sh = $value.'_starting_hour';
                $eh = $value.'_end_hour';
                $bs = $value.'_starting_break';
                $be = $value.'_end_break';
                $oc = $value.'_open_checkbox';

                $arrWeek[$value] = [
                    'start' => (empty($model->$sh) ? '' : date('H:i', $model->$sh)),
                    'end' => (empty($model->$eh) ? '' : date('H:i', $model->$eh)),
                    'break_start' => (empty($model->$bs) ? '' : date('H:i', $model->$bs)),
                    'break_end' => (empty($model->$be) ? '' : date('H:i', $model->$be)), 
                    'closed' => ($model->$oc == '0') ? 'true' : 'false',                      
                ];               
            }

            $model->sheddule_array = json_encode($arrWeek);
            
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
   
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * Deletes an existing CompanyLocations model.
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
     * Finds the CompanyLocations model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return CompanyLocations the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CompanyLocations::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
