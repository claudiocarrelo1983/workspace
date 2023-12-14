<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\Events $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="events-view">

    <?= Helpers::displayAminBreadcrumbs('events', 'events-list', 'view') ?>

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
            'username',
            'company_code',
            'event_code',
            'page_code',
            'title',
            'title_pt',
            'title_en',
            'color_code',
            'frequency',
            'start',
            'end',
            'allDay',
            'url:url',
            'className',
            'active',
            'created_date',
        ],
    ]) ?>

</div>
