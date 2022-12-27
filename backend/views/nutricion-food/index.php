<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\Models\NutricionFoodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nutricion Foods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nutricion-food-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Nutricion Food', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'nutricion_code',
            'description',
            'nutricion_pt',
            //'nutricion_es',
            //'nutricion_en',
            //'nutricion_it',
            //'nutricion_fr',
            //'nutricion_de',
            //'group',
            //'calories',
            //'energy',
            //'fat',
            //'protein',
            //'carbs',
            //'lipids_saturated',
            //'lipids_unsaturated',
            //'lipids_monoglycerides',
            //'sugars',
            //'fibers',
            //'sodium',
            //'calcium',
            //'iron',
            //'colesterol',
            //'created_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, NutricionFood $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
