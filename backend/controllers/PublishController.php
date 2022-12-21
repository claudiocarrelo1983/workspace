<?php

namespace backend\controllers;
use common\models\GeneratorJson;

class PublishController extends \yii\web\Controller
{
    public function actionIndex()
    {    
        $model = new GeneratorJson();               
        
        if ($this->request->isPost) {                  
        
            if(isset($_POST['GeneratorJson']['type'])){
                if($_POST['GeneratorJson']['type'] == 'json'){              
                    $model->generatejson();
                }else{
                    $model->populateTable();
                }
            }        
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
