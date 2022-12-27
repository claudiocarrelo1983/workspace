<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecipesFoodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

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
            'name',
            'measure',
            'calories',
            //'lipids',
            //'colesterol',
            //'sodium',
            //'carbs',
            //'fibers',
            //'sugar',
            //'protein',
            //'nutricion_pt',
            //'nutricion_es',
            //'nutricion_en',
            //'nutricion_it',
            //'nutricion_fr',
            //'nutricion_de',
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
