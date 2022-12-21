<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrainingValuesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Training Values';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-values-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Training Values', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'id_treino',
            'week',
            'reps',
            //'type',
            //'value',
            //'created_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TrainingValues $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
