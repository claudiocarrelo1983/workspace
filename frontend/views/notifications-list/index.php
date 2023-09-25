<?php

use common\models\Tickets;
use yii\helpers\Html;
use yii\grid\GridView;

?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18 pb-4 pt-4">
                <?= Html::encode(Yii::t('app', 'menu_admin_messages_list')) ?>
            </h4>  
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript: void(0);">
                            <?= Yii::t('app', 'menu_admin_messages') ?> 
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        <?= Yii::t('app', 'menu_admin_messages_list') ?> 
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="clients-index">              
            <div>
        
            <?= $this->render('_search', ['model' => $searchModel]); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],                                                       
                        [     
                            'label' => Yii::t('app', 'ticket_number') ,                        
                            'value' => function (Tickets $model) {
                                return $model->ticket_number;
                            },
                        ], 
                        [     
                            'label' => Yii::t('app', 'full_name') ,                        
                            'value' => function (Tickets $model) {
                                return $model->full_name;
                            },
                        ], 
                        [     
                            'label' => Yii::t('app', 'subject') ,                        
                            'value' => function (Tickets $model) {
                                return $model->subject;
                            },
                        ], 
                        [     
                            'label' => Yii::t('app', 'text') ,                        
                            'value' => function (Tickets $model) {
                                return $model->text;
                            },
                        ], 
                        [     
                            'label' => Yii::t('app', 'contact_number') ,                        
                            'value' => function (Tickets $model) {
                                return $model->contact_number;
                            },
                        ], 
                        [     
                            'label' => Yii::t('app', 'email'),                        
                            'value' => function (Tickets $model) {
                                return $model->email;
                            },
                        ],                               
                        [     
                            'label' => Yii::t('app', 'reply'),                         
                            'format' => 'raw',
                            'value' => function (Tickets $model) {
                                return $model->closed_ticket == 1 ? 
                                '<span class="btn btn-danger btn-sm btn-rounded">'.Yii::t('app', 'closed').'</span>' :  '<span class="btn btn-success btn-sm btn-rounded">'.Yii::t('app', 'open').'</span>';
                            },
                        ],                    
                        [                         
                            'format' => 'raw',
                            'value' => function (Tickets $model) {
                                return Html::a(
                                    Html::encode("View"),
                                    [
                                        '/notifications-list/reply',
                                        'id' => $model->id
                                    ],
                                    ['class'=>'btn btn-primary btn-sm btn-rounded waves-effect waves-light']
                                    );
                            },
                            ]
                                                
                    ],
                ]); ?>
        </div>        
    </div>
</div>







