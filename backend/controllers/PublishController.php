<?php

namespace backend\controllers;
use common\models\GeneratorJson;
use common\models\Publish;


class PublishController extends \yii\web\Controller
{
    public function actionIndex()
    {    
        $model = new Publish();               
        
        if ($this->request->isPost && $model->load($this->request->post()))             
        {
            $modelGenerateJson = new GeneratorJson();  

            $modelGenerateJson->load($this->request->post());

            switch ($model->type) {
                case 'json':
                    $modelGenerateJson->generatejson();
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
