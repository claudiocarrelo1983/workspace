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
    <h4 class="mb-sm-0 font-size-18 pb-4">
        <?= Html::encode($this->title) ?>
    </h4>  

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
