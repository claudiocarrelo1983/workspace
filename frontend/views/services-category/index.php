<?php

use common\models\ServicesCategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\ServicesCategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Services Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-category-index">

    <?= Helpers::displayAminBreadcrumbs('services','services-category','services-category') ?>

    <!-- start page title -->
    <p>
        <?= Html::a(Yii::t('app', 'create_services_category_button'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],      
            [     
                'label' => Yii::t('app', 'id') ,                        
                'value' => function (ServicesCategory $model) {
                    return $model->id;
                },
            ],
            [     
                'label' => Yii::t('app', 'description') ,                        
                'value' => function (ServicesCategory $model) {
                    return $model->title;
                },
            ],
            [     
                'label' => Yii::t('app', 'title_pt') ,                        
                'value' => function (ServicesCategory $model) {
                    return $model->title_pt;
                },
            ],
            [     
                'label' => Yii::t('app', 'title_en') ,                        
                'value' => function (ServicesCategory $model) {
                    return $model->title_en;
                },
            ],      
            [     
                'label' => Yii::t('app', 'order') ,                        
                'value' => function (ServicesCategory $model) {
                    return $model->order;
                },
            ],    
            [     
                'label' => Yii::t('app', 'active') ,                        
                'value' => function (ServicesCategory $model) {
                    return $model->active;
                },
            ], 
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ServicesCategory $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
