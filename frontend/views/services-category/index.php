<?php

use common\models\ServicesCategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ServicesCategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Services Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-category-index">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18 pb-4 pt-4">
                    <?= Html::encode(Yii::t('app', 'menu_admin_services_category_create')) ?>
                </h4>  
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">
                                <?= Yii::t('app', 'menu_admin_services_category') ?> 
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <?= Yii::t('app', 'menu_admin_services_category_create') ?> 
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

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
