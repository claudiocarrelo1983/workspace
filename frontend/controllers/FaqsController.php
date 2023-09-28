<?php

namespace frontend\controllers;

use common\models\Newsletter;
use yii\web\Controller;
use common\Helpers\Helpers;

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
             
        if (Yii::$app->user->identity->level != 'admin') {
            return $this->goHome();
        }  

        $this->layout = 'adminLayout';

        $query = new Query;

        //->where(['username' => Yii::$app->user->identity->username]) 

        $faqs = $query->select('*')
                            ->from(['faqs'])                     
                            ->all();

        $model = new Tickets();

        /*
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->refresh();
            }
        } else {
            $model->loadDefaultValues();
        }
        */

        if ($this->request->isPost && $model->load($this->request->post()) && $model->validate()) {

            $model->type = 'support';
            $model->company_code = Yii::$app->user->identity->company_code;
            $model->ticket_number = 'tk'.date('YdmHis').Helpers::generateRandowHumber(3);

            if($model->save() && $model->sendEmail($model)){
                return $this->refresh();
            }            
        }

        return $this->render('/faqs/index', [
            'faqs' => $faqs,
            'model' => $model,
        ]);

    }

}
