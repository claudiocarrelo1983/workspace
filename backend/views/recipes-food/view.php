<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\RecipesFood $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Recipes Foods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="recipes-food-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'recipe_code',
            'recipe_food_name',
            'measure',
            'quantity',
            'calories',
            'lipids',
            'colesterol',
            'sodium',
            'fibers',
            'sugar',
            'fat',
            'carbs',
            'protein',
            'recipe_food_pt',
            'recipe_food_es',
            'recipe_food_en',
            'recipe_food_it',
            'recipe_food_fr',
            'recipe_food_de',
            'active',
            'created_date',
        ],
    ]) ?>

</div>
