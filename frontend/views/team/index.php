<?php

use common\models\CompanyLocations;
use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\Models\TeamSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Teams';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="team-index">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18 pb-4">
                    <?= Html::encode(Yii::t('app', 'menu_admin_company')) ?>
                </h4>  
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">
                                <?= Yii::t('app', 'menu_admin_company') ?> 
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <?= Yii::t('app', 'menu_admin_company_team') ?>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div> 

    <p>
        <?= Html::a(Yii::t('app', 'create_team'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [     
                'label' => Yii::t('app', 'id') ,                        
                'value' => function (User $model) {
                    return $model->id;
                },
            ],
            [     
                'label' => Yii::t('app', 'username') ,                        
                'value' => function (User $model) {
                    return $model->username;
                },
            ],
            [     
                'label' => Yii::t('app', 'title') ,                        
                'value' => function (User $model) {
                    return $model->title;
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
                'label' => Yii::t('app', 'username') ,                        
                'value' => function (User $model) {
                    return $model->username;
                },
            ],
            [     
                'label' => Yii::t('app', 'email') ,                        
                'value' => function (User $model) {
                    return $model->email;
                },
            ],          
            [     
                'label' => Yii::t('app', 'company_code_location'),                         
                'format' => 'raw',
                'value' => function (User $model) {
                    $test = CompanyLocations::find('location_code')->orderBy("id desc")->where(['location_code' => $model->location_code])->limit(1)->one();
                    return (isset($test->full_name) ? $test->full_name : '');
                },
            ],            
            [     
                'label' => Yii::t('app', 'contact_number') ,                        
                'value' => function (User $model) {
                    return $model->contact_number;
                },
            ],


          
            //'text:ntext',
            //email
            //'title_pt',
            //'text_pt:ntext',
            //'title_en',
            //'text_en:ntext',
            //'website',
            //'facebook',
            //'pinterest',
            //'instagram',
            //'twitter',
            //'tiktok',
            //'linkedin',
            //'youtube',
       
            //'color',
            //'active',
            //'created_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
