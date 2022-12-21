<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\Models\TrainingPlansSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Training Plans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-plans-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Training Plans', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'training_code',
            'title',
            'text:ntext',
            //'created_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TrainingPlans $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
