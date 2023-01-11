<?php

namespace backend\controllers;

use common\models\BlogsCategory;
use common\models\BlogsCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BlogCategoryController implements the CRUD actions for BlogsCategory model.
 */
class BlogscategoryController extends Controller
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
     * Lists all BlogsCategory models.
     *
     * @return string
     */
    public function actionIndex()
    {                
    
        $searchModel = new BlogscategorySearch();
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

        $model = new BlogsCategory();
      
        $code = 'blog_category_1';

        $count = $model::find('id')->orderBy("id desc")->limit(1)->one();

       if(!empty($count->id)){
         $code = 'blog_category_'.bcadd($count->id, 1);
       }

        if ($this->request->isPost) {
            $model->created_date = date('Y-m-d H:i:s');
            if ($model->load($this->request->post()) && $model->save()) {
                $model->saveBlogCategory('blog_category',$model);
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'code' =>  $code
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

        $count = $model::find('id')->orderBy("id desc")->where(['id' => $id])->limit(1)->one();
        $code = 'blog_category_'.$count->id;

        $model->created_date = date('Y-m-d H:i:s');
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            $model->updateBlogCategory($model);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'code' =>  $code
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
     * @return BlogsCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BlogsCategory::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
