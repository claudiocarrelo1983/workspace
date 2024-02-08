<?php

namespace backend\controllers;
use common\models\GeneratorJson;
use common\models\Publish;
use Yii;

class PublishController extends \yii\web\Controller
{
    public function actionIndex()
    {    

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Publish();               
        
        if ($this->request->isPost && $model->load($this->request->post()))             
        {
            $modelGenerateJson = new GeneratorJson();  

            $modelGenerateJson->load($this->request->post());
          
            switch ($model->type) {
                case 'json':
                    $modelGenerateJson->generatejson();
                    //$modelGenerateJson->populateMissingTranslation();
                    break;        
                case 'tables':
                    $modelGenerateJson->populateTable();
                    break;
                case 'deploy':                  
                    $modelGenerateJson->deploy();
                    break;
            }     
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
