<?php

use app\models\Events;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\EventsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-index">

    <?= Helpers::displayAminBreadcrumbs('events', 'events-list') ?>

    <p>
        <?= Html::a(Yii::t('app', 'create_events_button'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'company_code',
            'event_code',
            'page_code',
            //'title',
            //'title_pt',
            //'title_en',
            //'color_code',
            //'frequency',
            //'start',
            //'end',
            //'allDay',
            //'url:url',
            //'className',
            //'active',
            //'created_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Events $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
