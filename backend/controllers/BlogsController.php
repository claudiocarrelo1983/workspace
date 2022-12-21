<?php

namespace backend\controllers;

use common\models\Blogs;
use common\models\BlogsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\GeneratorJson;
use Yii;

/**
 * BlogsController implements the CRUD actions for BlogsCategory model.
 */
class BlogsController extends Controller
{


    public $imageFile;


    public $generate;


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
     * Lists all BlogsCategory models.
     *
     * @return string
     */
    public function actionIndex()
    {   

        $searchModel = new BlogsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BlogsCategory model.
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
     * Creates a new BlogsCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Blogs();          
 
        if ($this->request->isPost) {     

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

         
            if(isset($model->imageFile->name)){

                $fileName = $model->imageFile->baseName. date('YmdHis');;
                $model->image = $model->imgUrl() .$fileName.'.'.$model->imageFile->extension; 
       
                //if ($model->imageFile && $model->validate()) {
                $model->imageFile->saveAs('@frontend/web/'.$model->imgUrl(). $fileName . '.' . $model->imageFile->extension, false);  
                //}  

                $model->created_date = date('Y-m-d H:i:s');  

                $model->tags = '';
                if(!empty($_POST['Blogs']['tagsArr'])){
                    $model->tags = implode(',',$_POST['Blogs']['tagsArr']);
                }    
             
            }      
            
                

            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {    
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
     * Updates an existing BlogsCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

        if(isset($model->imageFile->name)){
            $fileName = $model->imageFile->baseName. date('YmdHis');;
            $model->image = $model->imgUrl() .$fileName.'.'.$model->imageFile->extension;                  

            //if ($model->imageFile && $model->validate()) {
            $model->imageFile->saveAs('@frontend/web/'.$model->imgUrl(). $fileName . '.' . $model->imageFile->extension, false);  
            //}  
        }    
        
        $model->created_date = date('Y-m-d H:i:s');     

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {           

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BlogsCategory model.
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
     * Finds the BlogsCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Blogs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blogs::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
