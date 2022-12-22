<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Clients;
use yii\db\Query;

/* @var $this yii\web\View */
/* @var $searchModel app\Models\ClientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'backoffice_dashboard_top_page_view');
$this->params['breadcrumbs'][] = $this->title;

$query = new Query;
$companyRows = $query->select([
    'team_code',

    'description',
    'address',      
    'postcode',
    'location',
    'nif',
    'logo',      
    'website',
    'facebook',
    'pinterest',
    'instagram',
    'twitter',
    'tiktok',
    'linkedin',
    'youtube',  
    'active'

])
->from(['companies'])
->where(['team_code' => Yii::$app->user->identity->company]) 
->one();

if(empty($companyRows)){
    $companyRows = array();
}




$companyArr = array_merge(
    array(
        'company' => '',
        'code' => '',
    ),
   
    $companyRows 
);

?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">
                <?= Yii::t('app', 'backoffice_dashboard_top_title') ?>
            </h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript: void(0);">
                            <?= Yii::t('app', 'backoffice_dashboard_top_page_name') ?>
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
                    <!-- end page title -->
                    <h4 class="card-title">
                        <?= Yii::t('app', 'backoffice_dashboard_title') ?>
                    </h4>
                    <p class="card-title-desc">
                        <?= Yii::t('app', 'backoffice_dashboard_text') ?>
                    </p>
                    <div class="mt-5 mb-5">
                        <h5>
                            <?= Yii::t('app', 'backoffice_dashboard_registration') ?>:
                            <?= Html::a(                            
                                Url::base('http').Url::toRoute(['client/registration', 'code' => $companyArr['team_code']]), 
                                Url::toRoute(['client/registration', 'code' => $companyArr['team_code']]),
                                [           
                                'target' => '_blank'
                                ]                             
                            ) ?>    
                        </h5>
                    </div>
                
                    <div>
                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row"><div class="col-sm-12 col-md-6"><div class="dt-buttons btn-group flex-wrap">      
                                <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="datatable-buttons" type="button">
                                    <span>Copy</span>
                                </button> 
                                <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="datatable-buttons" type="button">
                                    <span>Excel</span>
                                </button> 
                                <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="datatable-buttons" type="button">
                                    <span>PDF</span>
                                </button>                        
                            </div>
                        </div>
                    </div>
                
                    <p class="pt-3">
                        <?= Html::a('Create Client', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <?= $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,                     
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'id',
                            'username',
                            'first_name',
                            'last_name',
                            'name',
                            'company',
                            'level',
                            'sublevel',
                            //'auth_key',
                            //'password_hash',
                            //'password_reset_token',
                            'email:email',
                            //'status',
                            //'created_at',
                            //'updated_at',
                            [
                                'class' => ActionColumn::className(),
                                'urlCreator' => function ($action, Clients $model, $key, $index, $column) {
                                    return Url::toRoute([$action, 'id' => $model->id]);
                                }
                            ],
                        ],
                    ]); ?>


                </div>
            </div>
        </div>  
    </div>
</div>
