<?php

use common\models\Events;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\EventsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Events', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'company_code',
            'event_code',
            'company_code_location',
            //'template_code',
            //'path',
            //'image',
            //'title',
            //'page_code_title',
            //'page_code_text',
            //'title_pt',
            //'text_pt:ntext',
            //'title_en',
            //'text_en:ntext',
            //'frequency',
            //'start_day',
            //'end_day',
            //'start_hour',
            //'end_hour',
            //'number_or_hours',
            //'cost',
            //'max_num_people',
            //'url:url',
            //'login_required',
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
