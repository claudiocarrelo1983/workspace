<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\NutricionFood */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Nutricion Foods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nutricion-food-view">

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
            'name',
            'nutricion_code',
            'description',
            'nutricion_pt',
            'nutricion_es',
            'nutricion_en',
            'nutricion_it',
            'nutricion_fr',
            'nutricion_de',
            'group',
            'calories',
            'energy',
            'fat',
            'protein',
            'carbs',
            'lipids_saturated',
            'lipids_unsaturated',
            'lipids_monoglycerides',
            'sugars',
            'fibers',
            'sodium',
            'calcium',
            'iron',
            'colesterol',
            'created_date',
        ],
    ]) ?>

</div>
