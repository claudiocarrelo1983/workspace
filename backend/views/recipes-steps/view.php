<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\RecipesSteps $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Recipes Steps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="recipes-steps-view">

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
            'recipe_step_text:ntext',
            'recipe_step_text_pt:ntext',
            'recipe_step_text_es:ntext',
            'recipe_step_text_en:ntext',
            'recipe_step_text_it:ntext',
            'recipe_step_text_fr:ntext',
            'recipe_step_text_de:ntext',
            'order',
            'created_date',
        ],
    ]) ?>

</div>
