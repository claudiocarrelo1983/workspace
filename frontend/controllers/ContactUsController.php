<?php

namespace frontend\controllers;


use Yii;
use yii\web\Controller;
use frontend\models\ContactForm;
use common\models\GeneratorJson;
use common\models\Subscribers;


/**
 * Site controller
 */
class ContactUsController extends Controller
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

          
        $model = new GeneratorJson(); 
        $subject = $model->getLastFileUploaded('subjects');  

        $model = new ContactForm();
        $request = Yii::$app->getRequest();

        if ($request->isPost && $model->load($request->post())) {
            $model->saveTicket($model);         
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->render('/site/contact-us/index', [
            'model' => $model,
            'subject' =>  $subject,
            'modelSubscriber' => $modelSubscriber
        ]);
    }

}
