<?php

use app\models\Sheddule;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ShedduleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

?>
<div class="sheddule-index">   
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18 pb-4 pt-4">
                    <?= Html::encode(Yii::t('app', 'menu_admin_sheddule_list')) ?>
                </h4>  
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">
                                <?= Yii::t('app', 'menu_admin_sheddule') ?> 
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <?= Yii::t('app', 'menu_admin_sheddule_list') ?>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <p>
        <?= Html::a(
            Yii::t('app', 'create_sheddule_button'), 
            ['create'], 
            ['class' => 'btn btn-success']) 
        ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',        
            [     
                'label' => Yii::t('app', 'team_username') ,                        
                'value' => function (Sheddule $model) {
                    return $model->team_username;
                },
            ],  
            [     
                'label' => Yii::t('app', 'client_username') ,                        
                'value' => function (Sheddule $model) {
                    return $model->client_username;
                },
            ], 
            [     
                'label' => Yii::t('app', 'company_code') ,                        
                'value' => function (Sheddule $model) {
                    return $model->company_code;
                },
            ], 
            [     
                'label' => Yii::t('app', 'service_cat') ,                        
                'value' => function (Sheddule $model) {
                    return $model->service_cat;
                },
            ], 
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Sheddule $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
