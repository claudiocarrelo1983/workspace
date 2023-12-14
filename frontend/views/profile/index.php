<?php

use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\Models\ClientsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Clients List';
$this->params['breadcrumbs'][] = $this->title;

?>

<!-- start page title -->
<?= Helpers::displayAminBreadcrumbs('message', 'profile') ?>

<div class="row">

    <?= 
        $this->render('_form', [
            'model' => $model,
            'weekDays' => $weekDays,
            'serviceTimeMin' => $serviceTimeMin,
        ]) 
    ?>
</div>






