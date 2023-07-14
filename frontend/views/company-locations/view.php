<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\CompanyLocations $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Company Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="company-locations-view">

    <h4 class="mb-sm-0 font-size-18 pb-4">
        <?= Html::encode($this->title) ?>
    </h4>  

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'company_code',
            'location_code',
            'page_code_title',
            'page_code_description',
            'full_name',
            'description:ntext',
            'abbreviation',
            'cae',
            'contact_number',
            'email:email',
            'sheddule_array:ntext',
            'address',
            'city',
            'postcode',
            'location',
            'country',
            'google_location:ntext',
            'active',
            'created_date',
        ],
    ]) ?>

</div>
