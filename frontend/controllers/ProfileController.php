<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\Helpers\Helpers;
use common\models\User;
use Yii;
use yii\db\Query;

//Yii::$app->language = 'en-EN';

class ProfileController extends Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {    
            return $this->goHome();
        }       

        $this->layout = 'adminLayout';  
        
        $model = $this->findModel(Yii::$app->user->identity->id);

        Helpers::defaultSheddulle($model);

        $weekDays = array('monday', 'tuesday', 'wednesday','thursday','friday', 'saturday','sunday');

        $arrShedulle = (empty($model->sheddule_array) ? [] : json_decode($model->sheddule_array));

        foreach($arrShedulle as $dayWeek => $arrValues){

            $sh = $dayWeek.'_starting_hour';
            $eh = $dayWeek.'_end_hour';
            $bs = $dayWeek.'_starting_break';
            $be = $dayWeek.'_end_break';
            $oc = $dayWeek.'_open_checkbox';          

            $model->$sh = strtotime($arrValues->start);
            $model->$eh = strtotime($arrValues->end);
            $model->$bs = strtotime($arrValues->break_start);
            $model->$be = strtotime($arrValues->break_end);
            $model->$oc = ($arrValues->closed == 'false') ? '1' : '0';
   
        }

        if ($this->request->isPost && $model->load($this->request->post())) {  
                        
            $arrWeek = [];
        
            $str = '';

            foreach($weekDays as $value){

                $sh = $value.'_starting_hour';
                $eh = $value.'_end_hour';
                $bs = $value.'_starting_break';
                $be = $value.'_end_break';
                $oc = $value.'_open_checkbox';
           
                $arrWeek[$value] = [
                    'start' => (empty($model->$sh) ? '' : date('H:i', $model->$sh)),
                    'end' => (empty($model->$eh) ? '' : date('H:i', $model->$eh)),
                    'break_start' => (empty($model->$bs) ? '' : date('H:i', $model->$bs)),
                    'break_end' => (empty($model->$be) ? '' : date('H:i', $model->$be)), 
                    'closed' => ($model->$oc == '0') ? 'true' : 'false',                      
                ];               
            }

            $model->sheddule_array = json_encode($arrWeek);
     
            if($model->save()){
                //$model->updateTeam('team', $model);
                GeneratorJson::updateTablesGeneric('translations');  
                GeneratorJson::updateTranslationsGeneric('translations'); 
                return $this->redirect(['view', 'id' => $model->id]);
            }
 
        }
   
        $serviceTimeMin = (empty($model->time_window) ? '60' : $model->time_window);


        return $this->render('/profile/index', [
            'model' => $model,
            'weekDays' => $weekDays,
            'serviceTimeMin' => $serviceTimeMin
        ]);   


    }

    /**
     * Finds the Team model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Team the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



}
