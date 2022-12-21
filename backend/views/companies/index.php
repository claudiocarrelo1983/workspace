<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Companies;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompaniesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companies-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Companies', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,       
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'first_name',
            'last_name',
            'full_name',
            'gender',
            //'title',
            //'foto',
            //'nif',
            //'email:email',
            //'contact_number',
            //'dob',
            //'logo',
            //'team_code',
            //'team_name',
            //'summary',
            //'description:ntext',
            //'role',
            //'level',
            //'sublevel',
            //'address',
            //'postcode',
            //'location',
            //'country',
            //'language',
            //'website',
            //'facebook',
            //'pinterest',
            //'instagram',
            //'twitter',
            //'tiktok',
            //'linkedin',
            //'youtube',
            //'gdpr',
            //'terms_and_conditions',
            //'newsletter',
            //'active',
            //'order',
            //'created_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Companies $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
