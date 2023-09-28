<?php

use common\models\Subjects;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\Url;


?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18 pb-4 pt-3">
                <?= Html::encode(Yii::t('app', 'menu_admin_messages')) ?>
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
            <p>
                <?= Html::a(
                        Yii::t('app', 'create_notification_subject'),
                        ['create'], 
                        ['class' => 'btn btn-success']
                     ) 
                ?>
            </p>
                
            <?= $this->render('_search', ['model' => $searchModel]); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],                                                       
                        [     
                            'label' => Yii::t('app', 'subject') ,                        
                            'value' => function (Subjects $model) {
                                return $model->subject;
                            },
                        ], 
                        [     
                            'label' => Yii::t('app', 'text_pt') ,                        
                            'value' => function (Subjects $model) {
                                return $model->text_pt;
                            },
                        ], 
                        [     
                            'label' => Yii::t('app', 'text_en') ,                        
                            'value' => function (Subjects $model) {
                                return $model->text_en;
                            },
                        ],                                             
                        [     
                            'label' => Yii::t('app', 'active') ,                        
                            'value' => function (Subjects $model) {
                                return $model->active;
                            },
                        ], 
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, Subjects $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id' => $model->id]);
                            }
                        ],            
                 
                                                
                    ],
                ]); ?>
        </div>        
    </div>
</div>







