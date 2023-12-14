<?php

use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\Team $model */

$this->title = 'Create Team';
$this->params['breadcrumbs'][] = ['label' => 'Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-create">

    <!-- start page title -->
    <?= Helpers::displayAminBreadcrumbs('team','team','team','create') ?>

    <?= $this->render('_form', [
        'model' => $model,
        'weekDays' => $weekDays,
        'serviceTimeMin' => $serviceTimeMin
    ]) ?>

</div>
