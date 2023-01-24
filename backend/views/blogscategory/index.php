<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\BlogsCategory;

/* @var $this yii\web\View */
/* @var $searchModel app\Models\BlogsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Blog Category';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blogs-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Blog Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
     
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'tag', 
            'page_code',  
            'tag_parent_id',
            'description',
            'created_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, BlogsCategory $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
