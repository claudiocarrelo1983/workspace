<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use common\models\GeneratorJson;
use common\models\Subscribers;


/**
 * Site controller
 */
class SitemapController extends Controller
{
    
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        $modelSubscriber = new Subscribers();  

        if ($this->request->isPost && $modelSubscriber->load($this->request->post()) ) {
    
            if($modelSubscriber->validate() && $modelSubscriber->save()){             
                $this->refresh();
            } else{             
                Yii::$app->getSession()->setFlash('display', 'display: block; padding-right: 17px;');
                Yii::$app->getSession()->setFlash('show', 'show');
            }        
        }


        $this->layout = 'public';
       
        $modelGeneratorjson = new GeneratorJson(); 
        $configurations = $modelGeneratorjson->getLastFileUploaded('configurations');

        $maintenance = (isset($configurations['maintenance']) ? $configurations['maintenance'] : 0);

        if (Yii::$app->user->isGuest && $maintenance == true) {

            $this->layout = 'maintenance';

            return $this->render('home/maintenance');
        }

        return $this->render('/site/texts/sitemap',
            ['modelSubscriber' => $modelSubscriber]
        );
    }

}
