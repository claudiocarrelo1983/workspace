<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\ServicesCategory;


/** @var yii\web\View $this */
/** @var app\models\ServicesCategory $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Services Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
//\yii\web\YiiAsset::register($this);
?>
<div class="services-category-view">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18 pb-4 pt-4">
                    <?= Html::encode(Yii::t('app', 'menu_admin_services_category_update')) ?>
                </h4>  
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">
                                <?= Yii::t('app', 'menu_admin_services_category') ?> 
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <?= Yii::t('app', 'menu_admin_services_category_update') ?> 
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div> 

    <p>
        <?= Html::a(Yii::t('app', 'edit_button'), ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'delete_button'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) 
        ?>
        <?= Html::a(Yii::t('app', 'back_button'), ['index'], ['class' => 'btn btn-primary']) ?>
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
