<?php

use app\models\Clients;
use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\db\Query;

/** @var yii\web\View $this */
/** @var app\Models\ClientsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Clients List';
$this->params['breadcrumbs'][] = $this->title;



$query = new Query;
$userArr = $query->select('*')
->from(['company'])
->where([
   'company_code' => Yii::$app->user->identity->company_code
]) 
->one();


?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18 pb-4 pt-4">
                <?= Html::encode(Yii::t('app', 'menu_admin_clients_list')) ?>
            </h4>  
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript: void(0);">
                            <?= Yii::t('app', 'menu_admin_clients') ?> 
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                    <?= Yii::t('app', 'menu_admin_clients_list') ?> 
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>  

<div class="row">
    <div class="col-12">
        <div class="clients-index">         
            <?= $this->render('_search', ['model' => $searchModel]); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [     
                            'label' => Yii::t('app', 'title') ,                        
                            'value' => function (User $model) {
                                return $model->title;
                            },
                        ], 
                        [     
                            'label' => Yii::t('app', 'gender') ,                        
                            'value' => function (User $model) {
                                return $model->gender;
                            },
                        ],                              
                        [     
                            'label' => Yii::t('app', 'username') ,                        
                            'value' => function (User $model) {
                                return $model->username;
                            },
                        ], 
                        [     
                            'label' => Yii::t('app', 'nif') ,                        
                            'value' => function (User $model) {
                                return $model->nif;
                            },
                        ], 
                        [     
                            'label' => Yii::t('app', 'first_name') ,                        
                            'value' => function (User $model) {
                                return $model->first_name;
                            },
                        ],                              
                        [     
                            'label' => Yii::t('app', 'last_name') ,                        
                            'value' => function (User $model) {
                                return $model->last_name;
                            },
                        ], 
                        [     
                            'label' => Yii::t('app', 'gender') ,                        
                            'value' => function (User $model) {
                                return $model->gender;
                            },
                        ],
                        [     
                            'label' => Yii::t('app', 'dob'),                        
                            'value' => function (User $model) {
                                return $model->dob;
                            },
                        ],
                        [     
                            'label' => Yii::t('app', 'contact_number'),                        
                            'value' => function (User $model) {
                                return $model->contact_number;
                            },
                        ],
                        [     
                            'label' => Yii::t('app', 'email'),                        
                            'value' => function (User $model) {                              
                                return $model->email;
                            },
                        ],
                        [     
                            'label' => Yii::t('app', 'active'),                        
                            'value' => function (User $model) {                              
                                return $model->active;
                            },
                        ],
                        [     
                            'label' => Yii::t('app', 'created_date'),                        
                            'value' => function (User $model) {                              
                                return $model->created_date;
                            },
                        ],                     
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, User $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id' => $model->id]);
                            }
                        ],
                                                
                    ],
                ]);
            ?>         
        </div>  
    </div>
</div>







