<?php

use app\models\Messages;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\MessagesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Messages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="messages-index">

    <?= Helpers::displayAminBreadcrumbs('messages-template') ?>

    <p>
        <?= Html::a('Create Messages', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'company_code',
            'template_code',
            'company_code_location_array',
            'genders',
            //'title',
            //'title_pt',
            //'text_pt:ntext',
            //'title_en',
            //'text_en:ntext',
            //'type',
            //'from_schedule_date',
            //'to_schedule_date',
            //'schedule_hour',
            //'reminder_number',
            //'reminder_hours_days',
            //'language',
            //'stage',
            //'send',
            //'error',
            //'active',
            //'created_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Messages $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
