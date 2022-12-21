<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\PricingSpecs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PricingSpecsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pricing Specs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pricing-specs-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pricing Specs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type',
            'page_code',
            'description',
            //'text_pt',
            //'text_es',
            //'text_en',
            //'text_it',
            //'text_fr',
            //'text_de',
            //'active',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PricingSpecs $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
