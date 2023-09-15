<?php

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
                    <?= Html::encode(Yii::t('app', 'menu_admin_company_team')) ?>
                </h4>  
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">
                                <?= Yii::t('app', 'menu_admin_company_team') ?> 
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <?= Yii::t('app', 'menu_admin_teams_list') ?>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div> 

    <p>
        <?= Html::a('Create Team', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'company',
            'username',
            //'page_code_title',
            //'page_code_text',
            'email',
            'first_name', 
            'surname',      
            //'path',
            //'image',
            'location',
            'title',
            'text:ntext',
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
            'contact_number',
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
