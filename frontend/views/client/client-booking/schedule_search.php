
<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\date\DatePicker;


$day = date('Y-m-d', ($day));

$oneLessDay = strtotime(date('Y-m-d', strtotime($day. '-1 day')));
$oneMoreDay = strtotime(date('Y-m-d', strtotime($day. '+1 day')));


?>

<div class="col-lg-12 text-center py-2 ">   

    <?php
        ActiveForm::begin(); 

        $layoutMobile = '';       
    
        $layoutMobile .= '<span class="input-group-text text-5">';

        if(strtotime($day) == strtotime(date('Y-m-d'))){  
            $layoutMobile .='<i class="	fas fa-angle-double-left"></i>';
        }else{
            $layoutMobile .= Html::a(
                                '<i class="	fas fa-angle-double-left"></i>',                                             
                                Url::toRoute([
                                    '/choose-schedule',
                                    'code' => Yii::$app->request->get('code'),
                                    'location' => Yii::$app->request->get('location'),
                                    'team' => Yii::$app->request->get('team'),
                                    'service' => Yii::$app->request->get('service'),
                                    'schedule' => Yii::$app->request->get('schedule'),
                                    'day' => $oneLessDay,
                                    'time' => '*',
                                ]
                            ),
                            [                                                       
                                'class' => 'text-color-dark font-weight-bold text-color-hover-dark text-decoration-none'
                            ]
                        );
        }

        $layoutMobile .= '</span>';
     
        $layoutMobile .= '{picker}{input}';
 
        $layoutMobile .= '<span class="input-group-text text-5">';
    
        $layoutMobile .= Html::a(
                            '<i class="	fas fa-angle-double-right"></i>',                                             
                            Url::toRoute([
                                '/choose-schedule',
                                'code' => Yii::$app->request->get('code'),
                                'location' => Yii::$app->request->get('location'),
                                'team' => Yii::$app->request->get('team'),
                                'service' => Yii::$app->request->get('service'),
                                'schedule' => Yii::$app->request->get('schedule'),                                         
                                'day' => $oneMoreDay,
                                'time' => '*',
                            ]
                        ),
                        [                                                       
                            'class' => 'text-color-dark font-weight-bold text-color-hover-dark text-decoration-none'
                        ]
                    );
        $layoutMobile .= '</span>';   






        $layoutDesktop = '';

        $layoutDesktop .= '<span class="input-group-text text-5">';

        
        if(strtotime($day) == strtotime(date('Y-m-d'))){  
            $layoutDesktop .='<i class="	fas fa-angle-double-left"></i>';
        }else{
            $layoutDesktop .= Html::a(
                                '<i class="	fas fa-angle-double-left"></i>',                                             
                                Url::toRoute([
                                    '/choose-schedule',
                                    'code' => Yii::$app->request->get('code'),
                                    'location' => Yii::$app->request->get('location'),
                                    'team' => Yii::$app->request->get('team'),
                                    'service' => Yii::$app->request->get('service'),
                                    'schedule' => Yii::$app->request->get('schedule'),
                                    'day' => $oneLessDay,
                                    'time' => '*',
                                ]
                            ),
                            [                                                       
                                'class' => 'text-color-dark font-weight-bold text-color-hover-dark text-decoration-none'
                            ]
                        );
        }

        $layoutDesktop .= '</span>';
  
        $layoutDesktop .= '{picker}{remove}{input}';
        
        $layoutDesktop .= '<span class="input-group-text">';

        $layoutDesktop .= Html::a(
                        '<div>Today</div>',                                            
                        Url::toRoute([
                            '/choose-schedule',
                            'code' => Yii::$app->request->get('code'),
                            'location' => Yii::$app->request->get('location'),
                            'team' => Yii::$app->request->get('team'),
                            'service' => Yii::$app->request->get('service'),
                            'schedule' => Yii::$app->request->get('schedule'),
                            'day' => strtotime(date("Y-m-d")),
                            'time' => '*',
                        ]
                    ),
                    [                                                       
                        'class' => 'text-color-dark font-weight-bold text-color-hover-dark text-decoration-none'
                    ]
                );
        $layoutDesktop .= '</span>';
         
        $layoutDesktop .= '<span class="input-group-text text-5">';
    
        $layoutDesktop .= Html::a(
                            '<i class="	fas fa-angle-double-right"></i>',                                             
                            Url::toRoute([
                                '/choose-schedule',
                                'code' => Yii::$app->request->get('code'),
                                'location' => Yii::$app->request->get('location'),
                                'team' => Yii::$app->request->get('team'),
                                'service' => Yii::$app->request->get('service'),
                                'schedule' => Yii::$app->request->get('schedule'),                                         
                                'day' => $oneMoreDay,
                                'time' => '*',
                            ]
                        ),
                        [                                                       
                            'class' => 'text-color-dark font-weight-bold text-color-hover-dark text-decoration-none'
                        ]
                    );
                    
        $layoutDesktop .= '</span>';  
     
        ?>

        <span class="d-md-none">
            <?= DatePicker::widget([
                    'model' => $model,                                                                                                      
                    'name' => 'date',    
                    'id' => 'date-calendar-search1', 
                    'size' => 'lg',
                    //'removeButton' => false,
                    'layout' => $layoutMobile, 
                    'value' => date('d-m-Y', strtotime($day)),
                    'options' => [
                        'placeholder' => 'Select date...',
                        'class' => ' form-control text-4 h-auto py-1 ',
                        'onchange' => 'this.form.submit()'
                    ],
                    'pluginOptions' => [  
                        'autoclose' => true,           
                        'format' => 'dd-mm-yyyy',
                        'todayHighlight' => true,
                
                    ]                   
                ]);                         
            ?> 
        </span>


     
        <span class="d-none d-sm-none d-md-block">
            <?= DatePicker::widget([
                    'model' => $model,                                                                                                      
                    'name' => 'date',    
                    'id' => 'date-calendar-search2', 
                    'size' => 'lg',
                    //'removeButton' => false,
                    'layout' => $layoutDesktop, 
                    'value' => date('d-m-Y', strtotime($day)),
                    'options' => [
                        'placeholder' => 'Select date...',
                        'class' => ' form-control text-4 h-auto py-1 ',
                        'onchange' => 'this.form.submit()'
                    ],
                    'pluginOptions' => [  
                        'autoclose' => true,           
                        'format' => 'dd-mm-yyyy',
                        'todayHighlight' => true,
                
                    ]                   
                ]);                         
            ?> 
        </span>

    <?php ActiveForm::end(); ?>                             
</div>