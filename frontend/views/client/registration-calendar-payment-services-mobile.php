<?php

/*
require __DIR__ . '/../../web/ajax/loadCalendar.ajax.php';

die('___');


use yii\db\Query;

$query = new Query;
$eventsArr = $query->select('*')
    ->from(['calendar'])
    ->where(['username' => Yii::$app->user->identity->username]) 
    ->all();


*/


//use talma\widgets\FullCalendar;

/* @var $this yii\web\View */


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use edofre\fullcalendar\Fullcalendar;
use yii\web\JsExpression;
use yii\helpers\Url;
use kartik\date\DatePicker;

use yii\db\Query;

$query = new Query;

$teamArr = $query->select('*')
            ->from(['team'])
            ->where(
                [
                   'company_code' => Yii::$app->request->get('company'),
                   'active' => 1              
                ])         
            ->all();

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;


$servicesCatArr = $query->from(['sc' => 'services_category'])
        ->select([
            'sc.category_code',
            'page_code_sc_title'  => 'sc.page_code_title',
            'services_category_title' => 'sc.page_code_title',
            ])
        ->where(['sc.company' => Yii::$app->request->get('company')])
        ->orderBy(['sc.order'=>SORT_ASC])
        ->all();

?>

<?php


    $userShedduleArr = [];

    foreach($fullArrShdeddule as $username => $arrServices) {

        foreach($arrServices as $service => $availableSchedule) {
                
            foreach($availableSchedule as $key => $valuesDay) {
           
                foreach($valuesDay as $values){
                   
                    $hour = explode(':',$values);

                    if(isset($hour[0]) && $hour[0] <= 12){  
                        $userShedduleArr[$username][$service][$key]['morning'][] = $values;
                    }

                    if(isset($hour[0]) && $hour[0] >= 12 && $hour[0] <= 18 ){    
                        $userShedduleArr[$username][$service][$key]['afternoon'][] = $values;
                    }

                    if(isset($hour[0]) && $hour[0] >= 18 && $hour[0] <= 24){  
                        $userShedduleArr[$username][$service][$key]['night'][] = $values;
                    }            
                }
            }  
        }  
    }  

?>

<?php $tableOnlyOnFirst = ''; ?>

<?php 
    $currentDay = 0;
    $inc = 0;
 ?>

<?php foreach($userShedduleArr as $username => $valueHoursArr): ?> 

    <?php foreach($valueHoursArr as $services => $arrServices): ?> 
        
    <?php foreach($arrServices as $dayKey => $valuesDay): ?>  

            <div class="row" id="mobile-hours-<?=$services ?>-<?= $username ?>-<?= strtotime($dayKey) ?>"  style="display:none">
            <?php 
            $str = '';
                
                foreach($valuesDay as $keyDay => $values){                    

                $str .='<div class="col text-center display-values-for-desktop" >';
                $str .= '<h4>'.Yii::t('app', $keyDay).'</h4>';

                foreach($values as $hour)  {   

                    $str .= '<div>';

                        switch($keyDay){
                            case 'morning':                                
                                $str .= '<a href="#" class="btn btn-modern btn-lg btn-light rounded-0 mb-2 mt-2">'
                                    .$hour
                                    .'</a>';
                                break;
                            case 'afternoon':
                                $str .= '<a href="#" class="btn btn-modern btn-lg btn-light rounded-0 mb-2 mt-2">'
                                .$hour
                                .'</a>';
                                break;
                            case 'night':
                                $str .= '<a href="#" class="btn btn-modern btn-lg btn-light rounded-0 mb-2 mt-2">'
                                .$hour
                                .'</a>';
                                break;
                            default:
                                $str .= '';
                            break;
                        }

                    $str .= '</div>';
                }     

                $str .='</div>';
                } 

                echo $str;

            
            ?>                                               
        </div>       
        <?php $tableOnlyOnFirst = $username ?>   
        <?php endforeach; ?>    
    <?php endforeach; ?>    
<?php endforeach; ?> 
