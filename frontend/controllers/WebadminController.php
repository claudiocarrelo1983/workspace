<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Company;
use Yii;
use yii\imagine\Image;
use yii\web\UploadedFile;

use common\models\User;
use common\models\UserSearch;
use common\models\LoginForm;
use common\models\CompanySearch;
use common\models\Events;
use yii\db\Query;

//Yii::$app->language = 'en-EN';

class WebadminController extends Controller
{

    
    public $bannerimage;

    public $logoImage;

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
            
            /*
            print"<pre>";
            print_r($this->request->post());
            die();

            if(isset($model->bannerimage->name)){

                $fileName = $model->bannerimage->baseName;
                $model->image = $model->imgUrl() .$fileName.'.'.$model->bannerimage->extension; 
       
                //if ($model->imageFile && $model->validate()) {
                $model->bannerimage->saveAs('@frontend/web/'.$model->imgUrl(). $fileName . '.' . $model->imageFile->extension, false);  
                //}  

          
                $model->bannerimage = UploadedFile::getInstance($model, 'bannerimage');

                $path = '@frontend/web' . $model->imgUrl();
                $model->image = $model->bannerimage->name;
                $model->path = $model->imgUrl();
    
                $filePath = $path.$model->bannerimage->baseName . '.' . $model->bannerimage->extension;
                
                //creates small images 90x50
                Image::thumbnail($filePath, 90, 50)
                    ->save(Yii::getAlias('@frontend/web/images/blog/90x50/'.$model->bannerimage->baseName .'.'. $model->bannerimage->extension), ['quality' => 80]);

            }

            print"<pre>";
            print_r($model);
            die();
            */

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
