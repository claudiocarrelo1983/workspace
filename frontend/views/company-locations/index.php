<?php

use frontend\models\CompanyLocations;
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
 
    <h4 class="mb-sm-0 font-size-18 pb-4">
        <?= Html::encode($this->title) ?>
    </h4> 

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
