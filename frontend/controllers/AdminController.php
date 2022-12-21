<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\LoginForm;
use Yii;

Yii::$app->language = 'en-EN';
class AdminController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
  /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        $this->layout = 'adminLayout';

        return $this->render('calendar', [
            'model' => $model,
        ]);
        
    }    
    
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionDashboard()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'adminLayout';

        return $this->render('dashboard');
    }

    public function actionWebsite()
    {
        $this->layout = 'adminLayout';

        return $this->render('website');
    }


    public function actionFoods()
    {
        $this->layout = 'adminLayout';

        return $this->render('foods');
    }

    public function actionRecipes()
    {
        $this->layout = 'adminLayout';

        return $this->render('recipes');
    }

    public function actionQuestionList()
    {
        $this->layout = 'adminLayout';

        return $this->render('question-list');
    }

    public function actionPricing()
    {
        $this->layout = 'publicLayout';

        return $this->render('pricing');
    }

    public function actionTrainingList()
    {
        $this->layout = 'adminLayout';

        return $this->render('training-list');
    }

    

    public function actionNotifications()
    {
        $this->layout = 'adminLayout';

        return $this->render('notifications');
    }

    public function actionNotificationsList()
    {
        $this->layout = 'adminLayout';

        return $this->render('notifications-list');
    }

    public function actionFaqs()
    {
        $this->layout = 'adminLayout';

        return $this->render('faqs');
    }

    public function actionSetForms()
    {
        $this->layout = 'adminLayout';
        return $this->render('set-forms');
    }


    public function actionCreateTask()
    {
        $this->layout = 'adminLayout';
        return $this->render('set-forms');
    }

    public function actionSettings()
    {
        $this->layout = 'adminLayout';

        return $this->render('settings');
    }

    public function actionTodolist()
    {
        $this->layout = 'adminLayout';

        return $this->render('todolist');
    }

    public function actionSchedule()
    {
        $this->layout = 'adminLayout';

        return $this->render('schedule');
    }

  
    public function actionProfile()
    {
        $this->layout = 'adminLayout';

        return $this->render('profile');
    }

    public function actionClients()
    {
        $this->layout = 'adminLayout';
        
        return $this->render('clients-list');
    }

    
    public function actionCalendar()
    {
        $this->layout = 'adminLayout';
        
        return $this->render('calendar');
    }


    public function actionMachines()
    {
        $this->layout = 'adminLayout';
        
        return $this->render('machines');
    }


    public function actionGoals()
    {
        $this->layout = 'adminLayout';
        
        return $this->render('goals');
    } 
    
    public function actionWebadmin()
    {
        $this->layout = 'adminLayout';
        
        return $this->render('website');
    }
 
    public function actionNewClient()
    {
        $this->layout = 'adminLayout';
        
        return $this->render('new-client');
    }

}
