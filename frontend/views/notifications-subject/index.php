<?php

use common\models\Subjects;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\Url;
use common\Helpers\Helpers;


?>

<!-- start page title -->
<?= Helpers::displayAminBreadcrumbs('message','message-templates') ?>


<div class="row">
    <div class="col-12">
        <div class="clients-index">              
            <p>
                <?= Html::a(
                        Yii::t('app', 'create_notification_subject_button'),
                        ['create'], 
                        ['class' => 'btn btn-success']
                     ) 
                ?>
            </p>
                
            <?= $this->render('_search', ['model' => $searchModel]); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],                                                       
                        [     
                            'label' => Yii::t('app', 'subject') ,                        
                            'value' => function (Subjects $model) {
                                return $model->subject;
                            },
                        ], 
                        [     
                            'label' => Yii::t('app', 'subject_pt') ,                        
                            'value' => function (Subjects $model) {
                                return $model->text_pt;
                            },
                        ], 
                        [     
                            'label' => Yii::t('app', 'subject_en') ,                        
                            'value' => function (Subjects $model) {
                                return $model->text_en;
                            },
                        ],                                             
                        [     
                            'label' => Yii::t('app', 'active') ,                        
                            'value' => function (Subjects $model) {
                                return $model->active;
                            },
                        ], 
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, Subjects $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id' => $model->id]);
                            }
                        ],            
                 
                                                
                    ],
                ]); ?>
        </div>        
    </div>
</div>







