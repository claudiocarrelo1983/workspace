<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Blogs $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Blogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="blogs-view">

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
            'page_code_title',
            'page_code_subtitle',
            'page_code_text',
            'image',
            'image_instagram',
            'title',
            'alt',
            'text:ntext',
            'tags',
            'subtitle',
            'title_pt',
            'title_es',
            'title_en',
            'title_it',
            'title_fr',
            'title_de',
            'text_pt',
            'text_es',
            'text_en',
            'text_it',
            'text_fr',
            'text_de',
            'subtitle_pt',
            'subtitle_es',
            'subtitle_en',
            'subtitle_it',
            'subtitle_fr',
            'subtitle_de',
            'username',
            'active',
            'created_date',
        ],
    ]) ?>

</div>
