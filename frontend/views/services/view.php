<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Services $model */

\yii\web\YiiAsset::register($this);

?>
<div class="services-view">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18 pb-4 pt-4">
                    <?= Html::encode(Yii::t('app', 'edit_button')) ?> : <?=  $model->title ?>
                </h4>  
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">
                                <?= Yii::t('app', 'menu_admin_services') ?> 
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <?= Yii::t('app', 'edit_button') ?>:  <?=  $model->title ?>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <p>
        <?= Html::a(Yii::t('app', 'create_button'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'edit_button'), ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
        <?= Html::a(Yii::t('app', 'delete_button'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
           <?= Html::a(Yii::t('app', 'back_button'), ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'location_code',
            'username',
            'service_code',
            'category_code',     
            'title',
            'text:ntext',
            'subtitle:ntext',
            'title_pt',
            'text_pt:ntext',
            'title_en',
            'text_en:ntext',
            'price',
            'price_range',
            'order',
            'active',
            'created_date',
        ],
    ]) ?>

</div>
