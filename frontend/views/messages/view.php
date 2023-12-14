<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\Messages $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="messages-view">

    <?= Helpers::displayAminBreadcrumbs('messages-template', 'view') ?>

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
            'company_code',
            'template_code',
            'company_code_location_array',
            'genders',
            'title',
            'title_pt',
            'text_pt:ntext',
            'title_en',
            'text_en:ntext',
            'type',
            'from_schedule_date',
            'to_schedule_date',
            'schedule_hour',
            'reminder_number',
            'reminder_hours_days',
            'language',
            'stage',
            'send',
            'error',
            'active',
            'created_date',
        ],
    ]) ?>

</div>
