<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\ServicesCategory;
use common\Helpers\Helpers;


/** @var yii\web\View $this */
/** @var app\models\ServicesCategory $model */


?>
<div class="services-category-view">

    <?= Helpers::displayAminBreadcrumbs('services','services-category','services-category','view', $model->title) ?>

    <p>
        <?= Helpers::displayButtonsView($model); ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
                'label' => Yii::t('app', 'title_pt'),                        
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
                'label' => Yii::t('app', 'created_date') ,                        
                'value' => function (ServicesCategory $model) {
                    return $model->created_date;
                },
            ]   
        ],
    ]) ?>

</div>
