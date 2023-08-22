<?php

use yii\helpers\Html;
use yii\helpers\Url;


?>

    <div class="row pb-3">
        <div class="col-lg-4 mb-2 pr-3">
            <?= Html::a(
                Yii::t('app', 'Book a new Appointment'),                                             
                Url::toRoute([
                    '/client-booking',
                    'code' => Yii::$app->request->get('code')
                ]
                    ),
                [                                                       
                    'data-hash' => '',
                    'data-hash-offset' => 0,
                    'data-hash-offset-lg' => 130,
                    'class' => 'btn btn-modern btn-default  mb-2 mr-3 w-100 text-3'
                ]
            ) ?>
        </div>
        <div class="col-lg-4 mb-2 pl-3">
            <?= Html::a(
                Yii::t('app', 'View Appointments'),                                             
                Url::toRoute(
                    [
                        '/client-appointments',
                        'code' => Yii::$app->request->get('code')
                    ]
                ),

                [                                                       
                    'data-hash' => '',
                    'data-hash-offset' => 0,
                    'data-hash-offset-lg' => 130,
                    'class' => 'btn btn-modern btn-default  mb-2 mr-3 text-3 w-100'
                ]
            ) ?>
        </div>
 
        <div class="col-lg-4 mb-2 pl-3">
            <?= Html::a(
                Yii::t('app', 'My Profile'),                                             
                Url::toRoute([
                    '/client-profile',
                    'code' => Yii::$app->request->get('code')
                ]
             
                ),
                [                                                       
                    'data-hash' => '',
                    'data-hash-offset' => 0,
                    'data-hash-offset-lg' => 130,
                    'class' => 'btn btn-modern btn-default  mb-2 mr-3 text-3 w-100'
                ]
            ) ?>          

        </div>
    </div>    


