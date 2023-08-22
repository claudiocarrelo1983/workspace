<?php

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
            <h4 class="mb-sm-0 font-size-18 pb-4">
                <?= Html::encode($this->title) ?>
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
               
                    <?php
                        if(!empty($userArr)){                            
                    ?>
                    <div class="mt-5 mb-5">
                        <h5>
                         
                            <?= Yii::t('app','Your registration Url:') ?> 
                            <?= Html::a(                            
                                Url::base('https').Url::toRoute(['/page', 'code' => $userArr['company_code_url']]), 
                                Url::toRoute(['/page', 'code' => $userArr['company_code_url']]),
                                [           
                                'target' => '_blank'
                                ]                             
                            ) ?>    
                        </h5>
                    </div>
                    <?php                                
                        }
                    ?>
                
                    <div>
              
                    <?= $this->render('_search', ['model' => $searchModel]); ?>

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            //'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                'title',
                                'gender', 
                                'username',
                                'nif',
                                'first_name',
                                'last_name',   
                                'gender',  
                                'dob',                   
                                'contact_number',
                                'email:email',
                                'active',
                                'created_date',
                                /*
                                'address',
                                'postcode',
                                'location',
                                */
                                //'nif',
                                //'first_name',
                                //'last_name',
                                //'full_name',
                                //'gender',
                                //'title',
                                //'path',
                                //'dob',
                                //'image',
                                //'company_code',
                                //'starting_date',
                                //'payment_month_fee',
                                //'payment_year_fee',
                                //'offer',
                                //'status',
                                //'language',
                                //'address',
                                //'postcode',
                                //'location',
                                //'country',
                                //'voucher',
                                //'terms_and_conditions',
                                //'gdpr',
                                //'privacy',
                                //'newsletter',
                                //'auth_key',
                                //'password_hash',
                                //'password_reset_token',
                                //'active',
                                //'created_at',
                                //'updated_at',
                                //'subscription',
                                //'subscription_startingdate',
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
            </div>
        </div>  
    </div>
</div>







