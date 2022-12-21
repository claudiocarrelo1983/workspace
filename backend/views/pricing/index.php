<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Pricing;

/* @var $this yii\web\View */
/* @var $searchModel app\Models\PricingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pricings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pricing-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pricing', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'coin',
            'key',
            'standard',
            'professional',
            'enterprise',
            'created_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pricing $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
