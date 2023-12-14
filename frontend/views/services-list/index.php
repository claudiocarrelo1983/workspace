<?php

use common\models\CompanyLocations;
use common\models\Services;
use common\models\ServicesCategory;
use common\Helpers\Helpers;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\db\Query;

/** @var yii\web\View $this */
/** @var app\models\ServicesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Services';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-index">

    <?= Helpers::displayAminBreadcrumbs('services','services-list','services-list') ?>

    <p>
        <?= Html::a(Yii::t('app', 'create_services_button'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
    
                  
            [     
                'label' => Yii::t('app', 'title_pt') ,                        
                'value' => function (Services $model) {
                    return $model->title_pt;
                },
            ], 
            [     
                'label' => Yii::t('app', 'title_en') ,                        
                'value' => function (Services $model) {
                    return $model->title_en;
                },
            ],
            
            [     
                'label' => Yii::t('app', 'team_members'),                         
                'format' => 'raw',
                'value' => function (Services $model) {
                    
                    //$test = User::find('username')->orderBy("id desc")->where(['in', 'guid', ['1769881E-F0F8-4E3B-9218-3F4D40F8BB3E','347D78A1-0C26-45BD-8DE3-26E8752B39BD']])->asArray();

                    $query = new Query();

                    $explod = explode(',', $model->username);
                    
                    $userArr = $query->from(['user'])
                        ->select('full_name')
                        ->where(['in', 'guid', $explod])
                        ->all();

                    $user = [];

                    foreach($userArr as $value){
                        $user[] = $value['full_name'];
                    }

             
                  
                    return implode(', ',$user);
                },
            ],  
        
                 
            [     
                'label' => Yii::t('app', 'service_cat'),                         
                'format' => 'raw',
                'value' => function (Services $model) {
                    $test = ServicesCategory::find('page_code_title')->orderBy("id desc")->where(['category_code' => $model->category_code])->limit(1)->one();
                    return (isset($test->page_code_title) ?  Yii::t('app', $test->page_code_title) : '');
                },
            ],  
            [     
                'label' => Yii::t('app', 'company_code_location'),                         
                'format' => 'raw',
                'value' => function (Services $model) {
                    $test = CompanyLocations::find('city')->orderBy("id desc")->where(['location_code' => $model->location_code])->limit(1)->one();
                    return (isset($test->city) ?  Yii::t('app', $test->city) : '');
                },
            ],  
          
            [     
                'label' => Yii::t('app', 'active') ,                        
                'value' => function (Services $model) {
                    return $model->active;
                },
            ],     
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Services $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
