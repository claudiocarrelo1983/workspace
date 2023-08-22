<?php

namespace frontend\controllers;


use common\models\ShedduleSearch;
use frontend\Models\ClientsSearch;
use yii\web\Controller;
use common\models\LoginForm;
use yii\db\Query;
use yii\helpers\Url;
use common\models\Clients;
use common\models\User;
use common\Helpers\Helpers;
use common\models\Events;
use common\models\Sheddule;
use common\models\Services;
use common\models\GeneratorJson;
use frontend\models\SignupClientForm;

use Yii;
//Yii::$app->language = 'en-EN';

class ClientProfileController extends Controller
{
       
    public function actionIndex()
    {        
        $this->layout = 'registration';
        
        return $this->render('/client/client-profile');
    }

}
