<?php

use common\models\Tickets;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;



/** @var yii\web\View $this */
/** @var app\Models\ClientsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Notifications List';
$this->params['breadcrumbs'][] = $this->title;


?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18 pb-4">
                <?= Html::encode($this->title) ?>
            </h4>  
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript: void(0);">
                            Notifications 
                        </a>
                    </li>
                    <li class="breadcrumb-item active"><?= $this->title ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="clients-index">              
                    <div>
              
                    <?= $this->render('_search', ['model' => $searchModel]); ?>

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            //'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],                               
                                'full_name',           
                                'text',
                                'contact_number',
                                'email',                 
                                [
                                    'class' => ActionColumn::className(),
                                    'urlCreator' => function ($action, Tickets $model, $key, $index, $column) {
                                        return Url::toRoute([$action, 'id' => $model->id]);
                                    }
                                ],
                                [                              
                                    'format' => 'raw',
                                    'value' => function (Tickets $model) {
                                        return Html::a(
                                            Html::encode("View"),
                                            [
                                                '/notifications-list/reply',
                                                'id' => $model->id
                                             ]
                                            );
                                    },
                                 ]
                                                        
                            ],
                        ]); ?>
                </div>
            </div>
        </div>  
    </div>
</div>







