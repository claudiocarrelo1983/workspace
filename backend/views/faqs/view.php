<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Faqs */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Faqs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="faqs-view">

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
        <?= Html::a('Create Faq´s', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'page_code_question',
            'page_code_answer',
            'question',
            'answer:ntext',
            'question_pt',
            'answer_pt:ntext',
            'question_en',
            'answer_en:ntext',
            'question_es',
            'answer_es:ntext',
            'question_it',
            'answer_it:ntext',
            'question_de',
            'answer_de:ntext',
            'question_fr',
            'answer_fr:ntext',
            'order',
            'created_date',
        ],
    ]) ?>

</div>
