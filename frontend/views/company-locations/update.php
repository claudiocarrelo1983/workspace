<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CompanyLocations $model */

$this->title = 'Update Company Locations: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Company Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="company-locations-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
