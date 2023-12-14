<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Events $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="events-view">

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
            'username',
            'company_code',
            'event_code',
            'company_code_location',
            'template_code',
            'path',
            'image',
            'title',
            'page_code_title',
            'page_code_text',
            'title_pt',
            'text_pt:ntext',
            'title_en',
            'text_en:ntext',
            'frequency',
            'start_day',
            'end_day',
            'start_hour',
            'end_hour',
            'number_or_hours',
            'cost',
            'max_num_people',
            'url:url',
            'login_required',
            'active',
            'created_date',
        ],
    ]) ?>

</div>
