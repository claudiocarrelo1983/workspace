<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Texts */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="texts-view">

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
        <?= Html::a('Create Texts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            'page_code_title',
            'page_code_text',
            'title',
            'text:ntext',
            'title_pt',
            'text_pt:ntext',
            'title_en',
            'text_en:ntext',
            'title_es',
            'text_es:ntext',
            'title_it',
            'text_it:ntext',
            'title_fr',
            'text_fr:ntext',
            'title_de',
            'text_de:ntext',
            'created_date',
        ],
    ]) ?>

</div>
