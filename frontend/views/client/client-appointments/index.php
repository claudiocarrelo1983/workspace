<?php

use common\models\Sheddule;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\Helpers\Helpers;

$companyArr = Helpers::myCompanyArr();

/** @var yii\web\View $this */
/** @var app\models\ShedduleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Sheddules';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('@frontend/views/client/page/header', ['myData' => '', 'model' => $model, 'companyArr' => $companyArr]); ?>

<?= $this->render('@frontend/views/client/page/banner',['code' => Yii::$app->request->get('code'), 'companyArr' => $companyArr]); ?>

<div id="examples" class="container  pb-5">
    <?= $this->render('@frontend/views/client/client-booking/links'); ?>   
</div>

<div class="container pb-5">
    <div class="row">
        <div class="col-12">
            <div class="clients-index">
                <h1><?= Html::encode($this->title) ?></h1>

                <p>
                    <?= Html::a('Create Sheddule', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        'team_username',
                        'client_username',
                        'company_code',
                        'service_cat',
                        //'service_name',
                        //'available',
                        //'name',
                        //'contact_number',
                        //'email:email',
                        //'nif',
                        //'date',
                        //'time',
                        //'created_date',
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, Sheddule $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id' => $model->id]);
                            }
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
