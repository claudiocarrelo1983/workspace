<?php

use common\models\Team;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;


/** @var yii\web\View $this */
/** @var app\models\TeamSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Teams';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Team', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,       
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'full_name',
            'image',
            'location',
            //'title',
            //'text',
            //'title_pt',
            //'text_pt',
            //'title_es',
            //'text_es',
            //'title_en',
            //'text_en',
            //'title_it',
            //'text_it',
            //'title_fr',
            //'text_fr',
            //'title_de',
            //'text_de',
            //'website',
            //'facebook',
            //'pinterest',
            //'instagram',
            //'twitter',
            //'tiktok',
            //'linkedin',
            //'youtube',
            //'contact_number',
            //'active',
            //'created_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Team $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
