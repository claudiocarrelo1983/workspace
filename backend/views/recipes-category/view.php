<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\RecipesCategory $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Recipes Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="recipes-category-view">

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
         <?= Html::a('Create Recipes Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'recipes_parent_id',
            'page_code',
            'recipe_cat_code',
            'description',
            'recipe_pt',
            'recipe_es',
            'recipe_en',
            'recipe_it',
            'recipe_fr',
            'recipe_de',
            'active',
            'created_date',
        ],
    ]) ?>

</div>
