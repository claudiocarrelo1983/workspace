<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use common\models\GeneratorJson;

/**
 * Site controller
 */
class CoockiesController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        $this->layout = 'public';
        
        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {

            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }

        return $this->render('/site/texts/coockies');
    }

}
