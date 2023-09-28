<?php

use common\models\Newsletter;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;


/** @var yii\web\View $this */
/** @var app\models\EmailSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Emails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-index">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18 pb-4 pt-4">
                    <?= Html::encode(Yii::t('app', 'menu_admin_campaign_newsletter')) ?>
                </h4>  
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">
                                <?= Yii::t('app', 'menu_admin_campaign') ?> 
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                        <?= Yii::t('app', 'menu_admin_campaign_newsletter') ?> 
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>      
    <p>
        <?= Html::a(Yii::t('app', 'create_newsletter_button'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [     
                'label' => Yii::t('app', 'company_code') ,                        
                'value' => function (Newsletter $model) {
                    return $model->company_code;
                },
            ], 
            [     
                'label' => Yii::t('app', 'username') ,                        
                'value' => function (Newsletter $model) {
                    return $model->username;
                },
            ], 
            [     
                'label' => Yii::t('app', 'subject') ,                        
                'value' => function (Newsletter $model) {
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
                'urlCreator' => function ($action, Email $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
