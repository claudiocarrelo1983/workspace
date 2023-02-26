<?php

namespace backend\controllers;

use common\models\Blogs;
use common\models\BlogsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\db\Query;
use common\models\GeneratorJson;
use common\helpers\Helpers;
use api;
use Yii;
use yii\imagine\Image;

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
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

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

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
    
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
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $model = new Blogs();   
        $title = 'blog_title_1';
        $subtitle = 'blog_subtitle_1';
        $description = 'blog_description_1';
        $text = 'blog_text_1';

        $count = $model::find('id')->orderBy("id desc")->limit(1)->one();

       if(!empty($count->id)){
         $title = 'blog_title_'.bcadd($count->id, 1);
         $subtitle = 'blog_subtitle_'.bcadd($count->id, 1);
         $description = 'blog_description_'.bcadd($count->id, 1);
         $text = 'blog_text_'.bcadd($count->id, 1);
       }  
 
       if ($this->request->isPost && $model->load($this->request->post())){       

           
            if(isset($model->imageFile->name)){

                $fileName = $model->imageFile->baseName;
                $model->image = $model->imgUrl() .$fileName.'.'.$model->imageFile->extension; 
       
                //if ($model->imageFile && $model->validate()) {
                $model->imageFile->saveAs('@frontend/web/'.$model->imgUrl(). $fileName . '.' . $model->imageFile->extension, false);  
                //}  

                
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

                $path = '@frontend/web' . $model->imgUrl();
                $model->image = $model->imageFile->name;
                $model->path = $model->imgUrl();
    
                $filePath = $path.$model->imageFile->baseName . '.' . $model->imageFile->extension;
                
                //creates small images 90x50
                Image::thumbnail($filePath, 90, 50)
                    ->save(Yii::getAlias('@frontend/web/images/blog/90x50/'.$model->imageFile->baseName .'.'. $model->imageFile->extension), ['quality' => 80]);

                //creates medium images 322x179
                Image::thumbnail($filePath, 322.25, 179.02)
                    ->save(Yii::getAlias('@frontend/web/images/blog/322x179/'.$model->imageFile->baseName .'.'. $model->imageFile->extension), ['quality' => 80]);

                //creates medium images 900x500
                Image::thumbnail($filePath, 900, 500)
                    ->save(Yii::getAlias('@frontend/web/images/blog/900x500/'.$model->imageFile->baseName .'.'. $model->imageFile->extension), ['quality' => 80]);

                //creates medium images 900x500
                Image::thumbnail($filePath, 665, 257)
                    ->save(Yii::getAlias('@frontend/web/images/blog/665x257/'.$model->imageFile->baseName .'.'. $model->imageFile->extension), ['quality' => 80]);

                //creates medium images 900x500
                Image::thumbnail($filePath, 665, 257)
                    ->save(Yii::getAlias('@frontend/web/images/blog/665x257/'.$model->imageFile->baseName .'.'. $model->imageFile->extension), ['quality' => 80]);


                    
            }      


         
            $model->created_date = date('Y-m-d H:i:s');   
            
            $model->tags = '';
            if(!empty($_POST['Blogs']['tagsArr'])){
               
                $model->tags = implode(',',$_POST['Blogs']['tagsArr']);
            }

            $tagQuery = new Query;

            $countries = $tagQuery->select([
                'country_code' 
                ])
            ->from('countries')    
            ->all();
    
            foreach($countries as $country){
                $m = 'text_' . $country['country_code'];
                $model->$m = $model->$m; //Helpers::cleanTynyMceText();   
            }
            
            $model->url = Helpers::removeSpecialChars($model->title_en);

            if ($model->save()) {
                $model::saveBlogs('blogs_text', $model);
                return $this->redirect(['view', 'id' => $model->id]);
            }
    
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'title' => $title,
            'description' => $description,
            'subtitle' => $subtitle,
            'text' => $text,
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

        $tagQuery = new Query;

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $model = $this->findModel($id);
      
        $result = $model::find('page_code_title')->orderBy("id desc")->where(['id' => $id])->limit(1)->one();
        $id = str_replace('blog_title_', '', $result->page_code_title);
      
        $title = 'blog_title_'.$id;
        $subtitle = 'blog_subtitle_'.$id;
        $description = 'blog_description_'.$id;
        $text = 'blog_text_'.$id;        

        $model->load($this->request->post());     

        $countries = $tagQuery->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();
      
        /*
        foreach($countries as $country){
            $m = 'text_' . $country['country_code'];
            $model->$m ='hhh'; //Helpers::cleanTynyMceText();   
        }

        */
     
        if ($this->request->isPost && $model->load($this->request->post())) {   


      
            foreach($countries as $country){
                $m = 'text_' . $country['country_code'];
                $arrOptions = ['p','font-weight-semibold'];
                $model->$m = Helpers::cleanTynyMceText($model->$m, $arrOptions);   
            }
        


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
                
                //creates small images 90x50
                Image::thumbnail($filePath, 90, 50)
                    ->save(Yii::getAlias('@frontend/web/images/blog/90x50/'.$model->imageFile->baseName .'.'. $model->imageFile->extension), ['quality' => 80]);

                //creates medium images 322x179
                Image::thumbnail($filePath, 322.25, 179.02)
                    ->save(Yii::getAlias('@frontend/web/images/blog/322x179/'.$model->imageFile->baseName .'.'. $model->imageFile->extension), ['quality' => 80]);

                //creates medium images 900x500
                Image::thumbnail($filePath, 900, 500)
                    ->save(Yii::getAlias('@frontend/web/images/blog/900x500/'.$model->imageFile->baseName .'.'. $model->imageFile->extension), ['quality' => 80]);


            }     

            $model->tags = '';
            if (!empty($_POST['Blogs']['tagsArr'])) {

                $model->tags = implode(',', $_POST['Blogs']['tagsArr']);
            }

            $model->url = Helpers::removeSpecialChars($model->title_en);

            $model->created_date = date('Y-m-d H:i:s');
        
            //$model->url = str_replace(" ", "-", strtolower($model->title));

      
            if ($model->save()) {
                $model::updateBlogs('blogs_text', $model);
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        $model->tagsArr = explode(',', $model->tags);


        return $this->render('update', [
            'model' => $model,
            'title' => $title,
            'description' => $description,
            'subtitle' => $subtitle,
            'text' => $text,
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

    public function actionApi()
    {
   


// Set the API endpoint and parameters
$url = 'https://api.openai.com/v1/completions';
$data = array(
    'model' => 'text-davinci-003',
    'prompt' => 'Write me a post with 1000 words about macronutrients',
    //'temperature' => '0',
   //'max_tokens' => '4000',
);
$headers = array(
    'Authorization: Bearer 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',
    'Content-Type: application/json',
);

// Send the API request
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$response = curl_exec($ch);
curl_close($ch);






// Parse the API response
$result = json_decode($response, true);

print"<pre>";
print_r($result['choices']);
die();
$answer = $result['result']['fulfillment']['speech'];
print_r($response);
die();

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
