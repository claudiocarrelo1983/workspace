<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use frontend\models\PasswordResetRequestForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

use frontend\models\ResetPasswordForm;
use common\models\User;
use frontend\models\ContactForm;
use yii\helpers\Url;
use frontend\models\SignupForm;
use yii\helpers\Json;
use common\models\GeneratorJson;
use sammaye\mailchimp\Mailchimp;
use common\models\Comments;
use common\Helpers\Helpers;
use yii\db\Query;


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
            'subject' =>  $subject
        ]);
    }

}
