<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Company;
use Yii;
use yii\imagine\Image;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use common\Helpers\Helpers;


//Yii::$app->language = 'en-EN';

class WebadminController extends Controller
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

    public function actionIndex()
    {
   
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $this->layout = 'adminLayout';       
  
        $model = $this->findModel(Yii::$app->user->identity->id);
        
        if (Yii::$app->user->identity->level != 'admin') {
            return $this->goHome();
        }  

       // $model = new Company();  

        if ($this->request->isPost && $model->load($this->request->post())) {                       

            $model->path = $model->imgUrl();

            $model->bannerimage = UploadedFile::getInstance($model, 'bannerimage');
            
            $model->logoimage = UploadedFile::getInstance($model, 'logoimage');      
       

            if(isset($model->logoimage->name)){

                $model->logoimage = UploadedFile::getInstance($model, 'logoimage');           
                $fileName = 'cl-'.Yii::$app->user->identity->guid;
                $model->image_logo = $fileName.'.'.$model->logoimage->extension;  

                if($model->validate()){    
                    Helpers::deleteOldJson();            
                    $model->logoimage->saveAs('@frontend/web/'.$model->path. $fileName . '.' . $model->logoimage->extension, false);  
                }
     
            }            

            if(isset($model->bannerimage->name)){

                $model->bannerimage = UploadedFile::getInstance($model, 'bannerimage');           
                $fileName = 'cb-'.Yii::$app->user->identity->guid;
                $model->image_banner = $fileName.'.'.$model->bannerimage->extension;  

                if($model->validate()){             
                    $model->bannerimage->saveAs('@frontend/web/'.$model->path. $fileName . '.' . $model->bannerimage->extension, false);  
                }      
            }

            if($model->save()){     
        
                Yii::$app->db->createCommand("UPDATE user SET 
                    company_code_url=:company_code_url            
                    WHERE id=:id")
                ->bindValue(':company_code_url', $model->company_code_url)
                ->bindValue(':id', Yii::$app->user->identity->id)
                ->execute();

                $this->refresh();  
            }                      
   
        }

        return $this->render('/admin/website', [
            'model' => $model,
        ]);

    }

    protected function findModel($id)
    {
        if (($model = Company::findOne(['id' => $id])) !== null) {      
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
