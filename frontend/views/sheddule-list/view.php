<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\Sheddule $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sheddules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sheddule-view">

    <?= Helpers::displayAminBreadcrumbs('message','message-templates', 'view') ?>

    <?=  Helpers::displayButtonsView($model); ?> 

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'team_username',
            'client_username',
            'company_code',
            'service_cat',
            'service_name',
            'available',
            'name',
            'contact_number',
            'email:email',
            'nif',
            'date',
            'time',
            'created_date',
        ],
    ]) ?>

</div>
