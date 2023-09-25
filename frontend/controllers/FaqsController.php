<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\User;
use common\models\UserSearch;
use common\models\LoginForm;
use common\models\TicketsSearch;
use common\models\Tickets;
use Yii;
use common\models\Events;
use yii\db\Query;

//Yii::$app->language = 'en-EN';

class FaqsController extends Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
             
        $this->layout = 'adminLayout';

        $query = new Query;

        //->where(['username' => Yii::$app->user->identity->username]) 

        $faqs = $query->select('*')
                            ->from(['faqs'])                     
                            ->all();

        return $this->render('/faqs/index', [
            'faqs' => $faqs,
        ]);

    }

}
