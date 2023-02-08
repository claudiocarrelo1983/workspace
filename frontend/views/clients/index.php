<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\User;
use yii\db\Query;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $searchModel app\Models\ClientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of Clients';
$this->params['breadcrumbs'][] = $this->title;


$query = new Query;
$userArr = $query->select('*')
->from(['user'])
->where(['username' => Yii::$app->user->identity->username]) 
->one();
?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">
                Data Tables
            </h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript: void(0);">
                            Clients
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
                    <h4 class="card-title">Buttons example</h4>
                    <p class="card-title-desc">The Buttons extension for DataTables
                        provides a common set of options, API methods and styling to display
                        buttons on a page that will interact with a DataTable. The core library
                        provides the based framework upon which plug-ins can built.
                    </p>
                    <div class="mt-5 mb-5">
                        <h5>
                            <?= Yii::t('app','Your registration Url:') ?> 
                            <?= Html::a(                            
                                Url::base('https').Url::toRoute(['client/registration', 'code' => $userArr['company_code_url']]), 
                                Url::toRoute(['client/registration', 'code' => $userArr['company_code_url']]),
                                [           
                                'target' => '_blank'
                                ]                             
                            ) ?>    
                        </h5>
                    </div>
                
                    <div>
                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"><div class="dt-buttons btn-group flex-wrap">     
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
                        //'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'username',
                            'first_name',
                            'last_name',                      
                            'company',                      
                            //'auth_key',
                            //'password_hash',
                            //'password_reset_token',
                            'email:email',
                            'nif',
                            'contact_number',
                            //'status',
                            //'created_at',
                            //'updated_at',
                            [
                                'class' => ActionColumn::className(),
                                'urlCreator' => function ($action, User $model, $key, $index, $column) {
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
