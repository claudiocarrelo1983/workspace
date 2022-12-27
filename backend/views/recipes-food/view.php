<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RecipesFood */

$this->title = $model->name;
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
            'name',
            'measure',
            'calories',
            'lipids',
            'colesterol',
            'sodium',
            'carbs',
            'fibers',
            'sugar',
            'protein',
            'nutricion_pt',
            'nutricion_es',
            'nutricion_en',
            'nutricion_it',
            'nutricion_fr',
            'nutricion_de',
            'active',
            'created_date',
        ],
    ]) ?>

</div>
