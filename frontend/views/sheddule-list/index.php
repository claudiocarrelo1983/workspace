<?php

use app\models\Sheddule;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\ShedduleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

?>
<div class="sheddule-index">   
    <!-- start page title -->
    <?= Helpers::displayAminBreadcrumbs('sheddule', 'sheddule-list', 'create') ?>
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
