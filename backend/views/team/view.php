<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Team $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="team-view">

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
            'full_name',
            'image',
            'location',
            'title',
            'text',
            'title_pt',
            'text_pt',
            'title_es',
            'text_es',
            'title_en',
            'text_en',
            'title_it',
            'text_it',
            'title_fr',
            'text_fr',
            'title_de',
            'text_de',
            'website',
            'facebook',
            'pinterest',
            'instagram',
            'twitter',
            'tiktok',
            'linkedin',
            'youtube',
            'contact_number',
            'active',
            'created_date',
        ],
    ]) ?>

</div>
