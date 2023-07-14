<?php

namespace backend\controllers;

use common\models\Team;
use common\models\TeamSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;
use yii\imagine\Image;
/**
 * TeamController implements the CRUD actions for Team model.
 */
class TeamController extends Controller
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
     * Lists all Team models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $searchModel = new TeamSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Team model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Team model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Team();
        $title = 'team_title_1';
        $text = 'team_text_1';

        $count = $model::find('id')->orderBy("id desc")->limit(1)->one();

       if(!empty($count->id)){
         $title = 'team_title_'.bcadd($count->id, 1);
         $text = 'team_text_'.bcadd($count->id, 1);
       }  

        if ($this->request->isPost) {

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if(isset($model->imageFile->name)){

                $fileName = $model->imageFile->baseName;
                $model->image = $model->imgUrl() .$fileName.'.'.$model->imageFile->extension;

                //if ($model->imageFile && $model->validate()) {
                $model->imageFile->saveAs('@frontend/web/'.$model->imgUrl(). $fileName . '.' . $model->imageFile->extension, false);  
                //}  

                $path = '@frontend/web' . $model->imgUrl();
                $model->image = $model->imageFile->name;
                $model->path = $model->imgUrl();
     
                $filePath = $path.$model->imageFile->baseName . '.' . $model->imageFile->extension;
                
                //creates small images 80x80
                 Image::thumbnail($filePath, 80, 80)
                    ->save(Yii::getAlias('@frontend/web/images/team/80x80/'.$model->imageFile->baseName .'.'. $model->imageFile->extension), ['quality' => 80]);
    
    
                //creates medium images 250x250
                Image::thumbnail($filePath, 250, 250)
                    ->save(Yii::getAlias('@frontend/web/images/team/250x250/'.$model->imageFile->baseName .'.'. $model->imageFile->extension), ['quality' => 70]);
        
    

            }               


            if ($model->load($this->request->post()) && $model->save()) {
                $model::saveTeam('team_text', $model);
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'title' => $title,
            'text' => $text,
        ]);
    }

    /**
     * Updates an existing Team model.
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

        $result = $model::find('page_code_title')->orderBy("id desc")->where(['id' => $id])->limit(1)->one();
        $id = str_replace('team_title_', '', $result->page_code_title);
      
        $title = 'team_title_'.$id;     
        $text = 'team_text_'.$id;  

        if ($this->request->isPost && $model->load($this->request->post())) {

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if(isset($model->imageFile->name)){

                $fileName = $model->imageFile->baseName;
                $model->image = $model->imgUrl() .$fileName.'.'.$model->imageFile->extension;

                //if ($model->imageFile && $model->validate()) {
                $model->imageFile->saveAs('@frontend/web/'.$model->imgUrl(). $fileName . '.' . $model->imageFile->extension, false);  
                //}  

                
            $path = '@frontend/web' . $model->imgUrl();
            $model->image = $model->imageFile->name;
            $model->path = $model->imgUrl();
 
            $filePath = $path.$model->imageFile->baseName . '.' . $model->imageFile->extension;

                      
            //creates small images 80x80
            Image::thumbnail($filePath, 80, 80)
            ->save(Yii::getAlias('@frontend/web/images/team/80x80/'.$model->imageFile->baseName .'.'. $model->imageFile->extension), ['quality' => 80]);


        //creates medium images 250x250
            Image::thumbnail($filePath, 250, 250)
            ->save(Yii::getAlias('@frontend/web/images/team/250x250/'.$model->imageFile->baseName .'.'. $model->imageFile->extension), ['quality' => 70]);



            }               

  
            if($model->save()){
                $model::updateTeam('team_text', $model);
                return $this->redirect(['view', 'id' => $model->id]);
            }


           
        }

        return $this->render('update', [
            'model' => $model,
            'title' => $title,
            'text' => $text,
        ]);
    }

    /**
     * Deletes an existing Team model.
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
     * Finds the Team model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Team the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Team::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
