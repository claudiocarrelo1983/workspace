<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\Services $model */

\yii\web\YiiAsset::register($this);

?>
<div class="services-view">   

    <?= Helpers::displayAminBreadcrumbs('services','services','services-list','view', $model->title) ?>

    <p>
        <?= Helpers::displayButtonsView($model); ?>
    </p>

 

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'location_code',
            'username',
            'service_code',
            'category_code',     
            'title',
            'text:ntext',
            'subtitle:ntext',
            'title_pt',
            'text_pt:ntext',
            'title_en',
            'text_en:ntext',
            'price',
            'price_range',
            'order',
            'active',
            'created_date',
        ],
    ]) ?>

</div>
