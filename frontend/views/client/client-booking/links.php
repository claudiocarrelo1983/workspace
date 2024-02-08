<?php

use yii\helpers\Html;
use yii\helpers\Url;


?>

<div class="row pt-5">
    <div class="col-4 mb-2 pr-3">
        <?= 
            Html::a(
                    Yii::t('app', 'booking_new_appointment'),                                             
                    Url::toRoute([
                        '/choose-location',
                        'code' => Yii::$app->request->get('code'),
                        'location' => '*',
                        'team' => '*',
                        'service' => '*',           
                        'day' => '*',
                        'time' => '*'
                    ]
                ),
                [                                                       
                    'data-hash' => '',
                    'data-hash-offset' => 0,
                    'data-hash-offset-lg' => 130,
                    'class' => 'btn btn-default  w-100 text-2'
                ]
            ) 
        ?>
    </div>
    <div class="col-4 mb-2 pl-3">
        <?= Html::a(
            Yii::t('app', 'scheduling_history'),                                           
            Url::toRoute(
                [
                    '/client-appointments/index',
                    'code' => Yii::$app->request->get('code')
                ]
            ),

            [                                                       
                'data-hash' => '',
                'data-hash-offset' => 0,
                'data-hash-offset-lg' => 130,
                'class' => 'btn btn-default  w-100 text-2'
            ]
        ) ?>
    </div>

    <div class="col-4 mb-2 pl-3">
        <?= Html::a(
            Yii::t('app', 'profile'),                                           
            Url::toRoute([
                '/client-profile',
                'code' => Yii::$app->request->get('code')
            ]
            
            ),
            [                                                       
                'data-hash' => '',
                'data-hash-offset' => 0,
                'data-hash-offset-lg' => 130,
                'class' => 'btn btn-default  w-100 text-2'
            ]
        ) ?>          

    </div>
</div> 
      

