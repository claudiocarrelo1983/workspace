<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Faqs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FaqsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Faqs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faqs-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Faqs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=  $this->render('_search', ['model' => $searchModel]); ?>
    git update-index --assume-unchanged <file    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,  
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'page_code_question',
            'page_code_answer',
            'question',
            'answer:ntext',
            'question_pt',
            'answer_pt:ntext',
            //'question_en',
            //'answer_en:ntext',
            //'question_es',
            //'answer_es:ntext',
            //'question_it',
            //'answer_it:ntext',
            //'question_de',
            //'answer_de:ntext',
            //'question_fr',
            //'answer_fr:ntext',
            //'order',
            //'created_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Faqs $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
