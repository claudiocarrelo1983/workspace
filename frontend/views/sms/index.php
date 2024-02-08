<?php

use common\models\Sms;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\Helpers\Helpers;


/** @var yii\web\View $this */
/** @var app\models\EmailSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Emails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-index">
    <?= Helpers::displayAminBreadcrumbs('message', 'sms','message') ?> 


    <p>
        <?= Html::a(Yii::t('app', 'create_sms_button'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [     
                'label' => Yii::t('app', 'company_code') ,                        
                'value' => function (Sms $model) {
                    return $model->company_code;
                },
            ], 
            [     
                'label' => Yii::t('app', 'username') ,                        
                'value' => function (Sms $model) {
                    return $model->username;
                },
            ], 
            [     
                'label' => Yii::t('app', 'subject') ,                        
                'value' => function (Sms $model) {
                    return $model->subjects;
                },
            ], 
          
            //'text:ntext',
            //'users:ntext',
            //'language',
            //'send',
            //'error',
            //'created_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Sms $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
