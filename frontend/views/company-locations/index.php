<?php

use common\models\CompanyLocations;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CompanyLocationsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Company Locations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-locations-index">
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
                            <?= Yii::t('app', 'menu_admin_company_locations') ?>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div> 

    <p>
        <?= Html::a('Create Company Locations', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'company_code',       
            'full_name',
            //'description:ntext',
            //'abbreviation',
            //'cae',
            'contact_number',
            'email:email',
            //'sheddule_array:ntext',
            'address',
            'city',
            //'postcode',
            'location',
            //'country',
            //'google_location:ntext',
            //'active',
            //'created_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CompanyLocations $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
