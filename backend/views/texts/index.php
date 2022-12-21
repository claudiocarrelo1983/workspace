<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Texts;

/* @var $this yii\web\View */
/* @var $searchModel app\Models\TextsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Texts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="texts-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Texts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=  $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,  
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'code',
            'page_code_title',
            'page_code_text',
            'title',
            'text:ntext',
            'created_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Texts $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
