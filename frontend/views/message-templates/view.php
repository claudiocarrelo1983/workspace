<?php

use common\models\MessagesTemplate;
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\Helpers\Helpers;


/** @var yii\web\View $this */
/** @var app\models\MessagesTemplate $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Messages Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="messages-template-view">
  
    <?= Helpers::displayAminBreadcrumbs('message','message-templates', 'view') ?>

    <?=  Helpers::displayButtonsView($model); ?>    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [   
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
        ],
    ]) ?>

</div>
