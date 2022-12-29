<?php

use app\models\RecipesFood;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\RecipesFoodSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Recipes Foods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipes-food-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Recipes Food', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'recipe_code',
            'recipe_food_name',
            'measure',
            'quantity',
            //'calories',
            //'lipids',
            //'colesterol',
            //'sodium',
            //'fibers',
            //'sugar',
            //'fat',
            //'carbs',
            //'protein',
            //'recipe_food_pt',
            //'recipe_food_es',
            //'recipe_food_en',
            //'recipe_food_it',
            //'recipe_food_fr',
            //'recipe_food_de',
            //'active',
            //'created_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RecipesFood $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
