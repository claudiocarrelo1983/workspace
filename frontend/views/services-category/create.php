<?php

use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\ServicesCategory $model */

$this->title = 'Create Services Category';
$this->params['breadcrumbs'][] = ['label' => 'Services Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= Helpers::displayAminBreadcrumbs('services','services-category','services-category','create') ?>

<div class="row">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
