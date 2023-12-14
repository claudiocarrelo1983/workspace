<?php

use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\Services $model */

$this->title = 'Update Services: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="services-update">

    <?= Helpers::displayAminBreadcrumbs('services','services','services-list','update') ?>

    <?= $this->render('_form', [
        //'activeLanguagesArr' => $activeLanguagesArr,
        'model' => $model,
    ]) ?>

</div>
