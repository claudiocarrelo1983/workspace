<?php

use app\models\RecipesSteps;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\Models\RecipesStep $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Recipes Steps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipes-steps-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Recipes Steps', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'recipe_code',
            'recipe_step_text:ntext',
            'recipe_step_text_pt:ntext',
            'recipe_step_text_es:ntext',
            //'recipe_step_text_en:ntext',
            //'recipe_step_text_it:ntext',
            //'recipe_step_text_fr:ntext',
            //'recipe_step_text_de:ntext',
            //'order',
            //'created_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RecipesSteps $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
