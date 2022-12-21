<?php

namespace frontend\controllers;

use yii\web\Controller;

Yii::$app->language = 'en-EN';

class PublicController extends Controller
{
    public function actionIndex()
    {
        $this->layout = 'publicLayout';

        return $this->render('index');
    }

    public function actionPublicMenu()
    {
        $this->layout = 'publicLayout';

        return $this->render('public-menu');
    }

    public function actionPricing()
    {    
        $this->layout = 'publicLayout';

        return $this->render('pricing');
    }


    public function actionFeatures()
    {
        $this->layout = 'publicLayout';

        return $this->render('features');
    }

    public function actionContactUs()
    {
        $this->layout = 'publicLayout';

        return $this->render('contact-us');
    }
    
     /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        
        //$this->layout = 'publicLayout';

        return $this->render('about');
    }


}
