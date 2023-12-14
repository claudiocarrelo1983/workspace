<?php

use common\models\MessagesTemplate;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\MessagesTemplateSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Messages Templates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="messages-template-index">

<?= Helpers::displayAminBreadcrumbs('message', 'message-templates') ?>

    <p>
        <?= Html::a(Yii::t('app', 'create_template'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],          
            [     
                'label' => Yii::t('app', 'description') ,                        
                'value' => function (MessagesTemplate $model) {
                    return $model->title;
                },
            ], 
            [     
                'label' => Yii::t('app', 'title_pt') ,                        
                'value' => function (MessagesTemplate $model) {
                    return $model->title_pt;
                },
            ], 
            [     
                'label' => Yii::t('app', 'title_pt') ,                        
                'value' => function (MessagesTemplate $model) {
                    return $model->title_pt;
                },
            ], 
            [     
                'label' => Yii::t('app', 'text_pt') ,                        
                'value' => function (MessagesTemplate $model) {
                    return $model->text_pt;
                },
            ], 
            [     
                'label' => Yii::t('app', 'title_en') ,                        
                'value' => function (MessagesTemplate $model) {
                    return $model->title_en;
                },
            ], 
            [     
                'label' => Yii::t('app', 'text_en') ,                        
                'value' => function (MessagesTemplate $model) {
                    return $model->text_en;
                },
            ],    
            [     
                'label' => Yii::t('app', 'created_date') ,                        
                'value' => function (MessagesTemplate $model) {
                    return $model->created_date;
                },
            ],          

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, MessagesTemplate $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
