<?php

use common\models\Services;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ServicesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Services';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-index">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18 pb-4">
                    <?= Html::encode(Yii::t('app', 'menu_admin_services')) ?>
                </h4>  
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">
                                <?= Yii::t('app', 'menu_admin_services') ?> 
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <?= Yii::t('app', 'menu_admin_services_list') ?>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <p>
        <?= Html::a(Yii::t('app', 'create_services_button'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [     
                'label' => Yii::t('app', 'id') ,                        
                'value' => function (Services $model) {
                    return $model->id;
                },
            ],
            [     
                'label' => Yii::t('app', 'company_code') ,                        
                'value' => function (Services $model) {
                    return $model->company_code;
                },
            ], 
            [     
                'label' => Yii::t('app', 'username') ,                        
                'value' => function (Services $model) {
                    return $model->username;
                },
            ], 
            [     
                'label' => Yii::t('app', 'service_code') ,                        
                'value' => function (Services $model) {
                    return $model->service_code;
                },
            ], 
            [     
                'label' => Yii::t('app', 'order') ,                        
                'value' => function (Services $model) {
                    return $model->order;
                },
            ], 
            [     
                'label' => Yii::t('app', 'active') ,                        
                'value' => function (Services $model) {
                    return $model->active;
                },
            ],     
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Services $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
