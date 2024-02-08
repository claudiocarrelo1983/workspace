<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\Sheddule $model */


\yii\web\YiiAsset::register($this);
?>

<?= $this->render('@frontend/views/client/client-booking/header', ['headerTransparent' => 1, 'model' => $model, 'companyArr' => $companyArr]); ?>

<div id="examples" class="container  pb-5">
    <?= $this->render('@frontend/views/client/client-booking/links'); ?>   
</div>
<div class="container pb-5">
    <div class="row">
        <div class="col-12">
            <div class="clients-index">
                <h1>
                    <?= Yii::t('app', 'update').' : '.$model->id ?>                
                </h1>
                <p class="pb-5">              
                    <?=
                        Html::a(
                            Yii::t('app', 'edit_button'),                                           
                            Url::toRoute(
                                [
                                    '/client-appointments/update',                                                                 
                                    'id' => $model->id,
                                    'code' => Yii::$app->request->get('code')
                                ]
                            ),

                            [                                                      
                                'class' => 'btn btn-primary'
                            ]
                        )
                    ?>
                              <?=
                        Html::a(
                            Yii::t('app', 'back_button'),                                           
                            Url::toRoute(
                                [
                                    '/client-appointments/index',                                                                
                                    'code' => Yii::$app->request->get('code')
                                ]
                            ),

                            [                                                      
                                'class' => 'btn btn-outline-secondary'
                            ]
                        )
                    ?>

                
                </p>

                <?= DetailView::widget([
                    'model' => $model,
          
                    'attributes' => [
                        'id',
                        'booking_code',
                        'team_username',
                        'client_username',
                        'company_code',
                        'service_cat',
                        'service_name',
                        'available',
                        'full_name',
                        'contact_number',
                        'email:email',
                        'nif',
                        'date',
                        'time',
                        'created_date',
                    ],
                ]) ?>
            </div>
        </div>
    </div>

</div>
