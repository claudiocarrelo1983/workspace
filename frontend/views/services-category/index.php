<?php

use common\models\ServicesCategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ServicesCategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Services Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-category-index">

    <h4 class="mb-sm-0 font-size-18 pb-4">
        <?= Html::encode($this->title) ?>
    </h4>
    <p>
        <?= Html::a('Create Services Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],       

            'category_code',   
            'title',
            'active',
            //'title_pt',
            //'title_en',
            //'order',
            //'active',
            //'created_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ServicesCategory $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
